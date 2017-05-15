<?php
$pattern = '/(([0-2]\d|3[01])\.(0\d|1[012])\.(\d{4}))/';
$str = 'Day is 14.11.1991 yers 18.06.2007';
$found = preg_match($pattern, $str, $matches);
if ($found) {
    var_dump($matches[1]);
}