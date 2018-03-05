			<!DOCTYPE html>
<html lang="en">
<head>
 
  <title>MBird</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="1.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head><body>

<?php
 include("dbcon.php");
 session_start();
 if(isset($_POST['submit'])) 
 {
	 $query = "SELECT * FROM userdet where Username = '$_POST[name]' AND Password = '$_POST[password]'" ;
$result = mysql_query($query);
		if(mysql_num_rows($result)>0){
			$result = mysql_fetch_array($result);
			$_SESSION['logged'] = $result; 
	  if(isset($_SESSION['logged'])){ ?><ul class="nav navbar-nav navbar-right">
  
	  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> </ul><?php } 
			include("addbird.php");

	} else {
?>
<script> alert('Wrong Password!');window.location='login.php'</script>
<?php			}
	} 
	?>
 
</body>


</body>
</html>
