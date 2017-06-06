<?php
top ('Профиль');
$arr=['/'=>'Главная',
    'login'=>'Выход',
    'prof'=>'Профиль'];
headers($arr);
?>
<h1>Ваш профиль: <?php echo $_SESSION['login'];?></h1>
<?php
bottom();?>
