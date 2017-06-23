<?php
$host = 'localhost';
$user = 'root';
$password = '123';
$database = 'board';

try {
    $mysqli = new MySQLi($host, $user, $password, $database);
    $query = "SELECT * FROM new_table ";
    $res = $mysqli->query($query);
    if (!$res) {
        throw new Exception($mysqli->error, 404);
    }
} catch (Throwable $e) {
    echo $e->getMessage(), "<br>\n";
    echo $e->getCode(), "<br>\n";
    $string = $e->__toString();
    exit($string);
}

