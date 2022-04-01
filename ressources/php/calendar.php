<?php
    setlocale(LC_TIME, 'fr_FR', "French");
    date_default_timezone_set('Europe/Paris');
    
    $date = new DateTime(date("d-M-Y"));
    $date->add(new DateInterval('P1D'));
    $today = utf8_encode(strftime('%A %d %B %Y', strtotime($date->format('d-m-Y'))));
    

?>

<div>
    <form method="post">
        <div class="d-flex justify-content-center align-items-center"></br></br></br>
            <input type="submit" name="previous_day" class="btn bg-transparent" value="<">
            <?php printf("<h5 style='display:inline-block;'>{$today}</h5>"); ?>
            <input type="submit" name="next_day" class="btn bg-transparent" value=">">
        </div></br>
    </form>
</div>