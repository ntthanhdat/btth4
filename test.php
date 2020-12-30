<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location:../index.php');
} else {
    if ($_SESSION['role'] == 1) {
        include('header.php');
    } else {
        header('Location:../index.php');
    }
}
?>
<div class="container pt-1">
    <div class="row">
        <div class="col">
            <?php

            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 20;
            $offset = ($pageno - 1) * $no_of_records_per_page;

            $conn = mysqli_connect('localhost', 'root', '', 'blogth4');
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                die();
            }

            $total_pages_sql = "SELECT COUNT(*) FROM users";
            $result = mysqli_query($conn, $total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);

            $sql = "SELECT * FROM users LIMIT $offset, $no_of_records_per_page";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_all($result);
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
                    foreach ($row as $post) {
                        echo '<tr>';
                        echo '<td scope="row">' . $post[0] . '</td>';
                        echo '<td scope="row">' . $post[1] . '</td>';
                        echo '<td scope="row">' . $post[2] . '</td>';
                        echo '<td scope="row">' . $post[3] . '</td>';
                        echo '<td scope="row">' . $post[4] . '</td>';
                        echo '<td scope="row">' . $post[5] . '</td>';
                        echo '<td scope="row">' . $post[6] . '</td>';
                        echo '<td scope="row">' . $post[7] . '</td>';
                        echo '<td scope="row">' . $post[8] . '</td>';
                        echo '<td scope="row">' . $post[9] . '</td>';
                        echo '<td scope="row">' . $post[10] . '</td>';
                        echo '<td scope="row">' . $post[11] . '</td>';
                        echo '<td scope="row">' . $post[12] . '</td>';
                        echo '<td scope="row">' . $post[13] . '</td>';
                        echo '<td scope="row">' . $post[14] . '</td>';
                        echo '<td scope="row">' . $post[15] . '</td>';
                        echo '<td scope="row">' . $post[16] . '</td>';
                        echo '<td> <a href="display.php?id=' . $post[0] . '"> <i class="fas fa-file-alt"></i></td>';
                        echo '<td> <a href="edit.php?id=' . $post[0] . '"> <i class="far fa-edit"></i></td>';
                        echo '<td> <a href="delete.php?id=' . $post[0] . '"> <i class="fas fa-trash-alt"></i></td>';
                        echo '</tr>';
                    }
                    ?>

                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
                        <li class="page-item <?php if ($pageno <= 1) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link" href="<?php if ($pageno <= 1) {
                                                            echo '#';
                                                        } else {
                                                            echo "?pageno=" . ($pageno - 1);
                                                        } ?>">Prev</a>
                        </li>
                        <li class="page-item <?php if ($pageno >= $total_pages) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                                            echo '#';
                                                        } else {
                                                            echo "?pageno=" . ($pageno + 1);
                                                        } ?>">Next</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a>
                        </li>
                    </ul>
                </nav>
            </div>
            </body>

            </html>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Action 1</a>
                    <a class="dropdown-item" href="#">Action 2</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<?php include('footer.php') ?>