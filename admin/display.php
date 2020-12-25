<?php include('header.php');
include('config.php');
$id=$_GET['id'];
$sql="select * from users where userid='$id'";
mysqli_set_charset($conn,'UTF8');
$result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
    $post=mysqli_fetch_assoc($result);
}
?>
<div class="clearfix container">
	<div class="row">
        
        
        <div class="col-sm-8">
            <h3> <?php echo $post['first_name'].' '.$post['last_name']  ?></h3>
            <h6>Email: <?php echo $post['email'] ?></h6>
            <h6>Phone: <?php echo $post['phone'] ?></h6>
            <h6>Password: <?php echo $post['password'] ?></h6>
        </div>
        
        <div class="col-sm-4">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Change 
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <?php echo '<li><a href="edit.php?id='.$post['userid'].'"> <i class="far fa-edit"></i>&nbsp; Edit</li>'; ?>
                    <?php echo '<li><a href="delete.php?id='.$post['userid'].'"> <i class="fas fa-trash-alt"></i>&nbsp; Delete</li>'; ?>
                </ul>
            </div>
        </div>
</div>
</div>

<?php include('footer.php') ?>
