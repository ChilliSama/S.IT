<?php

setcookie('user_id', "guest", time()+3600*24, '/', '', true, true);

if(isset($_COOKIE['user_id'])){
    echo 'Votre ID de session est le ' .$_COOKIE['user_id'];
} else {
    setcookie('user_id', "guest", time()+3600*24, '/', '', true, true);
    echo 'Création ID de session :  ' .$_COOKIE['user_id'];
}

?>