<?php

include "debug.php";

$connect = mysqli_connect("","","","");

if(!$connect){
    die("Connection failed: " . mysqli_connect_error());
} else {
    debug_to_console("Connected to sit_db table ✓");
}


?>
