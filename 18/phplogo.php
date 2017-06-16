<?php include 'connect.php';?>
<h1 align="center">Добро пожаловать!</h1>
<img src="img.php">
<?php //include ('auth/server/img.php');?>
<?php
$today = mysqli_query($mysqli, "SELECT COUNT(id) FROM statistics WHERE DATE(look) = DATE(now()) AND MONTH(look) = MONTH(now()) AND YEAR(look) = YEAR(now())");
$today_res = mysqli_fetch_array($today);
$yesterday = mysqli_query($mysqli, "SELECT COUNT(id) FROM statistics WHERE DATE(look) = DATE(now())-1 AND MONTH(look) = MONTH(now()) AND YEAR(look) = YEAR(now())");
$yesterday_res = mysqli_fetch_array($yesterday);
$month = mysqli_query($mysqli, "SELECT COUNT(id) FROM statistics WHERE MONTH (look) = MONTH(now()) AND YEAR (look) = YEAR(now())");
$month_res = mysqli_fetch_array($month);
$today_chrome = mysqli_query($mysqli, "SELECT COUNT(id) FROM statistics WHERE DATE(look) = DATE(now()) AND MONTH(look) = MONTH(now()) AND YEAR(look) = YEAR(now()) AND browser = 'Chrome'");
$today_chrome_res = mysqli_fetch_array($today_chrome);
$today_Opera = mysqli_query($mysqli, "SELECT COUNT(id) FROM statistics WHERE DATE(look) = DATE(now()) AND MONTH(look) = MONTH(now()) AND YEAR(look) = YEAR(now()) AND browser = 'Opera'");
$today_Opera_res = mysqli_fetch_array($today_Opera);
$yesterday_Opera = mysqli_query($mysqli, "SELECT COUNT(id) FROM statistics WHERE DATE(look) = DATE(now())-1 AND MONTH(look) = MONTH(now()) AND YEAR(look) = YEAR(now()) AND browser = 'Opera'");
$yesterday_Opera_res = mysqli_fetch_array($yesterday_Opera);
$yesterday_chrome = mysqli_query($mysqli, "SELECT COUNT(id) FROM statistics WHERE DATE(look) = DATE(now())-1 AND MONTH(look) = MONTH(now()) AND YEAR(look) = YEAR(now()) AND browser = 'Chrome'");
$yesterday_chrome_res = mysqli_fetch_array($yesterday_chrome);
$month_chrome = mysqli_query($mysqli, "SELECT COUNT(id) FROM statistics WHERE MONTH (look) = MONTH(now()) AND YEAR (look) = YEAR(now()) AND browser = 'Chrome'");
$month_chrome_res = mysqli_fetch_array($month_chrome);
$month_Opera = mysqli_query($mysqli, "SELECT COUNT(id) FROM statistics WHERE MONTH (look) = MONTH(now()) AND YEAR (look) = YEAR(now()) AND browser = 'Opera'");
$month_Opera_res = mysqli_fetch_array($month_Opera);
echo "<div style=\"padding: 10px; font-size:19px;\">
<b>ОБЩАЯ СТАТИСТИКА:</b>
<ul>
    <li>сегодня: $today_res[0]</li>
    <li>вчера: $yesterday_res[0]</li>
    <li>за месяц: $month_res[0]</li>
</ul>
<br><br>
<b>БРАУЗЕРЫ:</b><br>
<b>сегодня:</b><br>
<ul>
    <li>Opera: $today_Opera_res[0]</li>
    <li>Chrome: $today_chrome_res[0]</li>
</ul>
<br><br><b>Вчера</b><br>
<ul>
    <li>Opera: $yesterday_Opera_res[0]</li>
    <li>Chrome: $yesterday_chrome_res[0]</li>
</ul>
<br><br><b>За месяц:</b><br>
<ul>
    <li>Opera: $month_Opera_res[0]</li>
    <li>Chrome: $month_chrome_res[0]</li>
</ul></div><br><br>";
?>