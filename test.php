
<?php      

    require_once 'admin/Paginator.class.php';
 
    $conn       = new mysqli( '127.0.0.1', 'root', '', 'blogth4' );
 
    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
    $query      = "select userid, first_name, last_name, email, password from users";
 
    $Paginator  = new Paginator( $conn, $query );
 
    $results    = $Paginator->getData( $page, $limit );
?>
<div class="container pt-3">
          <div class="row">
              <div class="col">
              <table class="table table-striped table-inverse table-responsive">
                
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
                          
                          <?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
                            <tr>
                                    <?php 
                                    echo '<td scope="row">'.$results->data[$i]['userid'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['first_name'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['last_name'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['email'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['password'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['registration_date'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['user_level'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['userid'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['userid'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['userid'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['userid'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['userid'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['userid'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['userid'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['userid'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['userid'].'</td>';
                                    echo '<td scope="row">'.$results->data[$i]['userid'].'</td>';
                                    echo '<td> <a href="display.php?id='.$results->data[$i]['userid'].'"> <i class="fas fa-file-alt"></i></td>';
                                    echo '<td> <a href="edit.php?id='.$results->data[$i]['userid'].'"> <i class="far fa-edit"></i></td>';
                                    echo '<td> <a href="delete.php?id='.$results->data[$i]['userid'].'"> <i class="fas fa-trash-alt"></i></td>';
                                    ?>
                            </tr>
                    <?php endfor; ?>
                      </tbody>
              </table>
                             	
<?php echo $Paginator->createLinks( $links, 'pagination pagination-sm' ); ?> 
              </div>
          </div>
      </div>
<?php include('footer.php') ?>