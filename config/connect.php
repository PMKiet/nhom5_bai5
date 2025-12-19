<?php
    $env = parse_ini_file("../.env");

    $servername = $env["SERVERNAME"];
    $username = $env["USERNAME"];
    $password = $env["PASSWORD"];

    //create connect
    $conn = new mysqli($servername, $username, $password);

    //check connect
    if($conn -> connect_error) {
        die("Connect failed: ");
    }
    echo "Connected successfully"
?>