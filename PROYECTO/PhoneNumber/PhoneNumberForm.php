<?php
include_once './PhoneNumber.php';
if (isset($_GET['CUSTOMER_PHONE_NUMBER'])) {
    $CUST_ID = $_GET['CUSTOMER_PHONE_NUMBER'];
    $cust = PhoneNumber::getPhoneNumberID($CUST_ID);
    // var_dump($cust);
}
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
                            <a class="nav-link" href="../Customer/ListCustomer.php">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Address/ListAddress.php">Addresses</a>
                        </li>

                    </ul>
                    <form class="form-inline my-2 my-md-0">
                        <input class="form-control" type="text" placeholder="Search">
                    </form>
                </div>
            </nav>
        </div>
        <main class="centrar_main">
            <div class='row justify-content-center'>
                <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>

                    <?php
                    if (isset($_GET['CUSTOMER_PHONE_NUMBER'])) {
                        echo "<h3>Editing phone number: " . $cust[0]['CUSTOMER_PHONE_NUMBER'] . "</h3>";
                    } else {
                        echo "<h1>Add New Phone Number</h1>";
                    }
                    ?>

                    <img class="img-fluid rounded" src='../Images/customer.png' alt='Register' />

                </div>
            </div>
            <div class='row justify-content-center'>
                <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
                    <div class='register text-center'>
                        <form action='Actions.php' method='POST' class="register-form my-2 my-md-0">
                            <fieldset class='scheduler-border'>
                                <legend class='scheduler-border'>
                                    Form
                                </legend>
                                <div class='row'>
                                    <?php
                                    if (isset($_GET['CUSTOMER_PHONE_NUMBER'])) {
                                        echo'<input type="hidden" name="metodo" value="editar"/>';

                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputUserId'><strong>Phone Number</strong></label>";
                                        echo " <input class='form-control' type='text' name='CUSTOMER_PHONE_NUMBER' id='phoneNumber'" .
                                        " placeholder='Phone Number' value='" . $cust[0]['CUSTOMER_PHONE_NUMBER'] . "' readonly />";
                                        echo "</div>";
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputUserId'><strong>CUSTOMER ID</strong></label>";
                                        echo " <input class='form-control' type='text' name='CUSTOMER_ID' id='inputUserName'" .
                                        " placeholder='CUSTOMER ID' value='" . $cust[0]['CUSTOMER_ID'] . "' />";
                                        echo "</div>";
                                    } else {
                                        echo'<input type="hidden" name="metodo" value="agregar"/>';

                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputUserId'><strong>Phone Number</strong></label>";
                                        echo " <input class='form-control' type='text' name='CUSTOMER_PHONE_NUMBER' id='phoneNumber'" .
                                        " placeholder='Phone Number'/>";
                                        echo "</div>";
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputUserId'><strong>CUSTOMER ID</strong></label>";
                                        echo " <input class='form-control' type='text' name='CUSTOMER_ID' id='inputUserName'" .
                                        " placeholder='Customer ID' />";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>                            
                                <div class='row'>

                                    <?php
                                    if (isset($_GET['CUSTOMER_PHONE_NUMBER'])) {
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputUserId'><strong>HELD FROM DATE</strong></label>";
                                        echo " <input class='form-control' type='date' name='HELD_FROM_DATE' id='inputUserId'" .
                                        " placeholder='HELD FROM DATE' value='" . $cust[0]['HELD_FROM_DATE'] . "'/>";
                                        echo "</div>";

                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputUserId'><strong>Customer Type</strong></label>";
                                        echo '<select class="custom-select my-1 mr-sm-2" id="NUMBER_TYPE_CODE" name="NUMBER_TYPE_CODE">';
                                        if ($cust[0]['NUMBER_TYPE_CODE'] == 1) {
                                            echo '<option value="1" selected>Home</option>';
                                            echo '<option value="2">Work</option>';
                                            echo '<option value="3">Mobile</option>';
                                        } elseif ($cust[0]['NUMBER_TYPE_CODE'] == 2) {
                                            echo '<option value="1">Home</option>';
                                            echo '<option value="2" selected>Work</option>';
                                            echo '<option value="3">Mobile</option>';
                                        } elseif ($cust[0]['NUMBER_TYPE_CODE'] == 3) {
                                            echo '<option value="1">Home</option>';
                                            echo '<option value="2">Work</option>';
                                            echo '<option value="3" selected>Mobile</option>';
                                        }
                                        echo '</select>';
                                        echo "</div>";
                                    } else {
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputUserId'><strong>HELD FROM DATE</strong></label>";
                                        echo " <input class='form-control' type='date' name='HELD_FROM_DATE' id='inputUserId'" .
                                        " placeholder='HELD FROM DATE' />";
                                        echo "</div>";
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputUserId'><strong>Customer Type</strong></label>";
                                        echo '<select class="custom-select my-1 mr-sm-2" id="NUMBER_TYPE_CODE" name="NUMBER_TYPE_CODE">';
                                        echo '<option>Select</option>';
                                        echo '<option value="1">Home</option>';
                                        echo '<option value="2">Work</option>';
                                        echo '<option value="3">Mobile</option>';
                                        echo '</select>';
                                        echo "</div>";
                                    }
                                    ?>

                                </div>     
                                <div class='row'>

                                    <?php
                                    if (isset($_GET['CUSTOMER_PHONE_NUMBER'])) {
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='OTHER_DETAILS'><strong>Phone Number Details</strong></label>";
                                        echo " <textarea name='OTHER_DETAILS' class='form-control'" .
                                        " rows='2' id='comment'>" . $cust[0]['OTHER_DETAILS'] . "</textarea>";
                                        echo "</div>";
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputUserId'><strong>HELD TO DATE</strong></label>";
                                        echo " <input class='form-control' type='date' name='HELD_TO_DATE' id='inputUserId'" .
                                        " placeholder='HELD TO DATE' value='" . $cust[0]['HELD_TO_DATE'] . "'/>";
                                        echo "</div>";
                                    } else {

                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputUserId'><strong>HELD TO DATE</strong></label>";
                                        echo " <input class='form-control' type='date' name='HELD_TO_DATE' id='inputUserId'" .
                                        " placeholder='HELD TO DATE' />";
                                        echo "</div>";
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='OTHER_DETAILS'><strong>Phone Number Details</strong></label>";
                                        echo " <textarea name='OTHER_DETAILS' class='form-control'" .
                                        " rows='2' id='comment'></textarea>";
                                        echo "</div>";
                                    }
                                    ?>

                                </div>  
                                <div class='row'>
                                    <?php
                                    ?>
                                </div>  

                                <div class='row float-right mt-3'>
                                    <div class="row float-right mr-auto">
                                        <a href="ListCustomer.php" class="btn btn-danger btn-lg mr-3">Cancel</a>
                                        <button type="submit" name="submit" class="btn btn-success btn-lg">Save</button>
                                    </div>

                                </div> 
                            </fieldset>
                        </form>
                    </div>
                </div>
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




