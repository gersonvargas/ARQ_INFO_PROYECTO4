<?php
include_once("Customer.php");


if (isset($_GET['metodo'])) {
    if ($_GET['metodo'] == 'buscar') {
        $valor_buscado = $_GET['busqueda'];
        if ($valor_buscado !== '') {
           $clientes = Customer::getCustomerName($valor_buscado);
        } else {
           $clientes = Customer::getCustomers();
        }
    } else {
       $clientes = Customer::getCustomers();
    }
} else {
    $clientes = Customer::getCustomers();
}

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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="theme-color" content="#000000">

        <link rel="manifest" href="%PUBLIC_URL%/manifest.json">
        <link rel="shortcut icon" href="%PUBLIC_URL%/favicon.ico">
        <!--Importacion del css-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Customer Phone Bill</title>
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
                            <a class="nav-link" href="ListCustomer.php">Customers</a>
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
                <h3>Listing Customers</h3>
                <div>                   
                    <form action='ListCustomer.php' method='GET' class="form-inline my-2 my-md-0">
                        <input type="hidden" name="metodo" value="buscar" placeholder="Buscar"/>
                        <input class="form-control" type="text" name="busqueda" placeholder="Buscar archivos"/>
                        <button type="submit" name="submit"><img src="../Images/busqueda.png"></button>
                    </form>
                </div>
            </div>
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Adress</th>
                            <th>Detail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>



                        <?php
                        if (count($clientes) > 0) {
                            //var_dump($clientes);
                            foreach ($clientes as $value) {
                                echo '<tr>';
                                echo '<td>' . $value['CUSTOMER_ID'] . "</td>";
                                echo '<td>' . $value['CUSTOMER_NAME'] . "</td>";
                                echo '<td>' . $value['CUSTOMER_EMAIL'] . "</td>";
                                echo '<td>' . $value['CUSTOMER_ADDRESS'] . "</td>";
                                echo '<td>' . $value['OTHER_DETAILS'] . "</td>";
                                echo '<td>'
                                . '<a class="btn btn-primary btn-sm" href="CustomerForm.php?CUSTOMER_ID='.$value['CUSTOMER_ID'].'">Edit</a>'
                                . '<b> | </b><a class="btn btn-danger btn-sm" href="Actions.php?customerId='.$value['CUSTOMER_ID'].'&metodo=delete">Delete</a> </td>';
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
                
                <a href="CustomerForm.php" class="btn btn-success btn-sm">Add New</a>
            </div>
        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted">Place sticky footer content here.</span>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/ionicons@4.4.2/dist/ionicons.js"></script>
    </body>
</html>

