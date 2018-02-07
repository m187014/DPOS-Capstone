<?php
//Load page class
require_once("page.inc.php");

//create page object
$page = new Page(LogoutPage);

//add to page
$page->content = '     <h3 class="wow fadeInUp" data-wow-delay="1.0s">You know have access, Welcome!</h3>
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
          <h3> Logout here</h3>
          <br><br>
          <p><form method="request" action="DPOSLogin.auth.php">
          <input type="submit" name="logoff" value="Log Off">
          </form></p>
  		</div>

        </div>
     </div>
  </section>';

// Show the page
$page->display();

?>
