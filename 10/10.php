<?php
$str1 = 'My first program in php';
$str1=revers($str1);
var_dump($str1);
function revers($str1): string
{
    $words = explode(' ', $str1);
    $words = array_reverse($words);
    $str1 = join(' ', $words);
    $str1=mb_strtolower($str1);
    return $str1;
}