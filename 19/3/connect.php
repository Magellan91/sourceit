<?php
$mysqli = mysqli_connect('localhost', 'root', '123', 'board');
if (!$mysqli) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}