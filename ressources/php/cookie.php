<?php

if (!isset($_COOKIE['user_id'])) {
    setcookie('user_id', "guest", time()+3600*24, $_SERVER['HTTP_HOST'], '', false, false);
}

?>