<?php
    $servername = "localhost";
    $dbname = "my_cristiancaeira";
    $dbuser = "cristiancaeira";
    $dbpassword = "";

    $conn = mysqli_connect($servername, $dbuser, $dbpassword, $dbname);

    if(!$conn) {
        die("Connessione fallita: " . mysqli_connect_error());
    }

 