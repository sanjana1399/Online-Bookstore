<?php

$con = mysqli_connect("127.0.0.1","root","","mini");
if(isset($_POST['sub']))
$cb1=$_POST['cartitem'];
$chk="";
foreach($cb1 as $chk1)
{
$chk .= $chk1;
$id=1;
$res = "SELECT username FROM login WHERE id=(SELECT max(id) FROM login)";
$u = $con->query($res);
$chk = substr($chk, -3);
$sql1 = "select title from allgenre A where A.bookid = '$chk'";
$t = $con->query($sql1);
$sql2 = "select price from allgenre where bookid = '$chk'";
$p = $con->query($sql2);

$sqlu = "insert into trialcart(username) select username
from login
where id=(select max(id) from login)";
if (($con->query($sqlu))=== TRUE) {
   	 echo 'New record created successfully';
	}  
$sqli = "update trialcart set bookid='$chk' where id=(select max(id) from trialcart)";


if (($con->query($sqli))=== TRUE) 
{
   	 echo 'New record created successfully';
	}  
$sqlj= "update trialcart set price = (select price from allgenre A where A.bookid = '$chk') where id=(select max(id) from trialcart)";

if (($con->query($sqlj))=== TRUE) 
{
   	 echo 'New record created successfully';
	}  
$sqlk= "update trialcart set title = (select title from allgenre A where A.bookid = '$chk') where id=(select max(id) from trialcart)";

if (($con->query($sqlk))=== TRUE) 
{	
   	 echo 'New record created successfully';
	 header("Location:cartpgtemp1.php");
	}  
else  
   {  
       echo "Error: " . $sql . "<br>" . $con->error; 
   }  
}
$con->close();
?> 