<html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
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
  width: 30%;
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
  width: 30%;
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
	  <?php
	  if(isset($_SESSION['logged'])){ ?>
	  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> </ul><?php } ?>
  </div>
</nav>

      <center>  <h1>Welcome</h1><center>
        
        <fieldset>
<form action="bargraph1.php" method="POST">
    <label><center><b>Birdname</b></label></center>
    <center>
	<?php
	include("db.php");
$query="Select Birdsname from birds ";
$res=mysql_query($query);
if(mysql_num_rows($res)>0)
{
	echo"<select name='bdname'>";
	while($info = mysql_fetch_array( $res ))
{
	echo "<option>".$info['Birdsname'];
	}
 echo "</option></select>";
}
?>   
    <br><b>Country</b><br>
    <select name="country" id="country" onchange="setStates();">
    <option value="India">India</option>
    </select>
        
    
	<br><b>State</b><br>
    <select name="state" id="state" onchange="setCities();">
    <option value="">Please select a State</option>
    </select>
  
    <br><b>City</b><br>
    <select name="city"  id="city">
    <option value="">Please select a city</option>
    </select><br>	


<center>From<br><select name="fyear">
<option>2015</option>
<option>2016</option>
<option>2017</option>
</select>
<center>To<br><select name="tyear">
<option>2015</option>
<option>2016</option>
<option>2017</option>
</select>


<center><button type="submit"  name="view">View</submit></center>
</form>
</body>
</html>


<script type="text/javascript">
 
// State lists
var states = new Array();
states['India']=new Array('Tamilnadu','Assam','Manipur','Rajasthan','Megalaya','Bihar','Kashmir',
'Kerala','Gujarat','Lakshadweep','Uttarpradesh','Maharastra','Uttarkhand');
 
// City lists
var cities = new Array();
cities['India'] = new Array();

cities['India']['Tamilnadu'] = new Array('Madurai','Coimbatore');
cities['India']['Assam'] = new Array('Baksa','Barpeta');
cities['India']['Manipur'] = new Array('Chandel','Bishnupur');
cities['India']['Rajasthan'] = new Array('Ajmar','Alwar');
cities['India']['Megalaya']= new Array('Shillong','Cherrapunji');
cities['India']['Bihar']= new Array('Patna','Gaya'); 
cities['India']['Kashmir']= new Array('Bandipora','Anantnag'); 
cities['India']['Kerala']= new Array('Allappuzha','Idukki'); 
cities['India']['Gujarat']= new Array('Ahmedabad','Surat'); 
cities['India']['Lakshadweep']= new Array('Lakshadweep','Kawaratti'); 
cities['India']['Uttarpradesh']= new Array('Rampur','Ghazipur'); 
cities['India']['Maharastra']=new Array('Mumbai','Nagpur');
cities['India']['Uttarkhand']=new Array('Uttranchal','Dehradun');
 
function setStates() {
  cntrySel = document.getElementById('country');
  stateList = states[cntrySel.value];
  changeSelect('state', stateList, stateList);
  setCities();
}
 
function setCities() {
  cntrySel = document.getElementById('country');
  stateSel = document.getElementById('state');
  cityList = cities[cntrySel.value][stateSel.value];
  changeSelect('city', cityList, cityList);
}
 
function changeSelect(fieldID, newOptions, newValues) {
  selectField = document.getElementById(fieldID);
  selectField.options.length = 0;
  for (i=0; i<newOptions.length; i++) {
    selectField.options[selectField.length] = new Option(newOptions[i], newValues[i]);
  }
}
 
function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}
 
addLoadEvent(function() {
  setStates();
});
</script>