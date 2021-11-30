<?php

require "DBStorage.php";
require "Auth.php";
session_start();

$auth = new Auth();
$storage = new DBStorage();

if(isset($_POST["username"])) {
    if($storage->login($_POST["username"], $_POST["password"])) {
        Auth::login($_POST["username"]);
    } else {
        echo "nemame";
    }
}
if(isset($_POST["update"])) {
    $storage->updateUser(Auth::getUser(), $_POST["firstName"], $_POST["lastName"], $_POST["team"], $_POST["cpu"], $_POST["gpu"], $_POST["ram"], $_POST["monitor"], $_POST["mouse"], $_POST["keyboard"], $_POST["headset"], $_POST["mousepad"], $_POST["dpi"], $_POST["sensitivity"], $_POST["crosshair"], $_POST["viewmodel"]);
}
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
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="images/csgologo.png" alt="" class="logomenu"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link " aria-current="page" href="index.php">Home</a>
                <a class="nav-link" href="players.php">Players</a>
                <?php  if(Auth::isLogged()) { ?>
                    <a class="nav-link active" href="">Account</a>
                    <a class="nav-link" href="?logout=1" >Log out</a>
                <?php }
                    else { ?>
                        <a class="nav-link active" href="">Log in</a>
                   <?php }
                ?>


            </div>
        </div>
    </div>
</nav>

<?php
    if(!Auth::isLogged()) { ?>
        <main class="form-signin">
            <form method="post" action="#">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input type="username" name="username" class="form-control" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingInput">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
        </main>
<?php
    }
    else if (Auth::isLogged()){ ?>

            <form class="form-edit-profile" method="post" action="#">
                <h1 class="h3 mb-3 fw-normal ">Edit profile</h1>
                <div class="row row-cols-2 row-cols-sm-1">
                    <!--PLAYER-->
                    <div class="form-editdata col">
                        <h3 class="h4 mb-3 fw-normal">Player</h3>
                        <div class="form-floating">
                            <input type="text" name="firstName" class="form-control" id="floatingInput" placeholder="firstName" value="<?php echo $storage->readTable(Auth::getUser())["firstName"]?>">
                            <label for="floatingInput">First name</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="lastName" class="form-control" id="floatingInput" placeholder="lastName" value="<?php echo $storage->readTable(Auth::getUser())["lastName"]?>">
                            <label for="floatingInput">Last name</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="team" class="form-control" id="floatingInput" placeholder="team" value="<?php echo $storage->readTable(Auth::getUser())["team"]?>">
                            <label for="floatingInput">Team</label>
                        </div>
                    </div>
                    <!--PLAYER END-->


                    <!--COMPUTER-->
                    <div class="form-editdata col">
                        <h3 class="h4 mb-3 fw-normal">Computer</h3>
                        <div class="form-floating">
                            <input type="text" name="cpu" class="form-control" id="floatingInput" placeholder="cpu" value="<?php echo $storage->readTable(Auth::getUser())["cpu"]?>">
                            <label for="floatingInput">CPU</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="gpu" class="form-control" id="floatingInput" placeholder="gpu" value="<?php echo $storage->readTable(Auth::getUser())["gpu"]?>">
                            <label for="floatingInput">GPU</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="ram" class="form-control" id="floatingInput" placeholder="ram" value="<?php echo $storage->readTable(Auth::getUser())["ram"]?>">
                            <label for="floatingInput">RAM</label>
                        </div>
                    </div>

                    <!--COMPUTER END-->
                </div>


                <div class="row row-cols-2 row-cols-sm-1">
                    <!--PERIPHERALS-->
                    <div class="form-editdata col">
                        <h3 class="h4 mb-3 fw-normal">Peripherals</h3>
                        <div class="form-floating">
                            <input type="text" name="monitor" class="form-control" id="floatingInput" placeholder="monitor" value="<?php echo $storage->readTable(Auth::getUser())["monitor"]?>">
                            <label for="floatingInput">Monitor</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="mouse" class="form-control" id="floatingInput" placeholder="mouse" value="<?php echo $storage->readTable(Auth::getUser())["mouse"]?>">
                            <label for="floatingInput">Mouse</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="keyboard" class="form-control" id="floatingInput" placeholder="keyboard" value="<?php echo $storage->readTable(Auth::getUser())["keyboard"]?>">
                            <label for="floatingInput">Keyboard</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="headset" class="form-control" id="floatingInput" placeholder="headset" value="<?php echo $storage->readTable(Auth::getUser())["headset"]?>">
                            <label for="floatingInput">Headset</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="mousepad" class="form-control" id="floatingInput" placeholder="mousepad" value="<?php echo $storage->readTable(Auth::getUser())["mousepad"]?>">
                            <label for="floatingInput">Mouse pad</label>
                        </div>
                    </div>

                    <!--PERIPHERALS END-->

                    <!--CONFIG-->
                    <div class="form-editdata col">
                        <h3 class="h4 mb-3 fw-normal">Config</h3>
                        <div class="form-floating">
                            <input type="number" min="0" name="dpi" class="form-control" id="floatingInput" placeholder="mouseDPI" value="<?php echo $storage->readTable(Auth::getUser())["dpi"]?>">
                            <label for="floatingInput">DPI</label>
                        </div>
                        <div class="form-floating">
                            <input type="number" step="0.01" min="0" name="sensitivity" class="form-control" id="floatingInput" placeholder="sensitivity" value="<?php echo $storage->readTable(Auth::getUser())["sensitivity"]?>">
                            <label for="floatingInput">Sensitivity</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="crosshair" class="form-control" id="floatingInput" placeholder="crosshair" value="<?php echo $storage->readTable(Auth::getUser())["crosshair"]?>">
                            <label for="floatingInput">Crosshair</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="viewmodel" class="form-control" id="floatingInput" placeholder="viewmodel" value="<?php echo $storage->readTable(Auth::getUser())["viewmodel"]?>">
                            <label for="floatingInput">Viewmodel</label>
                        </div>
                    </div>

                <!--CONFIG END-->
                </div>
                <button class="w-100 btn btn-lg btn-primary" name="update" type="submit">Save settings</button>
            </form>



<?php } ?>


<script src="bootstrap.js"></script>
</body>

</html>