<script src="bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
<?php
    require "DBStorage.php";
    require "Auth.php";

    $auth = new Auth();
    $storage = new DBStorage();
?>
<div id="bg-popup">
    <div class="content-popup">
        <div id="close-popup">+</div>
        <div class="form-profile">
            <div class="row row-cols-2 row-cols-sm-1">
                <!--PLAYER-->
                <div class="form-editdata col">
                    <h3 class="h4 mb-3 fw-normal">Player</h3>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["username"]?></p>
                        <label for="floatingInput">Username:</label>
                    </div>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["team"]?></p>
                        <label for="floatingInput">Team:</label>
                    </div>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["firstName"]?></p>
                        <label for="floatingInput">First name:</label>
                    </div>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["lastName"]?></p>
                        <label for="floatingInput">Last name:</label>
                    </div>
                </div>

                <!--PLAYER END-->


                <!--COMPUTER-->


                <div class="form-editdata col">
                    <h3 class="h4 mb-3 fw-normal">Computer</h3>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["cpu"]?></p>
                        <label for="floatingInput">CPU:</label>
                    </div>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["gpu"]?></p>
                        <label for="floatingInput">GPU:</label>
                    </div>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["ram"]?></p>
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
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["monitor"]?></p>
                        <label for="floatingInput">Monitor:</label>
                    </div>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["mouse"]?></p>
                        <label for="floatingInput">Mouse:</label>
                    </div>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["keyboard"]?></p>
                        <label for="floatingInput">Keyboard:</label>
                    </div>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["headset"]?></p>
                        <label for="floatingInput">Headset:</label>
                    </div>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["mousepad"]?></p>
                        <label for="floatingInput">Mouse pad:</label>
                    </div>
                </div>

                <!--PERIPHERALS END-->

                <!--CONFIG-->
                <div class="form-editdata col">
                    <h3 class="h4 mb-3 fw-normal">Peripherals</h3>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["dpi"]?></p>
                        <label for="floatingInput">DPI:</label>
                    </div>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["sensitivity"]?></p>
                        <label for="floatingInput">Sensitivity:</label>
                    </div>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["crosshair"]?></p>
                        <label for="floatingInput">Crosshair:</label>
                    </div>
                    <div class="form-floating">
                        <p class="form-control" ><?php echo $storage->readTable($_POST['playerName'])["viewmodel"]?></p>
                        <label for="floatingInput">Viewmodel:</label>
                    </div>
                </div>
            </div>
            <!--CONFIG END-->
        </div>
    </div>
</div>

