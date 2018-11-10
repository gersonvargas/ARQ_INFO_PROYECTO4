<?php
include_once './PhoneCall.php';
if (isset($_GET['PHONE_CALL_ID'])) {
    $CUST_ID = $_GET['PHONE_CALL_ID'];
    $cust = PhoneCall::getPhoneCallsID($CUST_ID);
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
        <title>Phone Calls</title>
    </head>
    <body>

     <header>
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
                            <li class="nav-item">
                                <a class="nav-link" href="../Tariffs/ListTariffs.php">Tariffs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../PhoneNumber/ListPhoneNumbers.php">Phone Numbers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../PhoneCalls/ListPhoneCalls.php">Phone Calls</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Bill/ListBill.php">Bills</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-md-0">
                            <input class="form-control" type="text" placeholder="Search">
                        </form>
                    </div>
                </nav>
            </div>
        </header>
        <main class="centrar_main">
            <div class='row justify-content-center'>
                <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>

                    <?php
                    if (isset($_GET['PHONE_CALL_ID'])) {
                        echo "<h3>Editing phone call: " . $cust[0]['PHONE_CALL_ID'] . "</h3>";
                    } else {
                        echo "<h3>Add New Phone Call</h3>";
                    }
                    ?>

                    <img class="img-fluid rounded" src='../Images/data.png' alt='Register' />

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
                                    if (isset($_GET['PHONE_CALL_ID'])) {
                                        echo'<input type="hidden" name="metodo" value="editar"/>';

                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>CALL ID</strong></label>";
                                        echo " <input class='form-control' type='text' name='PHONE_CALL_ID' id='phoneNumber'" .
                                        " placeholder='PHONE_CALL_ID' value='" . $cust[0]['PHONE_CALL_ID'] . "' readonly />";
                                        echo "</div>";
                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>PHONE NUMBER</strong></label>";
                                        echo " <input class='form-control' type='text' name='CUSTOMER_PHONE_NUMBER' id='inputUserName'" .
                                        " placeholder='CUSTOMER PHONE NUMBER' value='" . $cust[0]['CUSTOMER_PHONE_NUMBER'] . "' />";
                                        echo "</div>";
                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>NUMBER CALLED</strong></label>";
                                        echo " <input class='form-control' type='text' name='NUMBER_CALLED' id='inputUserName'" .
                                        " placeholder='NUMBER CALLED' value='" . $cust[0]['NUMBER_CALLED'] . "' />";
                                        echo "</div>";
                                    } else {
                                        echo'<input type="hidden" name="metodo" value="agregar"/>';

                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>CALL ID</strong></label>";
                                        echo " <input class='form-control' type='text' name='PHONE_CALL_ID' id='phoneNumber'" .
                                        " placeholder='PHONE_CALL_ID'/>";
                                        echo "</div>";
                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>PHONE NUMBER</strong></label>";
                                        echo " <input class='form-control' type='text' name='CUSTOMER_PHONE_NUMBER' id='inputUserName'" .
                                        " placeholder='CUSTOMER PHONE NUMBER' />";
                                        echo "</div>";
                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>NUMBER CALLED</strong></label>";
                                        echo " <input class='form-control' type='text' name='NUMBER_CALLED' id='inputUserName'" .
                                        " placeholder='NUMBER CALLED'/>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>                            
                                <div class='row'>

                                    <?php
                                    if (isset($_GET['PHONE_CALL_ID'])) {

                                        echo "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'>";
                                        echo "<label for='inputUserId'><strong>Customer Type</strong></label>";
                                        echo '<select class="custom-select my-1 mr-sm-2" id="NUMBER_CALLED_TYPE_CODE" name="NUMBER_CALLED_TYPE_CODE">';
                                        if ($cust[0]['NUMBER_CALLED_TYPE_CODE'] == 1) {
                                            echo '<option value="1" selected>Overseas</option>';
                                            echo '<option value="2">0800</option>';
                                            echo '<option value="3">0900</option>';
                                        } elseif ($cust[0]['NUMBER_CALLED_TYPE_CODE'] == 2) {
                                            echo '<option value="1">Overseas</option>';
                                            echo '<option value="2" selected>0800</option>';
                                            echo '<option value="3">0900</option>';
                                        } elseif ($cust[0]['NUMBER_CALLED_TYPE_CODE'] == 3) {
                                            echo '<option value="1">Overseas</option>';
                                            echo '<option value="2">0800</option>';
                                            echo '<option value="3" selected>0900</option>';
                                        }
                                        echo '</select>';
                                        echo "</div>";
                                        echo "<div class='col-xs-5 col-sm-5 col-md-5 col-lg-5'>";
                                        echo "<label for='CALL_START_DATETIME'><strong>CALL START DATETIME</strong></label>";
                                        echo " <input class='form-control' type='datetime-local' name='CALL_START_DATETIME' id='CALL_START_DATETIME'" .
                                        " placeholder='CALL START DATETIME' autocomplete value='" . $cust[0]['CALL_START_DATETIME'] . "' />";
                                        echo "</div>";
                                        echo "<div class='col-xs-5 col-sm-5 col-md-5 col-lg-5'>";
                                        echo "<label for='CALL_END_DATETIME'><strong>CALL END DATETIME</strong></label>";
                                        echo " <input class='form-control' type='datetime-local' name='CALL_END_DATETIME' id='CALL_END_DATETIME'" .
                                        " placeholder='CALL END DATETIME' autocomplete value='" .  $cust[0]['CALL_END_DATETIME'] . "' />";
                                        echo "</div>";
                                    } else {
                                       echo "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'>";
                                        echo "<label for='inputUserId'><strong>Customer Type</strong></label>";
                                        echo '<select class="custom-select my-1 mr-sm-2" id="NUMBER_CALLED_TYPE_CODE" name="NUMBER_CALLED_TYPE_CODE">';
                                        echo '<option value="-1">Select</option>';
                                        echo '<option value="1">Overseas</option>';
                                        echo '<option value="2">0800</option>';
                                        echo '<option value="3">0900</option>';

                                        echo '</select>';
                                        echo "</div>";
                                       echo "<div class='col-xs-5 col-sm-5 col-md-5 col-lg-5'>";
                                        echo "<label for='CALL_START_DATETIME'><strong>CALL START DATETIME</strong></label>";
                                        echo " <input class='form-control' type='datetime-local' name='CALL_START_DATETIME' id='CALL_START_DATETIME'" .
                                        "'autocomplete placeholder='CALL START DATETIME' value='2018-06-12T19:30'" .
                                        "min='2000-06-07T00:00' max='2050-06-14T00:00'/>";
                                        echo "</div>";
                                       echo "<div class='col-xs-5 col-sm-5 col-md-5 col-lg-5'>";
                                        echo "<label for='CALL_END_DATETIME'><strong>CALL END DATETIME</strong></label>";
                                        echo " <input class='form-control' type='datetime-local' name='CALL_END_DATETIME' id='CALL_END_DATETIME'" .
                                        "autocomplete placeholder='CALL END DATETIME' value='2018-07-12T19:30'" .
                                        "min='2000-07-07T00:00' max='2050-07-14T00:00'/>";
                                        echo "</div>";
                                    }
                                    ?>

                                </div>     
                                <div class='row'>

                                    <?php
                                    if (isset($_GET['PHONE_CALL_ID'])) {
                                        echo "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>";
                                        echo "<label for='OTHER_DETAILS'><strong>Phone Number Details</strong></label>";
                                        echo " <textarea name='OTHER_DETAILS' class='form-control'" .
                                        " rows='2' id='comment'>" . $cust[0]['OTHER_DETAILS'] . "</textarea>";
                                        echo "</div>";
                                    } else {

                                        echo "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>";
                                        echo "<label for='OTHER_DETAILS'><strong>Call Details</strong></label>";
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
                                        <a href="ListPhoneCalls.php" class="btn btn-danger btn-lg mr-3">Cancel</a>
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




