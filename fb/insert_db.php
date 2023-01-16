<?php
require 'connection.php';
function checkuser($conn, $facebook_id, $username, $email)
{
    $sql1 = "select * from socialmedia where oauth_uid='$facebook_id'";
    $check = mysqli_query($conn,$sql1);
    $checkdta = mysqli_num_rows($check);
    if (empty($checkdta)) { // New user Insertion       
        $query = "INSERT INTO socialmedia (oauth_uid,name,email) VALUES ('$facebook_id','$username','$email')";
        mysqli_query($conn,$query);
    mysqli_error($query);
    } else { // Returned user data update        
        $queryupdate = "UPDATE socialmedia SET name='$username', email='$email' where oauth_uid='$facebook_id'";
        mysqli_query($conn,$queryupdate);      
        mysqli_error($query);
    }
}
?>