<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вывод данных</title>
</head>
<body>
<form action="" method="post" style="margin: 0 500px">
   <pre>
       <p> Ведите текст</p>
       <div><textarea rows="10" cols="45" name="text" id="text"></textarea></div>
    <div> <input type="submit" value="Обработать"/></div>
   </pre>
</form>
<?php
if (!empty($_POST['text'])){
$text=$_POST['text'];
$text =  preg_replace("/\s{2,},\f{2,},\n{2,},\r{2,},\t{2,},\v{2,}/",' ',$text);
echo $text;
}?>
</body>
</html>