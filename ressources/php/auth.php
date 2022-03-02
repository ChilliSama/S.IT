<?php

function set_auth_cookie($rem){
    $selector = base64_encode(random_bytes(9));
    $authenticator = random_bytes(33);
    
    if ($rem) {
        $timer = time() + 3600*24*15;
    } else {
        $timer = time() + 3600;
    }

    setcookie(
        'remember',
         $selector.':'.base64_encode($authenticator),
         $timer,
         $_SERVER['HTTP_HOST'],
         '',
         false, // TLS-only
         false  // http-only
    );

    $query = "INSERT INTO auth_tokens (selector, token, userid, expires)";
                $query .= "VALUES ($selector, hash('sha256', $authenticator), $login->userId, date('Y-m-d\TH:i:s', time() + 864000)";
                $query_add = mysqli_query($connect, $query);
}


?>