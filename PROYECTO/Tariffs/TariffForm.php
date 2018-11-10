<?php
include_once './Tariff.php';
if (isset($_GET['TARIFF_ID'])) {
    $CUST_ID = $_GET['TARIFF_ID'];
    $cust = Tariff::getTariffID($CUST_ID);
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
        <title>Tariff</title>
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
                    if (isset($_GET['TARIFF_ID'])) {
                        echo "<h3>Editing Tariff: " . $cust[0]['TARIFF_NAME'] . "</h3>";
                    } else {
                        echo "<h1>Add new Tariff</h1>";
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
                                    if (isset($_GET['TARIFF_ID'])) {
                                        echo'<input type="hidden" name="metodo" value="editar"/>';

                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputTariffId'><strong>Tariff ID</strong></label>";
                                        echo " <input class='form-control' type='text' name='tariffId' id='inputTariffId'" .
                                        " placeholder='Id' value='" . $cust[0]['TARIFF_ID'] . "' readonly />";
                                        echo "</div>";
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='tariffName'><strong>Tariff Name</strong></label>";
                                        echo " <input class='form-control' type='text' name='tariffName' id='inputTariffName'" .
                                        " placeholder='Tariff Name' value='" . $cust[0]['TARIFF_NAME'] . "' />";
                                        echo "</div>";
                                    } else {
                                        echo'<input type="hidden" name="metodo" value="agregar"/>';

                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='tariffId'><strong>Tariff Id</strong></label>";
                                        echo " <input class='form-control' type='text' name='tariffId' id='inputTariffId'" .
                                        " placeholder='Tariff Id'/>";
                                        echo "</div>";
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='tariffName'><strong>Tariff Name</strong></label>";
                                        echo " <input class='form-control' type='text' name='tariffName' id='inputTariffName'" .
                                        " placeholder='Tariff Name' />";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>                            
                                <div class='row'>

                                    <?php
                                    if (isset($_GET['TARIFF_ID'])) {
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='tariffRate'><strong>Tariff Rate</strong></label>";
                                        echo " <input class='form-control' type='text' name='tariffRate' id='inputTariffRate'" .
                                        " placeholder='Tariff Rate' value='" . $cust[0]['TARIFF_RATE'] . "'  />";
                                        echo "</div>";
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputTariffId'><strong>Tariff Type</strong></label>";

                                        echo '<select class="custom-select my-1 mr-sm-2" id="selectTariffType" name="tariffType">';
                                        if ($cust[0]['TARIFF_TYPE_CODE'] == 1) {
                                            echo '<option value="1" selected>TariffType_01</option>';
                                            echo '<option value="2">TariffType_02</option>';
                                        } else {
                                            echo '<option value="1">TariffType_01</option>';
                                            echo '<option value="2" selected>TariffType_02</option>';
                                        }


                                        echo '</select>';

                                        echo "</div>";
                                    } else {        
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";  
                                        echo "<label for='tariffRate'><strong>Tariff Rate</strong></label>";
                                        echo " <input class='form-control' type='text' name='tariffRate' id='inputTariffRate'" .
                                        " placeholder='Tariff Rate'/>";
                                        echo "</div>";
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='inputTariffId'><strong>Tariff Type</strong></label>";
                                                                                                       
                                        echo '<select name="tariffType" class="custom-select my-1 mr-sm-2" id="tariffType">';
                                        echo '<option selected>Choose...</option>';
                                        echo '<option value="1">TariffType_01</option>';
                                        echo '<option value="2">TariffType_02</option>';
                                        echo '</select>';
                                        echo "</div>";
                                    }
                                    ?>

                                </div>     


                                <div class='row'>

                                    <?php
                                    if (isset($_GET['TARIFF_ID'])) {
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='tariffDetails'><strong>Tariff Details</strong></label>";
                                        echo " <textarea name='tariffDetails' class='form-control'" .
                                        " rows='2' id='comment' placeholder='Tariff Details'>" . $cust[0]['TARIFF_DATAILS'] .
                                        "</textarea>";
                                        echo "</div>";

                                    } else {
                                        echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                        echo "<label for='tariffDetails'><strong>Tariff Details</strong></label>";
                                        echo " <textarea   name='tariffDetails' class='form-control'" .
                                        " rows='2' id='comment'></textarea>";
                                        echo "</div>";
                                    }
                                    ?>

                                </div>  

                                <div class='row float-right'>
                                    <div class="row float-right mr-auto">
                                        <a href="ListTariffs.php" class="btn btn-danger btn-lg mr-3">Cancel</a>
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




