<?php 
if (!empty($_POST['kat'])){
if (!empty($_POST['question']) && !empty($_POST['answer'])) {
    $true =['success' => true,];
    echo json_encode( $true);
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
    $error=['success' => false, 'errors'=>['question'=>'Field is empty']];
    if (empty($_POST['question'])) {
        echo json_encode($error);
    }
    else {
        echo json_encode($error);
    }
        if (empty($_POST['answer'])) {
        echo json_encode($error);
    } else{
        echo json_encode($error);
    }

}}
?>
