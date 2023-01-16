<?php

if(isset($_POST['submit'])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password1 = $_POST['password1'];
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "create";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);

if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

$sql = " INSERT INTO register (firstname, lastname, email, contact, password1) VALUES ('$firstname', '$lastname', '$email', '$contact', '$password1')";
// insert in database 
$result = mysqli_query($con, $sql);

if($result)
{
	echo "Contact Records Inserted";
}

mysqli_close($con);

?>