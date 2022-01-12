<script src="bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
<?php
    require "DBStorage.php";
    require "Auth.php";

    $auth = new Auth();
    $storage = new DBStorage();
    if(isset($_POST['playerName'])) {
        $name = $_POST['playerName'];
    }
    if(!empty($name)) {
?>
    <table class="playerTable">
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
                    if(strpos($row["username"], $name) !== false) {
                ?>
                    <tr >
                        <td><?php echo $row["team"]?></td>
                        <td><?php echo $row["username"]?></td>
                        <td><?php echo $row["dpi"]?></td>
                        <td><?php echo $row["sensitivity"]?></td>
                        <td><?php echo $row["mouse"]?></td>
                        <td><button name="open" value="<?php echo $row["username"]?>" class="btn btn-primary tablebtn openPlayer">Open</button></td>
                    </tr>
               <?php
                    }
                }
                ?>

    </table>
    <?php
    }
    else {
    ?>
        <table class="playerTable">
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
                        <td><button name="open" value="<?php echo $row["username"]?>" class="btn btn-primary tablebtn openPlayer">Open</button></td>
                    </tr>
            <?php
            }
            ?>

        </table>
    <?php
    }
    ?>
