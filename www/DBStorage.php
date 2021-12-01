<?php

class DBStorage
{

    /**
     * @var PDO
     */
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=db_prosettings", "root", "dtb456");
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function login( $username, $password) {
        $sql = "SELECT * FROM users where username = '".$username."'";

        $res = $this->conn->query($sql);
        $res->fetchAll();
        $res->execute();
        foreach($res as $row) {
            if(isset($row) && $row["password"] == $password) {
                return true;
            }

        }
        return false;
    }
    public function updateUser($username, $firstName,  $lastName, $team, $cpu, $gpu, $ram, $monitor, $mouse, $keyboard, $headset, $mousepad, $dpi, $sensitivity, $crosshair, $viewmodel) {

        if(empty($dpi)) {
            $dpi = 0;
        }
        if(empty($sensitivity)) {
            $sensitivity = 0;
        }
        $sql = "UPDATE users SET firstName = '".$firstName."', lastName = '".$lastName."', team = '".$team."', cpu = '".$cpu."', gpu = '".$gpu."', ram = '".$ram."', monitor = '".$monitor."', mouse = '".$mouse."', keyboard = '".$keyboard."', headset = '".$headset."', mousepad = '".$mousepad."', dpi = '".$dpi."', sensitivity = '".$sensitivity."', crosshair = '".$crosshair."', viewmodel = '".$viewmodel."' where username = '".$username."' ";

        $res = $this->conn->prepare($sql);
        $res->execute();
    }
    public function deleteUser($username) {
        $sql = "DELETE FROM users WHERE username = '".$username."'";
        $res = $this->conn->prepare($sql);
        $res->execute();
        Auth::logout();
    }
    public function createUser($username, $firstName, $lastName, $password) {
        if($this->readTable($username)['username'] == $username) {
            return false;
        } else {
            $sql = "INSERT INTO users (username, firstName, lastName, password) VALUES(?,?,?,?)";
            $res = $this->conn->prepare($sql);
            $res->execute([$username, $firstName, $lastName, $password]);
            return true;
        }

    }
    public function readTable($username) {
        $sql = "SELECT * FROM users WHERE username = '".$username."'";
        $res = $this->conn->query($sql);
        $res->fetchAll();
        $res->execute();
        foreach($res as $row) {
            if(isset($row)) {
                return $row;
            }

        }
        $arr["username"] = "";
        return $arr;
    }
    public function getTable() {
        $sql = "SELECT * FROM users";
        $res = $this->conn->query($sql);
        $res->fetchAll();
        $res->execute();
        return $res;
    }

}