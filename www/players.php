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

<?php
    if (isset($_POST["open"])) { ?>

    <div class="form-profile">
        <div class="row row-cols-2 row-cols-sm-1">
            <!--PLAYER-->
            <div class="form-editdata col">
                <h3 class="h4 mb-3 fw-normal">Player</h3>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["username"]?></p>
                    <label for="floatingInput">Username:</label>
                </div>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["team"]?></p>
                    <label for="floatingInput">Team:</label>
                </div>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["firstName"]?></p>
                    <label for="floatingInput">First name:</label>
                </div>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["lastName"]?></p>
                    <label for="floatingInput">Last name:</label>
                </div>
            </div>

        <!--PLAYER END-->


        <!--COMPUTER-->


            <div class="form-editdata col">
                <h3 class="h4 mb-3 fw-normal">Computer</h3>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["cpu"]?></p>
                    <label for="floatingInput">CPU:</label>
                </div>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["gpu"]?></p>
                    <label for="floatingInput">GPU:</label>
                </div>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["ram"]?></p>
                    <label for="floatingInput">ram:</label>
                </div>
            </div>
        </div>
        <!--COMPUTER END-->

        <!--PERIPHERALS-->
        <div class="row row-cols-2 row-cols-sm-1">

            <div class="form-editdata col">
                <h3 class="h4 mb-3 fw-normal">Peripherals</h3>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["monitor"]?></p>
                    <label for="floatingInput">Monitor:</label>
                </div>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["mouse"]?></p>
                    <label for="floatingInput">Mouse:</label>
                </div>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["keyboard"]?></p>
                    <label for="floatingInput">Keyboard:</label>
                </div>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["headset"]?></p>
                    <label for="floatingInput">Headset:</label>
                </div>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["mousepad"]?></p>
                    <label for="floatingInput">Mouse pad:</label>
                </div>
            </div>

        <!--PERIPHERALS END-->

            <!--CONFIG-->
            <div class="form-editdata col">
                <h3 class="h4 mb-3 fw-normal">Peripherals</h3>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["dpi"]?></p>
                    <label for="floatingInput">DPI:</label>
                </div>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["sensitivity"]?></p>
                    <label for="floatingInput">Sensitivity:</label>
                </div>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["crosshair"]?></p>
                    <label for="floatingInput">Crosshair:</label>
                </div>
                <div class="form-floating">
                    <p class="form-control" ><?php echo $storage->readTable($_POST["open"])["viewmodel"]?></p>
                    <label for="floatingInput">Viewmodel:</label>
                </div>
            </div>
        </div>
        <!--CONFIG END-->
    </div>

    <?php
    }
    ?>
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
                        <td><form method="post"><button type="submit" name="open" value="<?php echo $row["username"]?>" onclick="loadPlayer()" class="btn btn-primary tablebtn">Open</button></form></td>
                    </tr>
                    <?php
            }
            ?>

        </table>
    </div>
</div>

</body>

</html>