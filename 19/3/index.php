<?php
include_once 'connect.php';
$downloads = mysqli_query($mysqli, "SELECT * FROM `statik` WHERE id = 1");
$downloads_result = mysqli_fetch_array($downloads);
$result = $downloads_result['Downloads'] + 1;
if (!empty($_POST['text'])) {
    $stmt = mysqli_query($mysqli, "UPDATE `statik` SET   Downloads = $result WHERE id=1");
    header("location: http://dev/19/3/php.rar", false);
    exit($result);
} ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вывод данных</title>
</head>
<body>
<form action="" method="post" style="margin: 0 500px">
   <pre>
       <p> Нажмите скачать! Количество скачивание <?php
           echo $downloads_result['Downloads'];
           ?> </p>
       <div><input type="hidden" value="text" id="text" name="text"></div>
    <div> <input type="submit" value="Скачать"/></div>
   </pre>
</form>

</body>
</html>