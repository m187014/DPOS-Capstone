<?php
require_once("mysql.inc.php");
$db = new myConnectDB();          # Connect to MySQL

session_start();                  # Start the Session
$sessionID = session_id();        # Retrieve the session id

#echo "sessionid1:".$sessionID;


function register($db,$alpha, $email,$pass,$pass2,$first,$last, $company){
  //login to db
  //check username
  //add user if unique
  //direct to login
  echo "here1";
  $registrationSuccess = false;
  $intoMids=false;
  $intoUsers=false;
  $userExists = true;
  $matchPass=false;
  $em=null;
  $query = "SELECT Email
            FROM Midshipman
            WHERE Email=?";
  $stmt = $db->stmt_init();
  $stmt->prepare($query);
  $stmt->bind_param('s',$email);
  $success = $stmt->execute();
  if (!$success || $db->affected_rows == 0) {
       echo "<h5>ERROR: " . $db->error . " for query *$query*</h5><hr>";
  }
  $numrows = $stmt->num_rows;
  echo "here";
  echo "numRows: ".$numrows;
  
  $stmt->bind_result($em);
  while ($stmt->fetch()) {
    echo "em:   $em <br>";
  }
  echo "thisisem: ".$em;
  if($em == null)
  {
	  echo "emisNULL";
	  $userExists=false;
  }
  $stmt->close();
  if($userExists==false)
     echo "User does not exist";
  else
     echo "user already exists";
  if($pass==$pass2)
  {
	  $matchPass=true;
	  echo "passwords match";
  }
  else
	echo "passwords do not match";
  if($userExists == false AND $matchPass == true){
    $insert = "INSERT INTO Midshipman(Alpha, Email, Company, First, Last)
     	   		  VALUES (?, ?, ?, ?, ?)";
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
     	   		  VALUES (?, ?, ?, ?, ?)";
    $defAccess=1;
    $stmt = $db->stmt_init();
   	$stmt->prepare($insert2);
    $stmt->bind_param('sssss',$alpha, $email, $pass, $defAccess, $sessionID);//NEED LAST LOGIN NULL
    $result = $stmt->execute();
  	//echo "WORKED";
   	if (!$result || $db->affected_rows == 0) {
   	     echo "<h5>ERROR: " . $db->error . " for insert *$insert2*</h5><hr>";
   	}
   	else
   	{
		$intoUsers=true;
		echo "into users true";
	}
    $stmt->close();
    
    
    if($intoMids==true && $intoUsers==true)
    {
		$registrationSuccess = true;
		echo "REGSITRATION SUCCESS!!!";
	}
  }
  return $registrationSuccess;
}


//REGISTER THE USER (if requested)
if(isset($_POST["alpha"]) && isset($_POST["email"]) && isset($_POST["password"]) &&
isset($_POST["password2"]) && isset($_POST["first"]) && isset($_POST["last"]) && isset($_POST["company"]) && $_POST["password"]==$_POST["password2"]){
   echo "calling register register function";
  if(register($db,$_POST["alpha"],$_POST["email"],$_POST["password"],$_POST["password2"],$_POST["first"], $_POST["last"], $_POST["company"])){ #input into table, call register function
    header('Location: login.php'); 
    }#Registration successful redirect to login page
  else{
    header('Location: register.php'); #Registration unsuccessful redirect to try again
    //set flag true to let user know what went wrong??
  }
  die;
}


// At the end of the script update the session data for this user
#update($db, $user, session_encode());
#header('Location: logout.php');

?>
