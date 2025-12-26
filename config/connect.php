<?php

//create connect
function connectDB()
{
    $env = parse_ini_file(__DIR__ . "/../.env");

    $servername = $env["SERVERNAME"];
    $username = $env["USERNAME"];
    $password = $env["PASSWORD"];
    $db = $env['DB'];
    $conn = new mysqli($servername, $username, $password, $db);

    //check connect
    if ($conn->connect_error) {
        die("Connect failed: ");
    }

    return $conn;
}
// echo "Connected successfully";
