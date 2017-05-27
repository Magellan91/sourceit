<?php
$mysqli = mysqli_connect('localhost', 'supplliers_u', '111', 'Supplliers');
if (!$mysqli) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}