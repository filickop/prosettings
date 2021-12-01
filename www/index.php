<?php
require "DBStorage.php";
require "Auth.php";
session_start();

$auth = new Auth();
$storage = new DBStorage();

if(isset($_GET['logout']) && $_GET['logout'] == '1') {
    Auth::logout();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PROsettings</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">

    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="images/csgologo.png" alt="" class="logomenu"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="players.php">Players</a>
                        <?php  if(Auth::isLogged()) { ?>
                            <a class="nav-link" href="account.php">Account</a>
                            <a class="nav-link" href="index.php?logout=1" >Log out</a>
                        <?php }
                        else { ?>
                            <a class="nav-link" href="account.php">Log in</a>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </nav>

    <div class="content">
        <h1 class="frontHeader">Welcome to PROsettings website</h1>
        <div class="imgContainer">
            <img src="images/navi.jpg" alt="" class="frontImage">
        </div>


    </div>
</body>

</html>