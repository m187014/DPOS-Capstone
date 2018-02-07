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
           <h1> Welcome to the Registration Page: </h1>


		<form method="post" action="register.inc.php">

        <p><label>alpha:
		<input name="alpha" type ="text" size="18"
			maxlength="24" placeholder= "XXXXXX" />
		</label></p>

		<p><label>USNA Email:
		<input name="email" type ="text" size="18"
			maxlength="24" placeholder= "mXXXXXX@usna.edu" />
		</label></p>

       <p><label>Desired Password:
	   <input name="password" type ="password" size="18"
		  maxlength="24" placeholder= "password" />
		</label></p>
		
		<p><label>Re-enter Desired Password:
	   <input name="password2" type ="password" size="18"
		  maxlength="24" placeholder= "password" />
		</label></p>
		
		<p><label>First Name:
		<input name="first" type ="text" size="18"
			maxlength="24" placeholder= "John" />
		</label></p>
		
		<p><label>Last Name:
		<input name="last" type ="text" size="18"
			maxlength="24" placeholder= "Doe" />
		</label></p>
		
		<p><label>Company:
		<select name="company">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">1</option>
			<option value="6">2</option>
			<option value="7">3</option>
			<option value="8">4</option>
			<option value="9">1</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
		</select>
		</label></p>

		<input type="submit" value="Submit" />
		<input type="reset" value="Clear"/>
		</form>
		
       
  		</div>

        </div>
     </div>
  </section>';

// Show the page
$page->display();

?>
