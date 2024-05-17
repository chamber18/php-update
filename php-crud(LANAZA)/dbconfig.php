<?php
    $servername = "localhost";
    $username ="root";
    $password = "";
    $dbname = "dbcrud";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if ($conn -> connect_error){
        die("Opps! Error occured : ".$conn->connect_error);
    }

?>