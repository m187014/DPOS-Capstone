<?php
//Load page class
require_once("page.inc.php");
//create page object
$page = new Page("IndexPage");

require_once("mysql.inc.php");

require_once("DPOSLogin.auth.php");

$db = new myConnectDB();          # Connect to MySQL

$sessId=session_id();

//add to page
$page->content.= '     <h3 class="wow fadeInUp" data-wow-delay="1.0s">YOU ARE LOGGED ON</h3>
                </div>
      	</div>

        </div>
      </div>
   </section>
  <!-- Single Project section
  ================================================== -->
  <section id="single-project">
     <div class="container">
        <div class="row">
<html>
<title>DPOS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1,h2,h3,h4,h5,h6 {
    font-family: "Playfair Display";
    letter-spacing: 5px;
}
</style>

<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card-2" style="letter-spacing:4px;">
    <a href="#home" class="w3-bar-item w3-button">D.P.O.S.</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#menu" class="w3-bar-item w3-button">Menu</a>
      <a href="#contact" class="w3-bar-item w3-button">Contact</a>
      <a href="#myaccountpage" class="w3-bar-item w3-button">My Account</a>
	<form style="position:relative;float:left" method="request" action="DPOSLogin.auth.php">
          <input type="submit" name="logoff" value="Log Off">
          </form>
    </div>
  </div>
</div>


<!-- Start page content -->
<div class="w3-content" style="max-width:1100px">

<div style="border:1px solid black; height:100px; margin:50px 0% 0px 0%">
	

</div>
 
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>';

// Show the page
$page->display();

?>
