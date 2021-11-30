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
        <a class="navbar-brand" href="index.html"><img src="images/csgologo.png" alt="" class="logomenu"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link " aria-current="page" href="index.html">Home</a>
                <a class="nav-link" href="players.html">Players</a>
                <a class="nav-link active" href="">Account</a>
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
        <main class="form-editdata">
            <form method="post" action="#">
                <h1 class="h3 mb-3 fw-normal ">Edit profile</h1>

                <div class="form-floating">
                    <input type="text" name="firstName" class="form-control" id="floatingInput" placeholder="firstName">
                    <label for="floatingInput">First name</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="lastName" class="form-control" id="floatingInput" placeholder="lastName">
                    <label for="floatingInput">Last name</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="team" class="form-control" id="floatingInput" placeholder="team">
                    <label for="floatingInput">Team</label>
                </div>
                <!--COMPUTER-->
                <h3 class="h4 mb-3 fw-normal">Computer</h3>
                <div class="form-floating">
                    <input type="text" name="cpu" class="form-control" id="floatingInput" placeholder="cpu">
                    <label for="floatingInput">CPU</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="gpu" class="form-control" id="floatingInput" placeholder="gpu">
                    <label for="floatingInput">GPU</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="ram" class="form-control" id="floatingInput" placeholder="ram">
                    <label for="floatingInput">RAM</label>
                </div>
                <!--COMPUTER END-->


                <!--PERIPHERALS-->
                <h3 class="h4 mb-3 fw-normal">Peripherals</h3>
                <div class="form-floating">
                    <input type="text" name="monitor" class="form-control" id="floatingInput" placeholder="monitor">
                    <label for="floatingInput">Monitor</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="mouse" class="form-control" id="floatingInput" placeholder="mouse">
                    <label for="floatingInput">Mouse</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="keyboard" class="form-control" id="floatingInput" placeholder="keyboard">
                    <label for="floatingInput">Keyboard</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="headset" class="form-control" id="floatingInput" placeholder="headset">
                    <label for="floatingInput">Headset</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="mousepad" class="form-control" id="floatingInput" placeholder="mousepad">
                    <label for="floatingInput">Mouse pad</label>
                </div>
                <!--PERIPHERALS END-->

                <button class="w-100 btn btn-lg btn-primary" type="submit">Save settings</button>
            </form>
        </main>


<?php } ?>


<script src="bootstrap.js"></script>
</body>

</html>