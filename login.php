<?php
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
     <div class="container">
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

		<input type="submit" value="Submit" />
		<input type="reset" value="Clear"/>
		</form>
		<form method="get" action="register.php">
        <button type="submit">Register</button>
        </form>
       
  		</div>

        </div>
     </div>
  </section>';

// Show the page
$page->display();

?>
