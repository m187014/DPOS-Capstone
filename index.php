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
	    <p><form method="request" action="DPOSLogin.auth.php">
          <input type="submit" name="logoff" value="Log Off">
          </form></p>
    </div>
  </div>
</div>


<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="pizza.jpg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
	 <!--pic from:
		http://images2.fanpop.com/images/photos/7300000/Slice-of-Pizza-pizza-7383219-1600-1200.jpg
	 -->
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">Drydock Pizza Ordering System</h1><br>
      <h5 class="w3-center">About Us</h5>
      <p class="w3-large">Drydock Pizza Ordering System, or DPOS, is an application created for midshipman, by midshipman. It allows midshipman to place an order to drydock for a gourmet pizza! No need to wait in line, just place an order, and recieve an email when your order is ready!</p>
      <p class="w3-large w3-text-grey w3-hide-medium">"DPOS is the future of the brigade"</p>
    </div>
  </div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Our Signature Pizzas:</h1><br>
      <h4>Pepperoni <button type="button">Order</button>  </h4>
      <p class="w3-text-grey">Delightfully cooked pepperoni under golden-roasted cheese and creamy sauce</p><br>
    
      <h4>Sausage <button type="button">Order</button></h4>
      <p class="w3-text-grey">Imported sausage from Genovia cover this amazing masterpiece</p><br>
    
      <h4>Hawaian <button type="button">Order</button></h4>
      <p class="w3-text-grey">Break out your hula skirts, and step into Hawaii with this sweet and savory treat!</p><br>
    
      <h4>Supreme <button type="button">Order</button></h4>
      <p class="w3-text-grey">Like it all? Poor at decisions? Then get it all!</p><br>
    
      <h4>Create your own <button type="button">Create</button></h4>
      <p class="w3-text-grey">Too choosy? Like to over-comlpicate things? Make your own! </p>    
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="pizza2.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" width="500" height="750">
	  <!--pic from:
			http://www.opusfidelis.com/wp-content/uploads/2013/05/158262967.jpg
			-->
    </div>
  </div>

  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Contact</h1><br>
    <p>Please dont hesitate to reach out to us for any questions, comments, or concern!</p>
    <p class="w3-text-blue-grey w3-large"><b>Drydock, US Naval Academy</b></p>
    <p>You can email us at drydock@usna.edu, or you can send us a message here:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="datetime-local" placeholder="Date and time" required name="date" value="2017-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
  
  <p><form method="request" action="DPOSLogin.auth.php">
          <input type="submit" name="logoff" value="Log Off">
          </form></p>
  
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
