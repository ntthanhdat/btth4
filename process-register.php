<?php 
include('config.php');
$errors = array(); // Initialize an error array. #2

	// Check for a first name:                        #3
		$first_name = trim($_POST['f_name']);
	if (empty($first_name)) {
		$errors[] = 'You forgot to enter your first name.';
	}
	// Check for a last name:
		$last_name = trim($_POST['l_name']);
	if (empty($last_name)) {
		$errors[] = 'You forgot to enter your last name.';
	}
	// Check for an email address:
		$email = trim($_POST['email']);
	if (empty($email)) {
		$errors[] = 'You forgot to enter your email address.';
    }
    $sql1="select * from users where email='$email'";
    $result=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($result)>0){
        $errors[] = 'Your email address already used.';
    }
	// Check for a password and match against the confirmed password:
			$password1 = trim($_POST['password1']);
			$password2 = trim($_POST['password2']);
	if (!empty($password1)) {
		if ($password1 !== $password2) { //#4
			$errors[] = 'Your two password did not match.';
		} 
	} else {
		$errors[] = 'You forgot to enter your password.';
    }
    
    if (empty($errors)) {
    //hashing the password
    $hash_pass= password_hash($password1, PASSWORD_DEFAULT); #hash not work yet
    //execute query
    print_r($hash_pass);
    echo $hash_pass;
    $sql="insert into users(first_name, last_name, email, password, registration_date)
    VALUES ('$first_name','$last_name','$email', '$password1', CURRENT_DATE)";
    mysqli_set_charset($conn,'UTF8');
     if(mysqli_query($conn,$sql)){
        header("Location:index.php");
     }
     else{
         $e= mysqli_error($conn);
        header("Location:error.php?error=$e");
     }
    }





?>