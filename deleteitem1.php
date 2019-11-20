<?php

$con = mysqli_connect("127.0.0.1","root","","mini");
if(isset($_POST['del']))
$cb1=$_POST['delitem'];
$chk="";
foreach($cb1 as $chk1)
{
$chk .= $chk1;
$id=1;
$res = "delete FROM allgenre WHERE bookid='$chk'";
if (($con->query($res))=== TRUE) {
   	 echo "<h1>item deleted successfully</h1>";
	header("Location:addelete.php");
	}
else
{ 
echo 'COULD NOT DELETE';
}
}  
$con->close();
?>