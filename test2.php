<html>

<head>
    <title>Pagination</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 20;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $conn=mysqli_connect( 'localhost', 'root', '', 'blogth4' );
        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }

        $total_pages_sql = "SELECT COUNT(*) FROM users";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM users LIMIT $offset, $no_of_records_per_page";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_all($result);
        }
        mysqli_close($conn);
    ?>
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
            <?php 
                          foreach($row as $post){
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
    <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</body>

</html>