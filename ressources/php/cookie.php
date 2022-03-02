<?php

if (!isset($_COOKIE['user_id'])) {
    setcookie('user_id', "", time()+3600, $_SERVER['HTTP_HOST'], '', false, false);
} elseif (!isset($_COOKIE['remember'])) {
    setcookie('remember', "", time()+3600, $_SERVER['HTTP_HOST'], '', false, false);
}

if (empty($_SESSION['userid']) && !empty($_COOKIE['remember'])) {
    list($selector, $authenticator) = explode(':', $_COOKIE['remember']);

    $row = $database->selectRow(
        "SELECT * FROM auth_tokens WHERE selector = ?",
        [
            $selector
        ]
    );

    if (hash_equals($row['token'], hash('sha256', base64_decode($authenticator)))) {
        $_SESSION['userid'] = $row['userid'];
        // Then regenerate login token as above
    }
}

?>