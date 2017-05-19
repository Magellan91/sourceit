<?php
if (($red = fopen("file1.csv", "r")) !== FALSE) {
    $arr1 = $arr2 = $arr = [];
    $i = 0;
    while (($data = fgetcsv($red, 1000, ",")) !== FALSE) {
        $num = count($data);
        for ($c = 0; $c < $num; $c++) {
            $arr1[$c] = $data[$c];
        }
        $arr2[$i] = $data;
        $i++;
    }
}
if (!empty($_POST['kat'])) {
    if ($_POST['kat'] == 'all') {
        $i = 1;
        foreach ($arr2 as $value) {
            echo '№ ' . $i++ . ' ' . $value[0] . '<br>';
            echo 'Ответ: ' . $value[1] . '<br>';
            echo 'Категория: ' . $value[2] . '<br>';
            echo '<br>';
        }
    }
    if ($_POST['kat'] == 'kt') {
        $i = 1;
        foreach ($arr2 as $value) {
            if ($value[2] == 2) {
                echo '№ ' . $i++ . ' ' . $value[0] . '<br>';
                echo 'Ответ: ' . $value[1] . '<br>';
                echo 'Категория: ' . $value[2] . '<br>';
                echo '<br>';
            }
        }
    } elseif ($_POST['kat'] == 'ko') {
        $i = 1;
        foreach ($arr2 as $value) {
            if ($value[2] == 1) {
                echo '№ ' . $i++ . ' ' . $value[0] . '<br>';
                echo 'Ответ: ' . $value[1] . '<br>';
                echo 'Категория: ' . $value[2] . '<br>';
                echo '<br>';
            }
        }
    }
}
?>
