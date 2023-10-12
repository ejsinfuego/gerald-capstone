<?php

    $database= new mysqli("localhost","root","","kkbn");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>