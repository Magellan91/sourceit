<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вод данных</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

<form action="" method="post">
   <pre> <select name='kat' size=1>
        <option value='all'>Вывусти все</option>
        <option value='ko'>Категория 1</option>
        <option value='kt'>Категория 2</option>
    </select>
    <div><input type="submit" value="Сортировать"/></div>
       <?php include("test_ouput.php"); ?>
   </pre>
</form>
</body>
</html>