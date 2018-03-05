<html>
  <img class="mySlides bg1" src="b2.jpg" style="width:100%">
  <img class="mySlides bg1" src="b3.jpg" style="width:100%">
  <img class="mySlides bg1" src="b4.jpg" style="width:100%">
  <img class="mySlides bg1 " src="b5.jpg" style="width:100%">
  <img class="mySlides bg1" src="b7.jpg" style="width:100%">
    <img class="mySlides bg1" src="b8.jpg" style="width:100%">
	  <img class="mySlides bg1" src="b9.jpg" style="width:100%">
<script>
var myIndex = 0;
carousel();
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</html>