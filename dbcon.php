<?php
define('DB_HOST', 'localhost:3306'); 
 define('DB_NAME', 'hackathon'); 
 define('DB_USER','root'); 
 define('DB_PASSWORD',''); 
 $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
 ?>