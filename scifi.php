<?php

$con = mysqli_connect("127.0.0.1","root","","mini");
$query="select * from science_fiction";
$result = $con->query($query);

?>

<!DOCTYPE html>
<html>
<title><head> CART </head></title>

<head>

</head>
<body>
<table align="center" border="1px" style= "width:600px; line-height:40px;">
<tr><th colspan = "4">
<h2>books</h2>
</th>
</tr>
<t>
<th>isbn</th>
<th>title</th>
<th>author</th>
<th>publisher</th>
<th>book id</th>
<th>price</th>
<th>availability</th>
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
<td><?php echo $rows['bookid']; ?></td>
<td><?php echo $rows['price']; ?></td>
<td><?php echo $rows['availability']; ?></td>
</tr>
<?php
}
?>
</table>
</body>
</html>