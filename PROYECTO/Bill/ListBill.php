<?php
include_once("Bill.php");
$Bills = Bill::getBills();

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

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Bill</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="../Tariffs/ListTariffs.php">Tariffs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../PhoneNumber/ListPhoneNumbers.php">Phone Numbers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ListBill.php">Bills</a>
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
                <h3>Listing Tariffs</h3>
            </div>
            <div >
                <table data-toggle="table" id="tableBills" class="table table-hover">
                    <thead>
                        <tr>
                            <th data-field="Id" data-sortable="true">Id</th>
                            <th data-field="PhoneNumber" data-sortable="true">Phone number</th>
                            <th data-field="BillIssuedDate" data-sortable="true">Bill issued date</th>
                            <th data-field="PaymentDueDate" data-sortable="true">Payment due date</th>
                            <th data-field="OriginalAmountDue" data-sortable="true">Original amount due</th>
                            <th data-field="AmountOutstanding" data-sortable="true">Amount outstanding</th>
                            <th>Actions</th>                       
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        if (count($Bills) > 0) {
                            //var_dump($clientes);
                            foreach ($Bills as $value) {
                                echo '<tr>';
                                echo '<td>' . $value['BILL_HEADER_ID'] . "</td>";
                                echo '<td>' . $value['CUSTOMER_PHONE_NUMBER'] . "</td>";
                                echo '<td>' . $value['BILL_ISSUE_DATE'] . "</td>";
                                echo '<td>' . $value['PAYMENT_DUE_DATE'] . "</td>";
                                echo '<td>' . $value['ORIGINAL_AMOUNT_DUE'] . "</td>";
                                echo '<td>' . $value['AMOUNT_OUTSTANDING'] . "</td>";
                                echo '<td>'
                                . '<a class="btn btn-primary btn-sm" href="BillForm.php?BILL_HEADER_ID=' . $value['BILL_HEADER_ID'] . '">Edit</a>'
                                . '<b> | </b><a class="btn btn-info btn-sm" href="../BillDetail/BillDetailForm.php?BILL_HEADER_ID='.$value['BILL_HEADER_ID'] . '">Add Detail</a>'
                                . '<b> | </b><a class="btn btn-danger btn-sm" href="Actions.php?BILL_HEADER_ID=' . $value['BILL_HEADER_ID'] . '&metodo=delete">Delete</a> </td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<p class="alert alert-warning"> There are no Bills! </p>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="row float-right mr-auto">                
                <a href="BillForm.php" class="btn btn-success btn-sm">Add New</a>
            </div>
        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted">Place sticky footer content here.</span>
            </div>
        </footer>  
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			    crossorigin="anonymous"></script>           
        <script src="../js/Bill/Bill.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.js"></script> 
    </body>
</html>

