<?php
include('config.php');
session_start();
$id=$_SESSION['userid'];
$sql="update users set avatar=LOAD_FILE('B:\xampp\htdocs\onmifood\image\customer-3.jpg') where userid=$id";
mysqli_set_charset($conn,'UTF8');
 if(mysqli_query($conn,$sql)){
     header("Location:index.php");
    }
    else{
        $e= mysqli_error($conn);
       header("Location:error.php?error=$e");
    }

?>