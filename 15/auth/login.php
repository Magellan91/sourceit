<?php
top('Профиль');
$_SESSION = array();
$arr = ['/' => 'Главная',
    'login' => 'Выход',
    'prof' => 'Профиль'];
headers($arr);
?>
<h1>Вы вышли с профиля</h1>
<?php
bottom();
?>
