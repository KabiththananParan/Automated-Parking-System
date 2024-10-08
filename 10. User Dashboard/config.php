<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "e-park";

    $con = new mysqli($server, $username, $password, $database);

    if($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }


?>
