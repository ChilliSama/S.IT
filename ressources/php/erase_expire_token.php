<?php
# catch old cookies in db and delete them

$now = time() + 3600*2;

$query = "SELECT expires FROM auth_tokens";
$expireStatement = $db->prepare($query);
$expireStatement->execute();
$expires = $expireStatement->fetchAll(PDO::FETCH_ASSOC);

var_dump($expires);

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