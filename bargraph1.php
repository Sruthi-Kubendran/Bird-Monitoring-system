<html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

		<script src="jquery.min.js"></script>
		<script src="chartphp.js"></script>
		<link rel="stylesheet" href="chartphp.css">
<style>
body {
    background-color: yellow;
}
</style>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MBird</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li><a href="about.php">About</a></li>
	<li><a href="#">Help</a></li>
	<li><a href="#">Contact us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="create.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	  <?php session_start();
	  if(isset($_SESSION['logged'])){ ?>
	  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> </ul><?php } ?>
  </div>
</nav>
<?php
/**
 * Charts 4 PHP
 *
 * @author Shani <support@chartphp.com> - http://www.chartphp.com
 * @version 1.2.3
 * @license: see license.txt included in package
 */
 if(isset($_POST['view']))
 {
include("chartphp_dist.php");

$p = new chartphp();

define('DB_HOST', 'localhost:3306'); 
 define('DB_NAME', 'hackathon'); 
 define('DB_USER','root'); 
 define('DB_PASSWORD',''); 
 $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
 $bdname=$_POST['bdname'];
 $state=$_POST['state'];
$query = "SELECT * FROM birds where Birdsname='$bdname'";
$data=mysql_query($query);
if($data)
{
	while($r=mysql_fetch_array($data))
		$id=$r['ID'];
}
$query = "SELECT * FROM birdsd where id='$id' and State='$state' and Year between '2015' and '2017'";
$data=mysql_query($query);
if(mysql_num_rows($data)>0)
{
$arr = array();
$arr1=array();
  $result = mysql_query($query) or die(mysql_error());  
  
		while( $row = mysql_fetch_assoc( $result ) ) {
 $arr[] = $row[ 'City' ];
 $arr1[]=$row['Count'];
}
$p->data = array(array(array($arr[0],$arr1[0]),array($arr[1],$arr1[1]),array($arr[2],$arr1[2]),array($arr[3],$arr1[3]),array($arr[4],$arr1[4])));
$p->chart_type = "bar";
?><center><b><div style ='font-size:24px;font-family:Sofia;color:#FFFFFF'><?php
// Common Options
$p->title = $bdname;
$p->xlabel = "State";
$p->ylabel = "Bird Count";
$p->export = false;
$p->options["legend"]["show"] = true;
$p->series_label = array('Q1','Q2','Q3'); 

$out = $p->render('c1');
?>
		<div style="width:40%; min-width:450px;color:#FFFFFF">
<?php echo $out; }
else
{
	echo "no bird found";
	require("brdsel.php");
}	}?>
		</div></div>
	</body>
</html>


