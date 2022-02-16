<?php 

    /* Create date list for the current month */
    function dates_month($month, $year) {
        $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $dates_month = array();

        for ($i = 1; $i <= $num; $i++) {
            $mktime = mktime(0, 0, 0, $month, $i, $year);
            $date = date("d-M-Y", $mktime);
            $dates_month[$i] = $date;
        }

        return $dates_month;
    }

    $date = date("d-M-Y");
    

?>

<form method="post">
    <input type="submit" name="previous_day" class="btn bg-transparent" value="<">
    <?php printf("<h5 style='display:inline-block;'>{$date}</h5>"); ?>
    <input type="submit" name="next_day" class="btn bg-transparent" value=">">
</form>