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
<div class="clearfix container pt-3">
	<div class="row">
        
    <div class="col-sm-2">
            <?php
            echo '<td>' .
              '<img src = "data:image/png;base64,' . base64_encode($post['avatar']) . '" width = "150px" height = "180px"/>'
              . '</td>';
             ?>
        </div>  
    <div class="col-sm-8">
            <h3> <?php echo $post['first_name'].' '.$post['last_name']  ?></h3>
            <h6> User ID: <?php echo $post['userid'] ?> </h6>
            <h6>Email: <?php echo $post['email'] ?></h6>
            <h6>Phone: <?php echo $post['phone'] ?></h6>
            <h6>Address1: <?php echo $post['address1'] ?></h6>
            <h6>Address2: <?php echo $post['address2'] ?></h6>
            <h6>City: <?php echo $post['city'] ?></h6>
            <h6>State country: <?php echo $post['state_country'] ?></h6>
            <h6>Zipcode/Postcode: <?php echo $post['zcode_pcode'] ?></h6>
            <h6> Password: <?php echo $post['password'] ?> </h6>
            <h6> Registration date: <?php echo $post['registration_date'] ?> </h6>
            <h6> User level: <?php echo $post['user_level'] ?> </h6>
            <h6> Class: <?php echo $post['class'] ?> </h6>
            <h6> Paid: <?php echo $post['paid'] ?> </h6>
            <h6> Status: <?php echo $post['status'] ?> </h6>
            <h6> Active code: <?php echo $post['activation_code'] ?> </h6>
        </div>
        
        <div class="col-sm-2">
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
            <div>
            <a  class="btn btn-primary mt-3" href="index.php" style="background-color: #17a2bb; width: 98px">Back</a>
            </div>
        </div>
</div>
</div>

<?php include('footer.php') ?>
