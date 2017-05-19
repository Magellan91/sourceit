<?php
$randstr=GeneratStr(45);
echo 'Случайная строка '.$randstr;

function GeneratStr($length = 40){
    $chars = 'abdefhiknrstyz ABDEFGHKNQRSTYZ ';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}