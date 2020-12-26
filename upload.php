<?php

if(isset($_POST['fileUpload'])){
    $file=$_POST['fileUpload'];
    include('config.php');
    session_start();
    $id=$_SESSION['userid'];
    $sql="update users set avatar=LOAD_FILE('$file') where userid=$id";
    echo $sql;
    mysqli_set_charset($conn,'UTF8');
    if(mysqli_query($conn,$sql)){
        header("Location:index.php");
        }
        else{
            $e= mysqli_error($conn);
        header("Location:error.php?error=$e");
        }

}else{
    echo "no file choosen";
}

?>