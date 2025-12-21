<?php
$env = parse_ini_file("../.env");

$servername = $env["SERVERNAME"];
$username = $env["USERNAME"];
$password = $env["PASSWORD"];
$db = $env['DB'];

//create connect
$conn = new mysqli($servername, $username, $password, $db);

//check connect
if ($conn->connect_error) {
    die("Connect failed: ");
}
// echo "Connected successfully";
