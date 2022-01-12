<!DOCTYPE html>
<html lang="en">
<head>
    <title>PROsettings</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">

    <script src="bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>


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



<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="images/csgologo.png" alt="" class="logomenu"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                <a class="nav-link active" href="#">Players</a>
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

<div id="playerInfo"></div>
    <div class="content">
        <div class="form-floating">
            <input type="text" name="search" class="form-control" id="floatingInput" placeholder="ram" value="">
            <label for="floatingInput">Search by Name</label>
        </div>
        <!--<table class="playerTable" id="tablePlayers">

        </table>-->
        <table class="playerTable" id="tablePlayers">
            <tr>
                <th>Team</th>
                <th>Player</th>
                <th>DPI</th>
                <th>Sensivity</th>
                <th>Mouse</th>
                <th></th>
            </tr>
            <?php
            foreach($storage->getTable() as $row) {
                    ?>
                    <tr >
                        <td><?php echo $row["team"]?></td>
                        <td><?php echo $row["username"]?></td>
                        <td><?php echo $row["dpi"]?></td>
                        <td><?php echo $row["sensitivity"]?></td>
                        <td><?php echo $row["mouse"]?></td>
                        <td><button name="open" value="<?php echo $row["username"]?>" class="btn btn-primary tablebtn">Open</button></td>
                    </tr>
                    <?php
            }
            ?>

        </table>
    </div>
</div>

</body>

</html>