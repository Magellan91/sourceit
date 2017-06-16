<?php
include 'connect.php';
$user_agent = $_SERVER["HTTP_USER_AGENT"];
if (strpos($user_agent, "WOW64") !== false) $browser = "Opera";
elseif (strpos($user_agent, "Win64") !== false) $browser = "Chrome";
else $browser = "Неизвестный";
$look = date('y.m.d H:i:s');
$stmt = mysqli_prepare($mysqli, "INSERT INTO `statistics` (browser, look) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, 'ss', $browser, $look);
mysqli_stmt_execute($stmt);
$im = imagecreatefrompng("php.png");
header('Content-Type: image/png');
imagepng($im);
imagedestroy($im);
