<?php
$ip = file_get_contents('https://api.ipify.org?format=json');
$ipData = json_decode($ip, true);
echo $ipData['ip'];
?>
