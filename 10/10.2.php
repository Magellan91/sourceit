<?php
if (!empty($_POST['FIO']) or !empty($_POST['sorting'])) {
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
    if ($_POST['sorting'] == 'asc') {
        sort($arr2);
        if ($_POST['FIO'] == 'FI') {
            foreach ($arr2 as $value) {
                echo '<br> Фамилия:' . $value[0] . '<br> Имя: ' . $value[1] . '<br> Должность: ' . $value[2] . '<br>';
                echo '<br>';
            }
        } else {
            foreach ($arr2 as $value) {
                echo '<br> Имя: ' . $value[1] . '<br> Фамилия: ' . $value[0] . '<br> Должность: ' . $value[2] . '<br>';
                echo '<br>';
            }
        }
    } elseif ($_POST['sorting'] == 'desc') {
        rsort($arr2);
        if ($_POST['FIO'] == 'FI') {
            foreach ($arr2 as $value) {
                echo '<br> Фамилия:' . $value[0] . '<br> Имя: ' . $value[1] . '<br> Должность: ' . $value[2] . '<br>';
                echo '<br>';
            }
        } else {
            foreach ($arr2 as $value) {
                echo '<br> Имя: ' . $value[1] . '<br> Фамилия: ' . $value[0] . '<br> Должность: ' . $value[2] . '<br>';
                echo '<br>';
            }
        }
    }
}
?>

<form action="" method="post">
    <select name='sorting' size=1>
        <option value='asc'>По возрастанию</option>
        <option value='desc'>По убыванию</option>
    </select>
    <select name='FIO' size=1>
        <option value='FI'>Фамилия Имя</option>
        <option value='IF'>Имя Фамилия</option>
    </select>
    <input type="submit" value="Сортировать"/>
</form>