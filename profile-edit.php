<?php
include('config.php');
session_start();
$id=$_SESSION['userid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$sql="update users set first_name='$fname',  last_name='$lname',  phone = '$phone', email ='$email' where userid=$id";
mysqli_set_charset($conn,'UTF8');
 if(mysqli_query($conn,$sql)){
     header("Location:index.php");
    }
    else{
        $e= mysqli_error($conn);
       header("Location:error.php?error=$e");
    }

?>