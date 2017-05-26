<?php
function &data_today($start_data)
{
    $start = microtime(true);
    $data_1 = strtotime(date($start_data));
    $today = strtotime(date("d.m.Y"));
    $array_dates = [];
    $a = 0;
    for ($i = $data_1; $i < $today; $i += 86400) {
        list($day, $month, $year) = explode(".", date("d.m.Y", $i));
        $array_dates[$a] = [
            'Day' => $day,
            'Month' => $month,
            'Year' => $year
        ];
        $a++;
    }
    If ($a <= 365) {
        echo "Прошло меньше года, А точнее: $a дней<br> ";
    } else {
        echo "Прошло больше года, А точнее: $a дней<br>";
    }
    $time = microtime(true) - $start;
    echo "Функция выполнялася $time сек." . '<br>';
    return $array_dates;
}

$fu =& data_today('10.02.2017');
foreach ($fu as $key => $value) {
    echo "{Day} => {$value['Day']} " . "<br>";
    echo "{Month} => {$value['Month']} " . "<br>";
    echo "{Year} => {$value['Year']} " . "<br>";
    echo '<br>';
}
