
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
   

$sql = "SELECT * FROM signup1 WHERE username LIKE '$u' AND password LIKE '$p'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo 'login okay';
    header("Location:categories.html");
	    $sqli="INSERT INTO login (username, password) VALUES ('$u','$p')";
	if ($con->query($sqli) === TRUE) {
   	 echo 'New record created successfully';
	} 
} else {
	echo 'incorrect username and password';
    header("Location:incorrect.html");
}
}
$con->close();
?>
