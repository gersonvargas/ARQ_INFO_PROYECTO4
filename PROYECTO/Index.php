<?php
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
        <title>Home</title>
        <link href="Bootstrap4/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="Bootstrap4/js/bootstrap.min.js" type="text/javascript"></script>

        <link rel="shortcut icon" type="image/png" href="../images/mp4.png"/>
        <link href="../styles.css" rel="stylesheet" type="text/css"/>
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
                                <a class="nav-link" href="Index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Customer/ListCustomer.php">Customers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Address/ListAddress.php">Addresses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Tariffs/ListTariffs.php">Tariffs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="PhoneNumber/ListPhoneNumbers.php">Phone Numbers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="PhoneCalls/ListPhoneCalls.php">Phone Calls</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Bill/ListBill.php">Bills</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-md-0">
                            <input class="form-control" type="text" placeholder="Search">
                        </form>
                    </div>
                </nav>
            </div>
        </header>
        <main class="centrar_main centrar_main_home">
            <div class="card-group p-3">
                <div class="card m-3">
                    <div class="card-body">
                        <h5 class="card-title">We are making it!</h5>
                        <p class="card-text">
                            <img class="card-img-top img-fluid rounded" src='Images/home1.png' alt="Card image cap" />

                        </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">

                            Thanks for prefer us!
                        </small>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="container">
                <div class="">
                    <nav class="navbar navbar-expand-md navbar-dark bg-light">
                        <div class="collapse navbar-collapse text-center" id="">

                            <p class="text-center"><b> Gerson Vargas G & Osvaldo Aguero &nbsp;|&nbsp;</b></p></br>
                            <p class="text-center"><b> Arquitectura de Información, Proyecto  4&nbsp;</b></p>
                            <p class="text-center"><b>|&nbsp;UNA 2018.</b></p></br>
                        </div>
                    </nav>
                </div>

            </div>
        </footer>  
    </body>
</html>
