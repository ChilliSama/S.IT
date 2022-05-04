<?php include "ressources/php/header.php"; ?>

<?php
    if (!empty($_SESSION['userid'])) {
        include "ressources/php/calendar.php";
    } else {
        include "ressources/php/home.php";
    }
?>

<?php include "ressources/php/footer.php"; ?>
