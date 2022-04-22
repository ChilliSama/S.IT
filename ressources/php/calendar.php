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

<div class="justify-content-center text-center container-bg">
    <form method="post"></br>
            <div class="row">
                <div class="col">
                    <?php if ($_SESSION['day_count'] > -15) {
                        printf("<input type='submit' name='previous_day' class='btn bg-transparent' value='<'>");
                        }?>
                    <?php printf("<h5 style='display:inline-block;'>{$day}</h5>"); ?>
                    <?php if ($_SESSION['day_count'] < 15) {
                        printf("<input type='submit' name='next_day' class='btn bg-transparent' value='>'>");
                        }?>
                </div>
            </div>
    </form>
    <form method="post">
        <div class="row">
            <div class="col">
                <a class="calendar-img rot " href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img rot" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img rot" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\desk1.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="calendar-img rot" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img rot" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img rot" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\desk1.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="calendar-img rot" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img rot" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img rot" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\desk1.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="calendar-img rot-minus-90" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img rot-minus-90" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img rot-minus-90" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img rot-minus-90" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="calendar-img rot-90" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img rot-90" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img rot-90" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img rot-90" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img rot" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img rot" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="calendar-img rot" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\desk1.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
                <a class="calendar-img" href="./ressources\img\void.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <br>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>