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
  	
	$username = $_POST['username'];
	$phone = $_POST['phoneno'];
	$email = $_POST['emailid'];
	$password = $_POST['pass'];
	if(strlen($phone) != 10)
	{
	 	header("refresh:1; url=signin2.html?id=$id");
	}
	

	else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) { 
    	header("refresh:1; url=signin3.html?id=$id"); 
	} 
	else if(strlen($password) < 8)
	{
	 	header("refresh:1; url=signin4.html?id=$id");
	}
	else
	{
  	  $sql="INSERT INTO signup1 (username,phone,email,password) VALUES ('$username','$phone','$email','$password')";
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
		header("refresh:1; url=LOGITIN.html?id=$id");
	}
?>

