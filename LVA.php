<?php
$con = mysqli_connect("127.0.0.1","root","","mini");
    
    if(!$con)
    {
        echo 'Not Connected to server';
    }

    if(!mysqli_select_db($con,'mini'))
    {
        echo 'Database not Selected';
    }

if($_POST)
{
  $u = $_POST["username"];
  $p = $_POST["pass"];
   

$sql = "SELECT * FROM adminlogin WHERE username LIKE '$u' AND password LIKE '$p'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo 'login okay';
    header("Location:adminpg.html"); 
} else {
	echo 'incorrect username and password';
    header("Location:adminlog.html?error=not found");
}
}
$con->close();
?>