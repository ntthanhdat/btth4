<?php 
$pass="dat";
$hash=password_hash($pass, PASSWORD_DEFAULT);
print_r($hash);
?>