<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script></script>
<script type="text/javascript">
 function idForm(){
   var selectvalue = $('input[name=choice]:checked', '#idForm').val();
if(selectvalue == "Admin"){
window.open('adminlog.php','_self');
return true;
}
else if(selectvalue == "User"){
window.open('userlog.php','_self');
return true;
}
return false;
};
</script>
</head>
<body>
<form id="idForm">
<input type="radio" onclick="idForm()"  name="choice" value="Admin"/>Admin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio"  onclick="idForm()" name="choice" value="User"/>User &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</form>
</body>
</html>