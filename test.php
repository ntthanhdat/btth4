<?php      
include('header.php');
session_start() ;
if ( !isset( $_SESSION[ 'userid' ] ) ){
    echo "chua co session";
}else{
    include('navbar-user.php');
    echo 'da co session;';
}
include('footer.php');
?> 
