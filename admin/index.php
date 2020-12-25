
<?php      
session_start() ;
if ( !isset( $_SESSION[ 'userid' ] ) ){
    header('Location:../index.php');
}else{
    if($_SESSION['role']==1){
        include('header.php');
    }else{
        header('Location:../index.php');
    }
    
}
?> 
<div class="container pt-3">
          <div class="row">
              <div class="col">
              <table class="table table-striped table-inverse table-responsive">
                <?php include('config.php');
                   
                    $sql="select * from users";
                        mysqli_set_charset($conn,'UTF8');
                        $result=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                            $post_list=mysqli_fetch_all($result);
                        }
                    ?>
                  <thead class="thead-inverse">
                      <tr>
                          <th>User ID</th>
                          <th>First name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Registration date</th>
                          <th>User level</th>
                          <th>Class</th>
                          <th>Adress 1</th>
                          <th>Adress 2</th>
                          <th>City</th>
                          <th>State country</th>
                          <th>Pcode</th>
                          <th>Phone</th>
                          <th>Paid</th>
                          <th>Status</th>
                          <th>Active code</th>
                          <th>Details</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php 
                          foreach($post_list as $post){
                              echo '<tr>';
                              echo '<td scope="row">'.$post[0].'</td>';
                              echo '<td scope="row">'.$post[1].'</td>';
                              echo '<td scope="row">'.$post[2].'</td>';
                              echo '<td scope="row">'.$post[3].'</td>';
                              echo '<td scope="row">'.$post[4].'</td>';
                              echo '<td scope="row">'.$post[5].'</td>';
                              echo '<td scope="row">'.$post[6].'</td>';
                              echo '<td scope="row">'.$post[7].'</td>';
                              echo '<td scope="row">'.$post[8].'</td>';
                              echo '<td scope="row">'.$post[9].'</td>';
                              echo '<td scope="row">'.$post[10].'</td>';
                              echo '<td scope="row">'.$post[11].'</td>';
                              echo '<td scope="row">'.$post[12].'</td>';
                              echo '<td scope="row">'.$post[13].'</td>';
                              echo '<td scope="row">'.$post[14].'</td>';
                              echo '<td scope="row">'.$post[15].'</td>';
                              echo '<td scope="row">'.$post[16].'</td>';
                              echo '<td> <a href="display.php?id='.$post[0].'"> <i class="fas fa-file-alt"></i></td>';
                              echo '<td> <a href="edit.php?id='.$post[0].'"> <i class="far fa-edit"></i></td>';
                              echo '<td> <a href="delete.php?id='.$post[0].'"> <i class="fas fa-trash-alt"></i></td>';
                              echo '</tr>';
                          }
                          ?>
                          
                          </tr>
                      </tbody>
              </table>
              </div>
          </div>
      </div>
<?php include('footer.php') ?>