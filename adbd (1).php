<html>

<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="form.css">
<style>

body {
  font-family: 'Nunito', sans-serif;
  color:#384047;
}
  <title>MBird</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="form.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
	<style>
	*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito', sans-serif;
  color:#384047;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #000080;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #000080;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #000080;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

@media screen and (min-width: 480px) {

  form {
    max-width: 480px;
  }

}

</style>
</head>
<body><?php 
session_start();
include("dbcon.php");
  if(isset($_POST['add']))
 {
$birdname= $_POST['birdname'];
$count = $_POST['count']; 
$state=$_POST['state'];
$city=$_POST['city'];
$month=$_POST['month'];
$year=$_POST['year'];
$sea=$_POST['Season'];
$q="Select * from birds where Birdsname='$birdname'";
$re=mysql_query($q) or die(mysql_error());
while($ro=mysql_fetch_array($re))
{
$id=$ro['ID'];}
 $query = "INSERT INTO birdwatcher2016(id,Birdname,Count,State,City,Month,Year,Season) values('$id','$birdname','$count','$state','$city','$month','$year','$sea')";
 $data = mysql_query ($query)or die(mysql_error());
 if($data) 
 {
?><script> alert('Bird Added!');window.location='addbird.php'</script>
<?php
 }
 else
 {
echo "not created".mysql_error();
 }
 } 
?><nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MBird</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li><a href="#">About</a></li>
	<li><a href="#">Help</a></li>
	<li><a href="#">Contact us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="create.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	  <?php
	  if(isset($_SESSION['logged'])){ ?>
	   <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> </ul>
  </div>
</nav>
	  <?php } echo 'Today date: ' . date('d-m-Y') . "\n";
?>
<div id="adbd">
<form action="adbd.php" method="POST">
    <label><center><b>Birdname</b></label></center>
    <center>
	<?php
include("db.php");
$query="Select Birdname from bird ";
$res=mysql_query($query);
if(mysql_num_rows($res)>0)
{
	echo"<select>";
	while($info = mysql_fetch_array( $res ))
{
	echo "<option>".$info['Birdname'];
	}
 echo "</option></select>";
}
?><br></center>
<label><center><b>Date</b></center></label>
<label><center><b>
<?php echo $date;
?></b></center></label>
<center><label><b>Count</b></label></center>
    <center><input type="text" placeholder="Enter count" name="count" required></center>
	       <center> <label>State</label></center>
        <select id="State" name="State">
            <option>Tamilnadu</option>
            <option>Andhra Pradesh</option>
                </select>
			 <center><label>Season</label></center>
        <select name="Season">
            <option>Winter</option>
            <option>Summer</option>
                </select>
				
   <center> <button type="submit" name="add">ADD BIRD</button></center>
</form>
</fieldset></div> 


</body>
</html>