<?php include('header.php')?>
<!-- Nav tabs -->
       

        <!-- xac minh dang nhap -->
 <?php      
session_start() ;
if ( !isset( $_SESSION[ 'userid' ] ) ){
    include('navbar-login.php');
}else{
    include('navbar-user.php');
}
?> 
<?php include('footer.php')?>