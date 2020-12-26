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
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $conn=mysqli_connect('localhost', 'root', '', 'blogth4');
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
        $res_data = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
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
        }
        mysqli_close($conn);
    ?>
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