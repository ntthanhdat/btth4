<?php
include('config.php');
$email = trim($_POST['email']);
if (empty($email)) {
    $errors[] = 'You forgot to enter your email address.';
}
$sql1="select * from users where email='$email'";
$result=mysqli_query($conn,$sql1);
if(mysqli_num_rows($result)<1){
    $errors[] = 'Your email address is not registed.';
}
// Check for a password and match against the confirmed password:
$password = trim($_POST['password']);
if (empty($password)) {
    $errors[] = 'You forgot to enter your password.';
}
if (empty($errors)){  
    
    if(mysqli_num_rows($result)>0){
        $user=mysqli_fetch_assoc($result);
    }
    if (password_verify($password, $user['password']) && $user['status']==1) {       
        session_start();								
        // Ensure that the user level is an integer. 
        $_SESSION[ 'userid' ] = $user['userid'];
        $_SESSION[ 'user_name' ] = $user['email'] ;
        $_SESSION[ 'role' ] = $user['user_level'];
        header ( 'Location: index.php' ) ;
    }else{
        
        $message = "wrong answer";
        echo "<script type='text/javascript'>alert('$message');</script>";
//header ( 'Location: index.php' ) ;
    }
}
?>