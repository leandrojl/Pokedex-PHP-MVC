<?php

class mysql_database_manager {

    private $connection;

    public function __construct($servername, $username, $password, $database, $port) {

        $this->connection = mysqli_connect($servername, $username, $password, $database,$port);

        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

    }

    public function query($query) {
            $sqlResult = mysqli_query($this->connection, $query);
            return mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);
    }

    public function __destruct(){

        mysqli_close($this->connection);

    }




}


?>