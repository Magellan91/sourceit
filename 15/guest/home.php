<?php
top('Главная');
$arr = ['/' => 'Главная',
    'login' => 'Вход',
    'reg' => 'Регистрация'];
headers($arr); ?>

<?php
bottom(); ?>
