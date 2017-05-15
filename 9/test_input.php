<?php
if (!empty($_POST['question']) && !empty($_POST['answer'])) {
$question=$answer=$kat= null;
if ($_POST['kat'] == 'ko') {
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $position = 1;
        $list=array (
            array($question,$answer,$position,),
         );
        $fp = fopen('file1.csv', 'a+');
        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);
        header('Location: http://dev/test_input.php', false);
        exit;
}
elseif ($_POST['kat'] == 'kt') {
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $position = 2;
        $list=array (
            array($question,$answer,$position,),
        );
        $fp = fopen('file1.csv', 'a+');
        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);
        header('Location: http://dev/test_input.php', false);
        exit;
    }
} else {
    if (empty($_POST['question'])) {
        echo ' Вопрос не передана<br>';
    }
    if (empty($_POST['answer'])) {
        echo ' Ответ не передана <br>';
    }

}


?>
<form action="" method="post">
    <div> <select name='kat'>
            <option value='ko'>Категория 1</option>
            <option value='kt'>Категория 2</option>
        </select>
    </div>
    <div>Вопрос: <input type="text" name="question" value=""></div>
    <div>Ответ: <input type="text" name="answer" value=""></div>
    <div><input type="submit" value="Отправить"></div>
</form>

