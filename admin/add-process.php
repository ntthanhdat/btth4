<?php 
include('config.php');
$id=$_POST['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$user_level=$_POST['user_level'];

$sql="insert into users(first_name, last_name, email, password, address1, address2, phone, user_level)
VALUES ('$fname','$lname','$email', '$password' ,'$address1', '$address2', '$phone','$user_level')";
mysqli_set_charset($conn,'UTF8');
 if(mysqli_query($conn,$sql)){
     header("Location:index.php");
 }
 else{
     $e= mysqli_error($conn);
    header("Location:error.php?error=$e");
 }
?>