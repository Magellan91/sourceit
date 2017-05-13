<?php
if (($red = fopen("file.csv", "r")) !== FALSE) {
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


if ($_REQUEST['sorting'] == 'asc') {
    sort($arr2);
    foreach ($arr2 as $value) {

        foreach ($value as $value2) {
            echo $value2 . ' ';
        }
        echo '<br>';
    }
} elseif ($_REQUEST['sorting'] == 'desc') {
    rsort($arr2);
    foreach ($arr2 as $value) {

        foreach ($value as $value2) {
            echo $value2 . ' ';
        }
        echo '<br>';
    }
};
if (!empty($_POST['filter'])) {
    $word = $_POST['filter'];
    echo 'Значения с ' . $word . '<br>';
    foreach ($arr2 as $value) {
        foreach ($value as $value2) {
            if ($value[0] == $word or $value[1] == $word) {
                echo $value2 . ' ';
            } else {
                break;
            }
        }
    };
}
?>
<form action="" method="post">
    <select name='sorting'>
        <option value='asc'>По возрастанию</option>
        <option value='desc'>По убыванию</option>
    </select>
    <input type="submit" value="Сортировать"/>
</form>
<form method="post">
    Имя: <input type="text" name="filter" value="">
    <input type="submit" value="Найти"/>
</form>


