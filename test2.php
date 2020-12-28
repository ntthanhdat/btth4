<?php
    include('config.php');
    session_start();
    $id=$_SESSION['userid'];
    $sql="select * from users where userid=$id ";
    $result=mysqli_query($conn,$sql);
      $post=mysqli_fetch_assoc($result);
    echo '<td>' .
      '<img src = "data:image/png;base64,' . base64_encode($post['avatar']) . '" width = "50px" height = "50px"/>'
      . '</td>';
?>