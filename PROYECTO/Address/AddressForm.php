<?php
include_once './Address.php';

if (isset($_GET['ADDRESS_ID'])) {
    $ADDRESS_ID = $_GET['ADDRESS_ID'];
    $ADDRESSES = Addreess::getAddressID($ADDRESS_ID);
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
        <title>Address Form</title>
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
                            <a class="nav-link" href="Index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Customer/ListCustomer.php">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Address/ListAddress.php">Addresses</a>
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
                    if (isset($_GET['ADDRESS_ID'])) {
                        echo "<h3>Editing Address: " . $ADDRESS_ID . "</h3>";
                    } else {
                        echo "<h1>Add new Address</h1>";
                    }
                    ?>

                    <img class="img-fluid rounded" src='../Images/address.png' alt='Register' />

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
                                    if (isset($_GET['ADDRESS_ID'])) {
                                        echo'<input type="hidden" name="metodo" value="editar"/>';
                                        echo'<input type="hidden" name="ADDRESS_ID" value="'.$_GET['ADDRESS_ID'].'"/>';
                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>Line 1</strong></label>";
                                        echo " <input class='form-control' type='text' name='line1' id='inputUserId'" .
                                        " placeholder='Line 1' value='" . $ADDRESSES[0]['LINE1'] . "' />";
                                        echo "</div>";

                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>Line 2</strong></label>";
                                        echo " <input class='form-control' type='text' name='line2' id='inputUserId'" .
                                        " placeholder='Line 2' value='" . $ADDRESSES[0]['LINE2'] . "' />";
                                        echo "</div>";

                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>Line 3</strong></label>";
                                        echo " <input class='form-control' type='text' name='line3' id='inputUserId'" .
                                        " placeholder='Line 3' value='" . $ADDRESSES[0]['LINE3'] . "' />";
                                        echo "</div>";
                                    } else {
                                        echo'<input type="hidden" name="metodo" value="agregar"/>';

                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>Line 1</strong></label>";
                                        echo " <input class='form-control' type='text' name='line1' id='inputUserId'" .
                                        " placeholder='Line 1' />";
                                        echo "</div>";

                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>Line 2</strong></label>";
                                        echo " <input class='form-control' type='text' name='line2' id='inputUserId'" .
                                        " placeholder='Line 2' />";
                                        echo "</div>";

                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>Line 3</strong></label>";
                                        echo " <input class='form-control' type='text' name='line3' id='inputUserId'" .
                                        " placeholder='Line 3' />";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>                            
                                <div class='row'>
                                    <?php
                                    if (isset($_GET['ADDRESS_ID'])) {
                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>City</strong></label>";
                                        echo " <input class='form-control' type='text' name='city' id='inputCity'" .
                                        " placeholder='City' value='" . $ADDRESSES[0]['CITY'] . "' />";
                                        echo "</div>";

                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>Country</strong></label>";
                                        echo " <input class='form-control' type='text' name='country' id='inputCountry'" .
                                        " placeholder='Country' value='" . $ADDRESSES[0]['COUNTRY'] . "' />";
                                        echo "</div>";

                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>ZIP Code</strong></label>";
                                        echo " <input class='form-control' type='text' name='zip_postcode' id='inputZipCode'" .
                                        " placeholder='ZIP Post Code' />";
                                        echo "</div>";
                                    } else {

                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>City</strong></label>";
                                        echo " <input class='form-control' type='text' name='city' id='inputCity'" .
                                        " placeholder='City'/>";
                                        echo "</div>";

                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>Country</strong></label>";
                                        echo " <input class='form-control' type='text' name='country' id='inputCountry'" .
                                        " placeholder='Country'/>";
                                        echo "</div>";

                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputUserId'><strong>ZIP Code</strong></label>";
                                        echo " <input class='form-control' type='text' name='zip_postcode' id='inputZipCode'" .
                                        " placeholder='ZIP Post Code' />";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>                                     

                                <div class='row'>
                                    <?php
                                    if (isset($_GET['ADDRESS_ID'])) {
                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputProvince'><strong>Province</strong></label>";
                                        echo " <input class='form-control' type='text' name='province' id='inputProvince'" .
                                        " placeholder='Province' value='" . $ADDRESSES[0]['STATE_PROVINCE_COUNTRY'] . "' />";
                                        echo "</div>";



                                        echo "<div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>";
                                        echo "<label for='addressDetails'><strong>Other Details</strong></label>";
                                        echo " <textarea name='otherDetails' class='form-control'" .
                                        " rows='2' id='comment' placeholder='Other details'>" . $ADDRESSES[0]['OTHER_DETAILS'] .
                                        "</textarea>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                                        echo "<label for='inputProvince'><strong>Province</strong></label>";
                                        echo " <input class='form-control' type='text' name='province' id='inputProvince'" .
                                        " placeholder='Province'/>";
                                        echo "</div>";


                                        echo "<div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>";
                                        echo "<label for='addressDetails'><strong>Other Details</strong></label>";
                                        echo " <textarea name='otherDetails' class='form-control'" .
                                        " rows='2' id='comment' placeholder='Other details'>" .
                                        "</textarea>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div> 

                                <div class='row float-right mt-3 mr-3'>
                                    <div class="row float-right mr-auto">
                                        <a href="ListAddress.php" class="btn btn-danger btn-lg mr-3">Cancel</a>
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




