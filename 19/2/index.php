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
if (!empty($_POST['text'])) {
    $text = $_POST['text'];
    if (preg_match('/^[A-z0-9\s]+$/', $text)) {
        $text = str_word_count($text, 1);
        foreach ($text as &$value) {
            $value = strlen($value);
        }
        $text = array_count_values($text);
        foreach ($text as $key => $value) {
            echo 'Количество слов содержащих ' . $key . ' символов: ' . $value . '<br>';
        }
    } else {
        $text = str_word_count($text, 1, "АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя");
        foreach ($text as &$value) {
            $value = strlen($value);
        }
        $text = array_count_values($text);
        foreach ($text as $key => $value) {
            echo 'Количество слов содержащих ' . $key / 2 . ' символов: ' . $value . '<br>';
        }
    }
} ?>
</body>
</html>