<?php

include "debug.php";

$servername = "";
$dbname = "";
$username = "";
$password = "";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    debug_to_console("Connected to sit_db table ✓");
} catch(PDOException $e) {
    error_log($e->getMessage());
    debug_to_console("Connection failed: " . $e->getMessage());
}


?>
