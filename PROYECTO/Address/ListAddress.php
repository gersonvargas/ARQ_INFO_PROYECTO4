<?php
include_once("./Address.php");
$clientes = Addreess::getAddresses();

if (!isset($_SESSION['login'])) {
    // header("Location: " . "../index.php");
    // exit();
}

$success_message = NULL;
if (isset($_SESSION['success_msg'])) {
    $success_message = $_SESSION['success_msg'];
    $_SESSION['success_msg'] = NULL;
}

$error_message = NULL;
if (isset($_SESSION['error_msg'])) {
    $error_message = $_SESSION['error_msg'];
    $_SESSION['error_msg'] = NULL;
}

//$name = $_SESSION['username'];
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Customers</title>
        <link href="../Bootstrap4/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../Bootstrap4/js/bootstrap.min.js" type="text/javascript"></script>

        <link rel="shortcut icon" type="image/png" href="../images/mp4.png"/>
        <link href="../styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <div class="topnav">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Customer Phone Bill</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../Index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Customer/ListCustomer.php">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Addresses</a>
                        </li>

                    </ul>
                    <form class="form-inline my-2 my-md-0">
                        <input class="form-control" type="text" placeholder="Search">
                    </form>
                </div>
            </nav>
        </div>

        <main class="container">
            <div class="row">
                <h3>Listing Addresses</h3>
                <div>
                    <form class="form-inline my-2 my-md-0">
                        <input class="form-control" type="text" placeholder="Search">
                    </form>

                </div>
            </div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>[]</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Adress</th>
                            <th>Detail</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($clientes) > 0) {
                            //var_dump($clientes);
                            foreach ($clientes as $value) {
                                echo '<tr>';
                                echo '<td><input type="checkbox" class="form-check-input" value=""></td>';
                                echo '<td>' . $value['CUSTOMER_ID'] . "</td>";
                                echo '<td>' . $value['CUSTOMER_NAME'] . "</td>";
                                echo '<td>' . $value['CUSTOMER_EMAIL'] . "</td>";
                                echo '<td>' . $value['CUSTOMER_ADDRESS'] . "</td>";
                                echo '<td>' . $value['OTHER_DETAILS'] . "</td>";
                                echo '<td> <button type="button" class="btn btn-primary btn-sm">Edit</button> </td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<p class="alert alert-warning"> There are no customers! </p>';
                        }
                        ?>
                    </tbody>
                </table>
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row float-right mr-auto">
                <button type="button" class="btn btn-danger btn-sm">Delete Selected</button>
                <button type="button" class="btn btn-success btn-sm">Add New</button>
            </div>
        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted">Place sticky footer content here.</span>
            </div>
        </footer>
    </body>
</html>

