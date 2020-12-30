
        <!-- xac minh dang nhap -->
 <?php      
session_start() ;
if ( !isset( $_SESSION[ 'userid' ] ) ){
    include('navbar-login.php');
}else{
    if($_SESSION['role']==1){
        include('navbar-admin.php');
    }else{
        include('navbar-user.php');
    }
    
}
?> 
<?php include('header.php');
include('config.php');
$sql="select * from users where userid=$_SESSION[userid]";
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
            $id=$_SESSION['userid'];
            $sql="select * from users where userid=$id ";
            $result=mysqli_query($conn,$sql);
              $post=mysqli_fetch_assoc($result);
            echo '<td>' .
              '<img src = "data:image/png;base64,' . base64_encode($post['avatar']) . '" width = "150px" height = "180px"/>'
              . '</td>';
             ?>
        </div>
        <div class="col-sm-8">
            <h3> <?php echo $post['first_name'].' '.$post['last_name']  ?></h3>
            <h6>Email: <?php echo $post['email'] ?></h6>
            <h6>Phone: <?php echo $post['phone'] ?></h6>
            <h6>Address1: <?php echo $post['address1'] ?></h6>
            <h6>Address2: <?php echo $post['address2'] ?></h6>
            <h6>City: <?php echo $post['city'] ?></h6>
            <h6>State country: <?php echo $post['state_country'] ?></h6>
            <h6>Zipcode/Postcode: <?php echo $post['zcode_pcode'] ?></h6>
            <h6> Registration date: <?php echo $post['registration_date'] ?> </h6>
            <h6> Class: <?php echo $post['class'] ?> </h6>
            <h6> Paid: <?php echo $post['paid'] ?> </h6>  
        </div>
        
        <div class="col-sm-2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Change 
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    
                <button name="" id="" class="btn  btn-outline-success mt-2"  role="button" data-toggle="modal" data-target="#editModal">Edit profile</button>
                <button name="" id="" class="btn  btn-outline-success mt-2"  role="button" data-toggle="modal" data-target="#uploadModal">Upload avatar</button>
                </ul>
            </div>
        </div>

</div>
</div> 

<!-- upload avatar -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload your avatar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="upload.php"  method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                        <span class="btn btn-default btn-file">
                          <input type="file" name="file" id="imgInp">
                          </span>
                        </div>
                        <img id='img-upload'/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-outline-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
<!-- Modal edit-->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
                <form action="profile-edit.php" method="post">
                    <div class="modal-body">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-outline-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    
        <script>
  $(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
 </script>
<?php include('footer.php')?>