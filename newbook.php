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
  	
	$isbn = $_POST['isbn'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$publisher = $_POST['publisher'];
	$price = $_POST['price'];
	$bookid = $_POST['bookid'];
	$availability = $_POST['availability'];
	$category = $_POST['category'];

    $sql1="INSERT INTO allgenre (isbn,title,author,publisher,price,bookid,availability) VALUES ('$isbn','$title','$author','$publisher','$price','$bookid','$availability')"; 

if($category == "science fiction") {
$sql="INSERT INTO science_fiction (isbn,title,author,publisher,price,bookid,availability) VALUES ('$isbn','$title','$author','$publisher','$price','$bookid','$availability')";	}
if($category == "mystery") {
$sql="INSERT INTO mystery (isbn,title,author,publisher,price,bookid,availability) VALUES ('$isbn','$title','$author','$publisher','$price','$bookid','$availability')";	}
if($category == "fantasy") {
$sql="INSERT INTO fantacy (isbn,title,author,publisher,price,bookid,availability) VALUES ('$isbn','$title','$author','$publisher','$price','$bookid','$availability')";	}
if($category == "education") {
$sql="INSERT INTO education (isbn,title,author,publisher,price,bookid,availability) VALUES ('$isbn','$title','$author','$publisher','$price','$bookid','$availability')";}	
if($category == "classics") {
$sql="INSERT INTO classics (isbn,title,author,publisher,price,bookid,availability) VALUES ('$isbn','$title','$author','$publisher','$price','$bookid','$availability')"; }	



if ($con->query($sql) === TRUE) {
   	 echo "New record created successfully";
	} 
	else 
	{
   	 echo "Error: " . $sql . "<br>" . $con->error;
	}
	if($con)
	{
		echo 'connected';
	}
    if(!mysqli_query($con,$sql))
    {
       
   echo 'Not Inserted';
    }
    else{
          $id = mysqli_insert_id($con);
        echo 'INSERTED';
    }
if ($con->query($sql1) === TRUE) {
   	 echo "New record created successfully";
	} 
	else 
	{
   	 echo "Error: " . $sql1 . "<br>" . $con->error;
	}
	if($con)
	{
		echo 'connected';
	}
    if(!mysqli_query($con,$sql1))
    {
       
   echo 'Not Inserted';
    }
    else{
          $id = mysqli_insert_id($con);
        echo 'INSERTED';
    }
	
header("refresh:1; url=adinsert.html?id=$id");
?>

