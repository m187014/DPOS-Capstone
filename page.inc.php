<?php
class Page
{
  // class Page's attributes
  public $content;
  private $title = 'DPOS';
  private $keywords = 'IT480';
  private $xmlheader = "<!DOCTYPE html><html>";
  private $headerTitle = "DPOS";
  private $menuList = '<li><a href=#>DPOS</a></li>';

  //constructor
  public function __construct($title) {
    $this->__set("title", $title);
  }

  //set private attributes
  public function __set($varName, $varValue) {
    $varValue = trim($varValue);
    $varValue = strip_tags($varValue);
    if (!get_magic_quotes_gpc()){
      $varValue = addslashes($varValue);
    }
    $this->$varName = $varValue;
  }
  public function __unsafeSet($varName, $varValue)
  {
    $this->$varName = $varValue;
  }

  //get function - nothing special for now
  public function __get($varName) {
    return $this->$varName;
  }


  //output the page
  public function display()
  {
    echo $this->xmlheader;
    echo "\n<head>\n";
    $this -> displayStyles();
    echo "</head>\n<body>\n";
    $this -> displayContentHeader();
    echo $this->content;
    $this -> displayContentFooter();
    echo "</body>\n</html>\n";
  }

  //output the title
  public function displayTitle() {


  }

  public function displayKeywords() {
    echo "<meta name=\"keywords\" content=\"$this->keywords\" />";
  }

  //display the embedded stylesheet
  public function displayStyles() {
    ?>
    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="menu/css/simple_menu.css">
    <link rel="stylesheet" href="src/css/pure-drawer.css"/>
    <!-- http://mac81.github.io/pure-drawer/ -->
    <!-- //http://stackoverflow.com/questions/2571573/css-footer-position-stick-to-bottom-of-browser -->
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1,h2,h3,h4,h5,h6 {
    font-family: "Playfair Display";
    letter-spacing: 5px;
}
</style>
    <!--JS FILES -->
    <script src="js/jquery.tools.min.js"></script>
    <script src="src/js/vendor/modernizr-2.6.2.min.js"></script>
    <script>
    $(function () {
        $("#prod_nav ul").tabs("#panes > div", {
            effect: 'fade',
            fadeOutSpeed: 400
        });
    });
    </script>
    <script>
    $(document).ready(function () {
        $(".pane-list li").click(function () {
            window.location = $(this).find("a").attr("href");
            return false;
        });
    });
    </script>
    <!-- http://stackoverflow.com/questions/8576003/destroying-session-and-user-data-on-browser-close-php -->
    <script type="text/javascript">
    $(window).on('beforeunload', function() {
        $.ajax({
          url: "/login.auth.php?logout=true";
        });
    });
</script>

    <?php
  }

  //display the header part of the visible page
  public function displayContentHeader() {
    ?>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card-2" style="letter-spacing:4px;">
    <a href="#home" class="w3-bar-item w3-button">D.P.O.S.</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#menu" class="w3-bar-item w3-button">Menu</a>
      <a href="#contact" class="w3-bar-item w3-button">Contact</a>
      <a href="DPOSLogin.auth.php" class="w3-bar-item w3-button">Login/Logout</a>
      


    </div>
  </div>
</div>

    <!-- BEGIN DRAWER -->

       <label class="pure-toggle-label" for="pure-toggle-left" data-toggle-label="left">
         <span class="pure-toggle-icon"></span>
       </label>

      <div class="pure-pusher-container">
        <div class="pure-pusher">
    <!-- BEGIN DRAWER -->

    <div class="header" style="min-height: 85px;">
      <!-- Logo/Title -->
      <div id="site_title"><a href="index.html"> <img src="DPOSlogo.png" alt=""></a> </div>
      <!-- Main Menu -->

    </div>
    <!-- END header -->

    <?php
  }

  //display the footer part of the visible page
  public function displayContentFooter() {
    ?>
      <div id="footer">

     </div>
<!-- SLIDER END -->

      <!-- END footer -->
    <?php
  }
}
?>
