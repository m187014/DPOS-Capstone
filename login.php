<?php
session_start();

//Load page class
require_once("page.inc.php");

//create page object
$page = new Page("LoginPage");

//add to page
$page->content = '
                </div>
      	</div>

        </div>
      </div>
   </section>
  <!-- Single Project section
  ================================================== -->
  <section id="single-project">

     <div class="container" style="margin-left:30px">
        <div class="row">

  		<div class="wow fadeInUp col-md-7 col-sm-7" data-wow-delay="2.0s">
           <h1> Login or Register: </h1>
		<p><b> If you already have an account, please login below.
		Otherwise, create an account to be part of DPOS!</b></p>

		<form method="post" action="DPOSLogin.auth.php">
		<h3> Login </h3>
		<p><label>Username:
		<input name="username" type ="text" size="18"
			maxlength="24" placeholder= "username" />
		</label></p>

       <p><label>Password:
	   <input name="password" type ="password" size="18"
		  maxlength="24" placeholder= "password" />
		</label></p>

		<input type="submit" value="Submit" style="width:100px"/>
		<input type="reset" value="Clear" style="width:100px"/>
		</form> <br>
		<form method="get" action="register.php">
        <button type="submit" style="width:100px">Register</button>
        </form>

  		</div>

        </div>
     </div>
<div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="pizza.jpg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
	 <!--pic from:
		http://images2.fanpop.com/images/photos/7300000/Slice-of-Pizza-pizza-7383219-1600-1200.jpg
	 -->
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">Drydock Pizza Ordering System</h1><br>

      <p class="w3-large">Drydock Pizza Ordering System, or DPOS, is an application created for midshipman, by midshipman. It allows midshipman to place an order to drydock for a gourmet pizza! No need to wait in line, just place an order, and recieve an email when your order is ready!</p>
      <p class="w3-large w3-text-grey w3-hide-medium">"DPOS is the future of the brigade"</p>
    </div>
  </div>

  </section>';

// Show the page
$page->display();

?>
