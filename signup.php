<html>
<head>
<link rel="stylesheet" href="design.css">
<link rel="stylesheet" href="reg.css">
</head>
<body>
<div id="whole">
<?php include 'header.php';?>
<div id="center1">
<div id="pic">
<?php include 'picture.php';?>
</div>
<div id="signin">
<div class="form-style-5">
<form>
<fieldset>
<legend><span class="number">1</span> Registration Form</legend>
<input type="text" name="field1" placeholder="First Name *">
<input type="text" name="field2" placeholder="Last Name *">
<input type="email" name="field3" placeholder="EmailID *">
<input type="text" name="field4" placeholder="User Name *">
<input type="password" name="field5" placeholder="Password *">
<input type="password" name="field6" placeholder="Repeat Password *">
<label for="country">Country</label>
<select  id="country" name="country" onchange="setStates();">
    <option value="India">India</option>
    </select>
<label for="State">State</label>
<select id="state" name="state" onchange="setcities();">
<option value="">Please select a State</option>
    
<!--<optgroup label="State">
<select name="state" id="state" onchange="setCities();">
    <option value="State">State</option>-->
    </select>
  
  <!--<option value="andhrapradesh">Andhra Pradesh</option>
  <option value="tamilnadu">Tamil Nadu</option>
</optgroup>
</select>-->
<label for="City">City</label>
<select id="city" name="city">
<!--<optgroup label="City">
<select name="city" id="city">
<select name="city"  id="city">
    <option value="City">City</option>-->
	 <option value="">Please select a city</option>
   
    </select><br>	
	

<!--  <option value="chitoor">Chitoor</option>
  <option value="madurai">Madurai</option>
</optgroup>
</select>  -->
<input type="text" name="field7" placeholder="Organization *">
<input type="number" name="field8" placeholder="Phone Number *">
</fieldset>
<input type="submit" value="Submit" />
</form>
</div>
</div>
</div>
<div id="footer">
<?php include 'footer.php';?>
</div>
</div>

<script type="text/javascript">
 
// State lists
var states = new Array();
 
states['India']=new Array('Tamilnadu','Assam','Manipur','Rajasthan','Megalaya','Bihar','Kashmir',
'Kerala','Gujarat','Lakshadweep','Uttarpradesh','Maharastra','Uttarkhand');
/*states['Canada'] = new Array('Alberta','British Columbia','Ontario');
states['Philippines'] = new Array('Manila','Albay','Cam-Sur');
states['United States'] = new Array('California','Florida','New York');
 */
 
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
/* 
cities['Canada'] = new Array();
cities['Canada']['Alberta']          = new Array('Edmonton','Calgary');
cities['Canada']['British Columbia'] = new Array('Victoria','Vancouver');
cities['Canada']['Ontario']          = new Array('Toronto','Hamilton');
 
cities['Philippines'] = new Array();
cities['Philippines']['Manila'] = new Array('Paranaque','Quezon City');
cities['Philippines']['Albay']       = new Array('Legazpi City','Camalig');
cities['Philippines']['Cam-Sur']         = new Array('Naga','ehem');
 
cities['United States'] = new Array();
cities['United States']['California'] = new Array('Los Angeles','San Francisco');
cities['United States']['Florida']    = new Array('Miami','Orlando');
cities['United States']['New York']   = new Array('Buffalo','new York');
 */
 
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



	<script type="text/javascript">
	(function()
	{
				
		//add event construct for modern browsers or IE
		//which fires the callback with a pre-converted target reference
		function addEvent(node, type, callback)
		{
			if(node.addEventListener)
			{
				node.addEventListener(type, function(e)
				{
					callback(e, e.target);
					
				}, false);
			}
			else if(node.attachEvent)
			{
				node.attachEvent('on' + type, function(e)
				{
					callback(e, e.srcElement);
				});
			}
		}
		
		
		//identify whether a field should be validated
		//ie. true if the field is neither readonly nor disabled, 
		//and has either "pattern", "required" or "aria-invalid"
		function shouldBeValidated(field)
		{
			return (
				!(field.getAttribute('readonly') || field.readonly)
				&&
				!(field.getAttribute('disabled') || field.disabled)
				&&
				(
					field.getAttribute('pattern')
					||
					field.getAttribute('required')
				)
			); 
		}
		
		
		//field testing and validation function
		function instantValidation(field)
		{
			//if the field should be validated
			if(shouldBeValidated(field))
			{
				//the field is invalid if: 
				//it's required but the value is empty 
				//it has a pattern but the (non-empty) value doesn't pass
				var invalid = 
				(
					(field.getAttribute('required') && !field.value)
					||
					(
						field.getAttribute('pattern') 
						&& 
						field.value 
						&& 
						!new RegExp(field.getAttribute('pattern')).test(field.value)
					)
				);
		
				//add or remove the attribute is indicated by 
				//the invalid flag and the current attribute state
				if(!invalid && field.getAttribute('aria-invalid'))
				{
					field.removeAttribute('aria-invalid');
				}
				else if(invalid && !field.getAttribute('aria-invalid'))
				{
					field.setAttribute('aria-invalid', 'true');
				}
			}
		}
		
		
		//now bind a delegated change event 
		//== THIS FAILS IN INTERNET EXPLORER <= 8 ==//
		//addEvent(document, 'change', function(e, target) 
		//{ 
		//	instantValidation(target); 
		//});
		
		
		//now bind a change event to each applicable for field
		var fields = [
			document.getElementsByTagName('input'), 
			document.getElementsByTagName('textarea')
			];
		for(var a = fields.length, i = 0; i < a; i ++)
		{
			for(var b = fields[i].length, j = 0; j < b; j ++)
			{
				addEvent(fields[i][j], 'change', function(e, target)
				{
					instantValidation(target);
				});
			}
		}
		
		
	})();
	</script>	
	
<script>
    $(document).ready(function() {
	$('form').on('submit', function (e) {
    var focusSet = false;
    if (!$('#emailid').val()) {
        if ($("#emailid").parent().next(".validation").length == 0) // only add if not added
        {
            $("#emailid").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter valid email address</div>");
        }
        e.preventDefault(); // prevent form from POST to server
        $('#emailid').focus();
        focusSet = true;
    } else {
        $("#emailid").parent().next(".validation").remove(); // remove it
    }
    
}); 
</script>
</body>
</html>