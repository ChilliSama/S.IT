<?php
require_once('ressources/php/connect.php');
session_start();

if (!empty($_SESSION['userid']) && !empty($_COOKIE['remember'])) {
    if (isset($_COOKIE['remember'])) {
        list($selector, $authenticator) = explode(':', $_COOKIE['remember']);

        $query = "DELETE FROM auth_tokens WHERE selector = :selector";
        $rowStatement = $db->prepare($query);
        $rowStatement->execute([
            'selector' => $selector,
        ]);

        unset($_COOKIE['remember']); 
        setcookie('remember', null, -1, '/'); 
    }
    unset($_SESSION['userid']);
    unset($_SESSION['username']);

    header("Location: index.php");
}

?>