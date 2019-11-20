<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_POST)
{
  $u = $_POST['username'];
  $p = $_POST['pass'];
   

$sql = "SELECT * FROM signup1 WHERE username LIKE '$u' AND password LIKE '$p'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "login okay";
    header("Location:categories.html");
	    $sqli="INSERT INTO login (username, password) VALUES ('$u','$p')";
	if ($con->query($sqli) === TRUE) {
   	 echo "New record created successfully";
	} 
} else {
    header("Location:LOGITIN.html?error=not found");
}
}
$conn->close();
?>