<?php
$conn=mysqli_connect('localhost', 'root', '', 'blogth4');
if(!$conn){
    die("kết nối thất bại ".mysqli_connect_error());
}
?>