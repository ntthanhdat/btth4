<?php
include('config.php');
$sql1="select userid from users where email='d@gmail.com' ";
        $result=mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result)>0){
            $id=mysqli_fetch_assoc($result);
        }   
        echo $id['userid'];