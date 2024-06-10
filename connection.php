<?php

class Database {

    public static $connection;

    public static function setUpConnection() {


            Database::$connection = new mysqli("localhost", "root", "King7f2d!@#$", "horizon1", 3306);

            // Database::$connection -> init();
            // Database::$connection -> real_connect('localhost', 'root', 'King7f2d', 'horizon0');

            $response = 0;
            if (Database::$connection->connect_error) {
                // die("Failed " . Database::$connection->connect_error);
                $response = ("Failed " . Database::$connection->connect_error);
                return $response;
            }


    }

    public static function iud($query) {

        Database::setUpConnection();

        Database::$connection->query($query);

    }

    public static function search($query) {

        Database::setUpConnection();

        $resultSet = Database::$connection->query($query);

        return $resultSet;

    }

}

?>