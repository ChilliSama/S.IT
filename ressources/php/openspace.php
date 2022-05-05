<?php

    function disp_void(){
        printf("");
    }

    // 0 = void
    // 1 = class="calendar-img"
    // 2 = class="calendar-img rot"
    // 3 = class="calendar-img rot-minus-90"
    // 4 = class="calendar-img rot-90"
    // 
    // +--------+
    // |xx xx xx|
    // |xx xx xx|
    // |xx xx xx|
    // |        |
    // |xx xx   |
    // |xx xx   |
    // |        |
    // |  xx    |
    // |  xx    |
    // |        |
    // |xx      |
    // +--------+


    if (!isset($map)) {
        $map = array(
            array(2,1,0,2,1,0,2,1),
            array(2,1,0,2,1,0,2,1),
            array(2,1,0,2,1,0,2,1),
            array(0,0,0,0,0,0,0,0),
            array(3,3,0,3,3,0,0,0),
            array(4,4,0,4,4,0,0,0),
            array(0,0,0,0,0,0,0,0),
            array(0,0,2,1,0,0,0,0),
            array(0,0,2,1,0,0,0,0),
            array(0,0,0,0,0,0,0,0),
            array(2,1,0,0,0,0,0,0)
        );
    }

    for ($row=0; $row < count($map); $row++) {
        for ($col=0; $col < count($map[$row]); $col++) {
            switch($map[$row][$col]) {
                case 0:
                    disp_void();
                    break;
                case 1:
                    disp_desk(1);
                    break;
                case 2:
                    disp_desk(2);
                    break;
                case 3:
                    disp_desk(3);
                    break;
                case 4:
                    disp_desk(4);
                    break;
            }
        }
    }

?>