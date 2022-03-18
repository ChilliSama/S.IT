<?php

include "debug.php";

$servername = "localhost";
$dbname = "sit_db";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    debug_to_console("Connected to sit_db table ✓");
} catch(PDOException $e) {
    error_log($e->getMessage());
    debug_to_console("Connection failed: " . $e->getMessage());
}


?>
