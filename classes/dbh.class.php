<?php

class Dbh
{
    protected $host = "localhost";
    protected $dbName = "scaniweb";
    protected $username = "root";
    protected $password = "";

    protected function connect()
    {
        try {
            $dbName = "scaniweb";
            $username = "root";
            $password = "";
            $dbh = new PDO("mysql:host=localhost;dbname=" . $dbName, $username, $password);
            return $dbh;

        } catch (PDOException $e) {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }
    }
}
