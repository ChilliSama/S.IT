<?php
# catch old cookies in db and delete them
setlocale(LC_TIME, 'fr_FR', "French");
date_default_timezone_set('Europe/Paris');

$now = strtotime(date("Y-M-d h:i:s"));

$query = "SELECT expires FROM auth_tokens";
$expireStatement = $db->prepare($query);
$expireStatement->execute();
$expires = $expireStatement->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($expires); ++$i) {
    $str_expires = $expires[$i]['expires'];
    $tmp = strtotime($str_expires);
    if ($tmp < $now) {
        $query = "DELETE FROM auth_tokens WHERE expires = :expires";
        $rowStatement = $db->prepare($query);
        $rowStatement->execute([
            'expires' => $str_expires,
        ]);
    }
}
?>