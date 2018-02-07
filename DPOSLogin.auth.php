<?php
require_once("mysql.inc.php");
$db = new myConnectDB();          # Connect to MySQL

session_start();                  # Start the Session
$sessionID = session_id();        # Retrieve the session id

echo "sessionid1:".$sessionID;


function logon($db,$username,$password, $sessionID){
  $validUser = false;
  if (mysqli_connect_errno()) {
      echo "<h5>ERROR: " . mysqli_connect_errno() . ": " . mysqli_connect_error() . " </h5><br>";
  }
  $query = "SELECT Uname,Pword, UserID
            FROM Users
            WHERE Uname=? AND Pword=?";
  $stmt = $db->stmt_init();
  $stmt->prepare($query);
  $stmt->bind_param('ss',$username,$password);
  $result = $stmt->execute();
  if (!$result || $db->affected_rows == 0) {
    echo "<h5>ERROR: " . $db->error . " for query *$query*</h5><hr>";
  }
  $stmt->bind_result($username,$password, $id);
  while ($stmt->fetch()){
    $validUser = true;
  }
  $stmt->close();
  if($validUser){
	echo "sessionid:".$sessionTID;
    $insert = "INSERT INTO UsersSession (SessionID,UserID)
               VALUES (?,?)";
    $stmt = $db->stmt_init();
    $stmt->prepare($insert);
    $stmt->bind_param('ss',$sessionID,$id);
    $result = $stmt->execute();
    if (!$result || $db->affected_rows == 0) {
      echo "<h5>ERROR: " . $db->error . " for insert *$insert*</h5><hr>";
    }
    $stmt->close();
  }
  return $validUser;
}

function verify($db,$sessionID){
  if (mysqli_connect_errno()) {
      echo "<h5>ERROR: " . mysqli_connect_errno() . ": " . mysqli_connect_error() . " </h5><br>";
  }
  $query = "SELECT UserID
            FROM UsersSession
            WHERE SessionID=?";
  $stmt = $db->stmt_init();
  $stmt->prepare($query);
  $stmt->bind_param('s',$sessionID);
  $result = $stmt->execute();
  if (!$result || $db->affected_rows == 0) {
    echo "<h5>ERROR: " . $db->error . " for query *$query*</h5><hr>";
  }
  $stmt->bind_result($username);
  while ($stmt->fetch()) {

  }
  $stmt->close();
  return $username;
}

function logoff($db,$sessionID){
  $query = "DELETE FROM UsersSession
            WHERE SessionID=?";
  $stmt = $db->stmt_init();
  $stmt->prepare($query);
  $stmt->bind_param('s',$sessionID);
  $result = $stmt->execute();
  if (!$result || $db->affected_rows == 0) {
   echo "<h5>ERROR: " . $db->error . " for query *$query2* </h5><hr>";
  }
  $stmt->close();
}

function update($db,$username,$sessionEncode){
  echo "sesEnc: ".$sessionEncode;
  $query = "UPDATE Users
            SET SessionString=?
            WHERE Uname=?";
  $stmt = $db->stmt_init();
  $stmt->prepare($query);
  $stmt->bind_param('ss',$sessionEncode,$username);
  $result = $stmt->execute();
  if (!$result || $db->affected_rows == 0) {
   echo "<h5>ERROR: " . $db->error . " for query *$query* </h5><hr>";
  }
  $stmt->close();
}

function register($db,$alpha, $email,$pass,$pass2,$first,$last, $company){
  echo("SET");
  //login to db
  //check username
  //add user if unique
  //direct to login
  $registionSuccess = false;
  $intoMids=false;
  $intoUsers=false;
  $userExists = false;
  $matchPass=false;
  $query = "SELECT Email
            FROM Midshipman
            WHERE Email=?";
  $stmt = $db->stmt_init();
  $stmt->prepare($query);
  $stmt->bind_param('s',$email);
  echo $email;
  $result = $stmt->execute();
  if (!$result || $db->affected_rows == 0) {
       echo "ERROR!";
  }

  $stmt->bind_result($username);
  while($stmt->fetch()){
    $userExists = true;//NEED TO FIX, no duplicate usernames
  }
  $stmt->close();
  if($userExists==true)
     echo "User exists already";
  if($pass==$pass2)
  {
	  $matchPass=true;
	  echo "passwords match";
  }
  else
	echo "passwords do not match";
  if($userExists == false AND $matchPass == true){
    $insert = "INSERT INTO Midshipman(Alpha, Email, Company, First, Last)
     	   		  VALUES ($, $, $, $, $)";
    $stmt = $db->stmt_init();
   	$stmt->prepare($insert);
    $stmt->bind_param('sssss',$alpha, $email, $company, $first, $last);//NEED LAST LOGIN NULL
    $result = $stmt->execute();
  	//echo "WORKED";
   	if (!$result || $db->affected_rows == 0) {
   	     echo "<h5>ERROR: " . $db->error . " for insert *$insert*</h5><hr>";
   	}
   	else
   	{
		$intoMids=true;
		echo "into mids true";
	}
    $stmt->close();
    
    $insert2 = "INSERT INTO Users(UserID, Uname, Pword, AccessLevel, SessionString)
     	   		  VALUES ($, $, $, $, $)";
    $defAccess=3;
    $stmt = $db->stmt_init();
   	$stmt->prepare($insert2);
    $stmt->bind_param('sssss',$alpha, $email, $password, $defAccess, $sessionID);//NEED LAST LOGIN NULL
    $result = $stmt->execute();
  	//echo "WORKED";
   	if (!$result || $db->affected_rows == 0) {
   	     echo "<h5>ERROR: " . $db->error . " for insert *$insert2*</h5><hr>";
   	}
   	else
   	{
		$intoUsers=true;
		echo "intousers true";
	}
    $stmt->close();
    
    
    if($intoMids==true && $intoUsers==true)
    {
		$registionSuccess = true;
		echo "REGSITRATION SUCCESS!!!";
	}
  }
}



// LOGON THE USER (if requested)  # Check to see if user/password were sent
if (isset($_POST['username']) && isset($_POST['password'])) {
                                  # Validate the user/password combination
  if (!logon($db, $_POST['username'], $_POST['password'], $sessionID)) {
    echo "no login";
    header('Location: login.php');# Redirect the user to the login page
    die;                          # End the script (just in case)
  }
  else{
    header('Location: index.php'); #Registration successful redirect to home page
    die;
  }
}

// VERIFY THE USER IS LOGGED ON
$user = verify($db, $sessionID);  # Verify the user, return username or ''
if ($user == '') {                # User was not successfully verified!
  echo "not verified";
  header('Location: login.php');  # Redirect the user to the login page
  die;                            # End the script (just in case)
}

// LOGOFF THE USER
if (isset($_REQUEST['logoff'])) { # Did the user request to logoff?
  logoff($db, $sessionID);        # Remove the row with this sessionid
  header('Location: login.php');  # Redirect the user to the login page
  die;                            # End the script (just in case)
}



//REGISTER THE USER (if requested)
if(isset($_POST["alpha"]) && isset($_POST["email"]) && isset($_POST["password"]) &&
isset($_POST["password2"]) && isset($_POST["first"]) && isset($_POST["last"]) && isset($_POST["company"]) && $_POST["password"]==$_POST["password2"]){
   echo "calling register register function";
  if(register($db,$_POST["alpha"],$_POST["email"],$_POST["password"],$_POST["password2"],$_POST["first"], $_POST["last"], $_POST["company"])){ #input into table, call register function
    header('Location: index.php'); #Registration successful redirect to home page
    die;
  }
}


// At the end of the script update the session data for this user
update($db, $user, session_encode());
#header('Location: logout.php');

?>
