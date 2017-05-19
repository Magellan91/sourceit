<?php
if (!empty($_POST['question']) && !empty($_POST['answer'])) {
    $question = $answer = $kat = null;
    if ($_POST['kat'] == 'ko') {
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $position = 1;
        $list = array(
            array($question, $answer, $position,),
        );
        $fp = fopen('file1.csv', 'a+');
        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);
        exit;
    } elseif ($_POST['kat'] == 'kt') {
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $position = 2;
        $list = array(
            array($question, $answer, $position,),
        );
        $fp = fopen('file1.csv', 'a+');
        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);
        exit;
    }
} else {
    if (empty($_POST['question'])) {
        echo '<br> Вопрос не передана ';
    }
    if (empty($_POST['answer'])) {
        echo '<br> Ответ не передана ';
    }

}
?>
