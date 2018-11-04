<?php
include_once("./Address.php");


if (isset($_GET['metodo'])) {
    if ($_GET['metodo'] == 'buscar') {
        $valor_buscado = $_GET['busqueda'];
        if ($valor_buscado !== '') {
            $clientes = Addreess::getAddressID($valor_buscado);
        } else {
            $clientes = Addreess::getAddresses();
        }
    } else {
        $clientes = Addreess::getAddresses();
    }
} else {
    $clientes = Addreess::getAddresses();
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
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Addresses</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.css" crossorigin="anonymous">
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
                <h3>Listing Adresses</h3>

            </div>
            <div class="">
                <table data-toggle="table" id="tableCustomers" class="table table-hover">
                    <thead>
                        <tr>
                            <th data-field="Id" data-sortable="true">Id</th>
                            <th data-field="line1" data-sortable="true">Line 1</th>
                            <th data-field="line2" data-sortable="true">Line 2</th>
                            <th data-field="line3" data-sortable="true">Line 3</th>
                            <th data-field="city" data-sortable="true">City</th>
                            <th data-field="Country" data-sortable="true">Country</th>
                            <th data-field="codepost" data-sortable="true">Post Code</th>
                            <th data-field="province" data-sortable="true">Province</th>
                            <th data-field="details" data-sortable="true">Details</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (count($clientes) > 0) {
                            /*
                              ADDRESS_ID INT PRIMARY KEY,
                              LINE1 VARCHAR(20),
                              LINE2 VARCHAR(20),
                              LINE3 VARCHAR(20),
                              CITY VARCHAR(20),
                              ZIP_POSTCODE VARCHAR(20),
                              STATE_PROVINCE_COUNTRY VARCHAR(20),
                              COUNTRY VARCHAR(20),
                              OTHER_DETAILS VARCHAR(20) */
                            //var_dump($clientes);
                            foreach ($clientes as $value) {
                                echo '<tr>';
                                echo '<td>' . $value['ADDRESS_ID'] . "</td>";
                                echo '<td>' . $value['LINE1'] . "</td>";
                                echo '<td>' . $value['LINE2'] . "</td>";
                                echo '<td>' . $value['LINE3'] . "</td>";
                                echo '<td>' . $value['CITY'] . "</td>";
                                echo '<td>' . $value['COUNTRY'] . "</td>";
                                echo '<td>' . $value['ZIP_POSTCODE'] . "</td>";
                                echo '<td>' . $value['STATE_PROVINCE_COUNTRY'] . "</td>";
                                echo '<td>' . $value['OTHER_DETAILS'] . "</td>";
                                echo '<td>'
                                . '<a class="btn btn-primary btn-sm" href="AddressForm.php?ADDRESS_ID=' . $value['ADDRESS_ID'] . '">Edit</a>'
                                . '<b> | </b><a class="btn btn-danger btn-sm" href="CustAddressRelationForm.php?ADDRESS_ID=' . $value['ADDRESS_ID'] . '&metodo=delete">Asociate</a> </td>'
                                . '<b> | </b><a class="btn btn-danger btn-sm" href="Actions.php?ADDRESS_ID=' . $value['ADDRESS_ID'] . '&metodo=delete">Delete</a> </td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<p class="alert alert-warning"> There are no Addresses! </p>';
                        }
                        ?>
                    </tbody>
                </table>

            </div>
            <div class="row float-right mr-auto">
                <a href="AddressRelations.php" class="btn btn-info btn-sm mr-2">See All Relations</a>

                <a href="AddressForm.php" class="btn btn-success btn-sm">Add New Address</a>
            </div>
        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted">Place sticky footer content here.</span>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>           
        <script src="../js/Customers/Customers.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.js"></script> 


    </body>
</html>

