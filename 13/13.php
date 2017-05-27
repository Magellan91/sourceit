<?php
mysqli_report(MYSQLI_REPORT_ALL);
$mysqli = mysqli_connect('localhost', 'supplliers_u', '111', 'Supplliers');
if (!$mysqli) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$stmt = mysqli_prepare($mysqli, "ALTER TABLE `logs` ADD `log_type` ENUM('INFO','DEBUG','ERROR','CRIT') NOT NULL DEFAULT 'INFO' AFTER `created`;");
$execute=mysqli_stmt_execute($stmt);
if ($execute) {
    echo 'Таблица добавлина успешно';
} else{
    echo 'Что то пошло не так';
}