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
<main class="container">

    <div class="row">
        <div class="col-md-12">
            <form action="edit-process.php" method="post">
            <div class="form-group">
                  <label for="">User id</label>
                  <input type="text" name="id" id="" class="form-control" value="<?php echo $post['userid'] ?>">
                </div>
                <div class="form-group">
                  <label for="">First Name</label>
                  <input type="text" name="fname" id="" class="form-control" value="<?php echo $post['first_name'] ?>">
                  
                </div>
                <div class="form-group">
                  <label for="">Last Name</label>
                  <input type="text" name="lname" id="" class="form-control" value="<?php echo $post['last_name'] ?>">
                </div>
                <div class="form-group">
                  <label for="">Phone</label><br>
                  <input type="text" name="phone" id="" class="form-control" value="<?php echo $post['phone'] ?>">
                </div>
                <div class="form-group">
                  <label for="">Email</label><br>
                  <input type="email" class="form-control" name="email" id="" value="<?php echo $post['email'] ?>">
                </div>
                <!-- Nhom mau -->
                <div class="form-group">
                    <label for=""> User Level</label>
                    <select name="blood" id="" class="form-control"  value="<?php echo $post['user_level'] ?>">
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                </div>
                
            <button type="submit" class="btn btn-primary">Save</button>
            </form>
            
        </div>
    </div>
</main>
<?php include('footer.php') ?>