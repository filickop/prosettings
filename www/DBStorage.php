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
        //print_r($res);
        foreach($res as $row) {
            if(isset($row) && $row["password"] == $password) {
                return true;
            }

        }
        return false;
    }
}