<html>
<head>
<link rel="stylesheet" href="design.css">
</head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="jquery.min.js"></script>
		<script src="chartphp.js"></script>
		<link rel="stylesheet" href="chartphp.css">
  <body bgcolor="blue">
<div id="whole">
<?php include 'header.php';?>
<div id="center1">
<div id="pic">
<frame name="menu" target="main" noresize="noresize" scrolling="no">
<?php
include("chartphp_dist.php");

$p = new chartphp();

define('DB_HOST', 'localhost:3306'); 
 define('DB_NAME', 'hackathon'); 
 define('DB_USER','root'); 
 define('DB_PASSWORD',''); 
 $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
 $query = "SELECT * FROM birdwatcher2016";
$data=mysql_query($query);
$arr = array();
$arr1=array();
  $result = mysql_query($query) or die(mysql_error());  
  		while( $row = mysql_fetch_assoc( $result ) ) {
 $arr[] = $row[ 'State' ];
 $arr1[]=$row['Count'];
$cnt=$cnt+$row['Count'];
 }
 
$query = "SELECT SUM(Count) AS value_sum FROM birdwatcher2016 where State='$arr[0]'";
$query_run = mysql_query($query);
$row = mysql_fetch_assoc($query_run); 
$sum = $row['value_sum'];



$query = "SELECT SUM(Count) AS value_sum1 FROM birdwatcher2016 where State='$arr[1]'";
$query_run = mysql_query($query);
$row = mysql_fetch_assoc($query_run); 
$sum1 = $row['value_sum1'];




$query = "SELECT SUM(Count) AS value_sum2 FROM birdwatcher2016 where State='$arr[2]'";
$query_run = mysql_query($query);
$row = mysql_fetch_assoc($query_run); 
$sum2 = $row['value_sum2'];




$query = "SELECT SUM(Count) AS value_sum3 FROM birdwatcher2016 where State='$arr[3]'";
$query_run = mysql_query($query);
$row = mysql_fetch_assoc($query_run); 
$sum3 = $row['value_sum3'];

$query = "SELECT SUM(Count) AS value_sum4 FROM birdwatcher2016 where State='$arr[4]'";
$query_run = mysql_query($query);
$row = mysql_fetch_assoc($query_run); 
$sum4 = $row['value_sum4'];

$query = "SELECT SUM(Count) AS value_sum5 FROM birdwatcher2016 where State='$arr[5]'";
$query_run = mysql_query($query);
$row = mysql_fetch_assoc($query_run); 
$sum5 = $row['value_sum5'];

$query = "SELECT SUM(Count) AS value_sum6 FROM birdwatcher2016 where State='$arr[6]'";
$query_run = mysql_query($query);
$row = mysql_fetch_assoc($query_run); 
$sum6 = $row['value_sum6'];

$query = "SELECT SUM(Count) AS value_sum7 FROM birdwatcher2016 where State='$arr[7]'";
$query_run = mysql_query($query);
$row = mysql_fetch_assoc($query_run); 
$sum7 = $row['value_sum7'];



$p->data = array(array(array($arr[0],$sum),array($arr[1],$sum1),array($arr[2],$sum2),array($arr[3],$sum3),array($arr[4],$sum4),array($arr[5],$sum5),array($arr[6],$sum6),array($arr[7],$sum7),array("Total",$cnt)));
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
		<div style="width:40%; min-width:450px;">
<?php echo $out;
?>
		</div>
		</div></div>
<div id="signin">
<?php include 'csignin.php';?>
</div>

<?php include 'footer.php';?>
</div>
</body>
</html>


