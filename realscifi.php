<?php

$con = mysqli_connect("127.0.0.1","root","","mini");
$query="select * from science_fiction";
$result = $con->query($query);

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
background-color: #c7b37f;
}
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 500px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.addtocart{
background-color: #729e7e; 
opacity: 0.85; 
border: none;  
color: black;

padding: 6px 10px;  
text-align: center;  
text-decoration: none;  
display: inline-block;  
font-size: 16px;
margin: 4px 2px;  
font-size: 24px;
border-radius: 12px;
cursor: pointer;
right: 70%;
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.buttonlogout{
background-color: #301601; 
opacity: 0.85; 
border: none;  
color: white;  
padding: 15px 32px;  
text-align: center;  
text-decoration: none;  
display: inline-block;  
font-size: 16px;
margin: 4px 2px;  
font-size: 24px;
border-radius: 12px;
cursor: pointer;
right: 70%;
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
</style>
<p align ="right">
<a href="cartpgtemp1.html"><button class="buttonlogout">CART</button></a>
<a href="categories.html"><button class="buttonlogout">BACK</button></a>
<a href="LOGITIN.html"><button class="buttonlogout">LOGOUT</button></a>
</p>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="scifi1.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="scifi2.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="scifi3.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

</script>
</head>
<body>
<form method="POST" action="addingcart1.php">
<table>
<tr><th colspan = "4">
<h2>SCI-FI BOOKS</h2>
</th>
</tr>

<t>
<th>ISBN</th>
<th>TITLE</th>
<th>AUTHOR</th>
<th>PUBLISHER</th>
<th>PRICE</th>
<th>ADD</th>

</t>
<?php
while($rows=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $rows['isbn']; ?></td>
<td><?php echo $rows['title']; ?></td>
<td><?php echo $rows['author']; ?></td>
<td><?php echo $rows['publisher']; ?></td>
<td><?php echo $rows['price']; ?></td>
<td><input type="checkbox" name="cartitem[]" value="<?php echo $rows['bookid']; ?>"></td>

</tr>
<?php
}
?>
</table>
<p align = "right">
<input type="submit" onclick="location.href='cartpgtemp1.php'" value="ADD TO CART" name="sub" class ="addtocart" align="right">
</p>

</body>
</html>
