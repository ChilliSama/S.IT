<?php include "ressources/php/header.php"; ?>

<div class="container-fluid">

    <?php
        if (!empty($_SESSION['userid'])) {
            include "ressources/php/calendar.php";
        } else {
            include "ressources/php/home.php";
        }
    ?>

</div>

<?php include "ressources/php/footer.php"; ?>
