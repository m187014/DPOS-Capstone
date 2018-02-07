<?php
  // mysql.inc.php - This file will be used to establish the database connection.
  class myConnectDB extends mysqli{
    public function __construct($hostname="midn.cs.usna.edu",
        $user="drydock",
        $password="asduifhnv23",
        $dbname="capstone-drydock"){
      parent::__construct($hostname, $user, $password, $dbname);
    }
  }
?>
