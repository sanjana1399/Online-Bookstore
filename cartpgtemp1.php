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
left: 80%;
bottom: 18%;
position: absolute;
}
.button1{
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
left: 77%;
bottom: 2%;
position: absolute;
}
.button2{
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
left: 77%;
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
color: white;
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
<a href="categories.html"><button class="buttonlogout">BACK</button></a>
</p>
<h1>ADD QUANTITY</h1>
</head>
<body>

<table align="center" border="1px" style= "width:600px; line-height:40px;">
<tr><th colspan = "4">
<h2>BOOKS</h2>
</th>
</tr>
<t>
<th>BOOK_ID</th>
<th>BOOK NAME</th>
<th>PRICE</th>
<th>QUANTITY</th>
<th>TOTAL</th>

</t>
<?php

while($rows=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $rows['bookid']; ?></td>
<td><?php echo $rows['title']; ?></td>
<td><?php echo $rows['price']; ?></td>
<td>
<form>

<select name="<?php echo $rows['bookid']; ?>" onchange="this.form.submit()">

  <option value="0">0</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
<option value="5">5</option>
</select>
</form>
<?php
$d =$rows['bookid']; 

if(isset($_GET[$d]))
{
$bid = $rows['bookid'];
$cpy = $_GET[$d];
$query2 = "UPDATE trialcart SET copies= ($cpy) WHERE bookid = $bid AND username = (select username
from login
where id=(select max(id) from login))";
$con->query($query2);
$total1 = $cpy*$rows['price'];
$query3 = "UPDATE trialcart SET totalprice= ($total1) WHERE bookid = $bid AND username = (select username
from login
where id=(select max(id) from login))";
$con->query($query3);
 if (($con->query($query3))=== TRUE) 
  {	
   	 echo 'New record created successfully';
	 header("Location:cartpgtemp1.php");
  } 


}

 echo $rows['copies'];
?>

</td>
<td><?php echo $rows['totalprice']; ?></td>

</tr>
<?php
}
?>
</table>
<?php
while($rows=mysqli_fetch_assoc($result))
{
if($rows['totalprice'] == null)
{
$message = "wrong answer";
echo "<script type='text/javascript'>alert('$message');</script>";
break;
}
}
?>


<br>
<br><br><br>
<a href="delete&checkout.php"><button class="button2">EDIT</button></a>
<a href="finalcart.php"><button class="button1">DONE</button></a><br>

<br><br><br><br>
<br><br><br><br>



</form>
</body>

</html>
