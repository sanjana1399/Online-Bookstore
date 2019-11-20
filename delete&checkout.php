<?php

$con = mysqli_connect("127.0.0.1","root","","mini");
$query="select * from trialcart where username = (select username
from login
where id=(select max(id) from login))";
$result = $con->query($query);

?>

<!DOCTYPE html>
<html>
<head>
<style>
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
h1{
background-color: black;
text-align: center;
font-family: Georgia;
color: MistyRose;
font-size: 3.25em;
top:20%;
}
body{
background-image: linear-gradient(to bottom right, white , #a67e7b);
background-repeat: no-repeat;
background-size: cover;
}
.btns input[name="CO"]{
display: block;
margin: 10px auto;
color: MistyRose;
background: black;
padding: 14px 24px;
right: 100%;
border-radius: 15px;
cursor:pointer;
font-family: serif;
font-size: 1.25em;
opacity:1;
left: 80%;
position: absolute;
}

.box input[type="submit"]{
display: block;
margin: 10px auto;
color: MistyRose;
background: black;
padding: 14px 24px;
border-radius: 15px;
cursor:pointer;
font-family: serif;
font-size: 1.25em;
opacity:1;
left: 70%;
bottom: 18%;
position: absolute;
}

.button{
display: block;
margin: 10px auto;
color: MistyRose;
background: black;
padding: 14px 24px;
border-radius: 15px;
cursor:pointer;
font-family: serif;
font-size: 1.25em;
opacity:1;
left: 70%;
bottom: 10%;
position: absolute;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #b39896;
  text-align: left;
  padding: 8px;
}

tr:nth-child(odd) {
  background-color: #5e4644;
color: white;
}
tr:nth-child(even) {
  background-color: black;
color: white;
}

</style>
<title>YOUR CART</title>
<p align = "right">
<a href="categories.html"><button class="buttonlogout">CATEGORIES</button></a>
<a href="LOGITIN.html"><button class="buttonlogout">LOGOUT</button></a>
<a href="cartpgtemp1.php"><button class="buttonlogout">BACK</button></a>
</p>
<h1>ITEMS IN YOUR CART</h1>
</head>
<body>
<form class="box" method ="POST" action="deleteitem.php">
<table align="center" border="1px" style= "width:600px; line-height:40px;">
<tr><th colspan = "4">
<h2>BOOKS</h2>
</th>
</tr>
<t>
<th>BOOK_ID</th>
<th>BOOK NAME</th>
<th>PRICE</th>
<th>COPIES</th>
<th>TOTAL</th>
<th>DELETE</th>
</t>
<?php

while($rows=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $rows['bookid']; ?></td>
<td><?php echo $rows['title']; ?></td>
<td><?php echo $rows['price']; ?></td>
<td><?php echo $rows['copies']; ?></td>
<td><?php echo $rows['totalprice']; ?></td>
<td><input type="checkbox" name="delitem[]" value="<?php echo $rows['bookid']; ?>"></td>

</tr>
<?php
}
?>
</table>
<br>

<input type = "submit" onclick="location.href='cartpg.html'"value="DELETE" name="del">

</form>
<br><br><br><br>
<a href="finalcart.php"><button class="button">CHECKOUT</button></a>
<br><br><br><br><br><br><br><br><br><br>
</body>

</html>
