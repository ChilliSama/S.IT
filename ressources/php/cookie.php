<?php

session_start();

if (empty($_SESSION['userid']) && !empty($_COOKIE['remember'])) {
    list($selector, $authenticator) = explode(':', $_COOKIE['remember']);

    $query = "SELECT * FROM auth_tokens WHERE selector = :selector";
    $rowStatement = $db->prepare($query);
    $rowStatement->execute([
        'selector' => $selector,
    ]);
    $row = $rowStatement->fetch(PDO::FETCH_ASSOC);

    $query = "SELECT nom, prenom FROM user WHERE id_user = :userid";
    $userStatement = $db->prepare($query);
    $userStatement->execute([
        'userid' => $row['userid'],
    ]);
    $user = $userStatement->fetch(PDO::FETCH_ASSOC);

    if (hash_equals($row['token'], hash('sha256', base64_decode($authenticator)))) {
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['username'] = $user['prenom'] . "." . $user['nom'];
    }
}
?>