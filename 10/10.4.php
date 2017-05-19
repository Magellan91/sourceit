<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вод данных</title>
    <link href="style.css" rel="stylesheet">
</head>
<body><pre>
<form action="" method="post">
    <div><select name='kat'>
        <option value='ko'>Категория 1</option>
        <option value='kt'>Категория 2</option>
    </select>
        <?php include("test_input.php"); ?>
    </div>
    <div>Вопрос: <input type="text" name="question" value=""></div>
    <div>Ответ:  <input type="text" name="answer" value=""></div>
    <div>        <input type="submit" value="Отправить"></div>

</pre>
</form>

</body>
</html>