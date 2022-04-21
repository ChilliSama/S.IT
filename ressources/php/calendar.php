<?php
    setlocale(LC_TIME, 'fr_FR', "French");
    date_default_timezone_set('Europe/Paris');
    
    if (!isset($_SESSION['date'])) {
        $_SESSION['date'] = new DateTime(date("d-M-Y"));
        $_SESSION['date']->add(new DateInterval('P1D'));
        $_SESSION['day_count'] = 0;
        $day = utf8_encode(strftime('%A %d %B %Y', strtotime($_SESSION['date']->format('d-m-Y'))));
    } else {
        if (isset($_POST['next_day']) && $_SESSION['day_count'] < 15) {
            $_SESSION['date']->modify('+1 day');
            $day = utf8_encode(strftime('%A %d %B %Y', strtotime($_SESSION['date']->format('d-m-Y'))));
            $_SESSION['day_count'] = $_SESSION['day_count'] + 1;
            $activate_next = 1;
        } elseif (isset($_POST['previous_day']) && $_SESSION['day_count'] > -15) {
            $_SESSION['date']->modify('-1 day');
            $day = utf8_encode(strftime('%A %d %B %Y', strtotime($_SESSION['date']->format('d-m-Y'))));
            $_SESSION['day_count'] = $_SESSION['day_count'] - 1;
            unset($_POST);
            $activate_prev = 1;
        } else {
            $day = utf8_encode(strftime('%A %d %B %Y', strtotime($_SESSION['date']->format('d-m-Y'))));
        }
    }
?>

<div>
    <form method="post">
        <div class="d-flex justify-content-center align-items-center"></br></br></br>
            <?php if ($_SESSION['day_count'] > -15) {
                printf("<input type='submit' name='previous_day' class='btn bg-transparent' value='<'>");
                }?>
            <?php printf("<h5 style='display:inline-block;'>{$day}</h5>"); ?>
            <?php if ($_SESSION['day_count'] < 15) {
                printf("<input type='submit' name='next_day' class='btn bg-transparent' value='>'>");
                }?>
        </div></br>
    </form>
    <div class="container-fluid justify-content-center text-center">
        <div class="row">
            <div class="col">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
                <img class="calendar-img" src="./ressources\img\rect.png" alt="">
            </div>
        </div>
    </div>
</div>
