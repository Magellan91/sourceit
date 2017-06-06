<?php
top('Главная');
$arr = ['/' => 'Главная',
    'login' => 'Выход',
    'prof' => 'Профиль'];
headers($arr); ?>

<?php
bottom(); ?>
