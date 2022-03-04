<?php

session_start();

// if (empty($_SESSION['userid']) && !empty($_COOKIE['remember'])) {
//     list($selector, $authenticator) = explode(':', $_COOKIE['remember']);

//     $query = "SELECT * FROM auth_tokens WHERE selector = $selector";
//     $row = mysqli_fetch_assoc(mysqli_query($connect, $query));

//     if (hash_equals($row['token'], hash('sha256', base64_decode($authenticator)))) {
//         $_SESSION['userid'] = $row['userid'];
//         // Then regenerate login token as above
//     }
// }

?>