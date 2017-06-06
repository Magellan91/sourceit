<?php
if ($_SERVER['REQUEST_URI'] == '/') {
    $page = 'home';
} else {
    $page = substr($_SERVER['REQUEST_URI'], 1);
    if (!preg_match('/^[A-z0-9]{3,15}$/', $page)) exit('Erorr url');
}
session_start();
$num=0;
if (file_exists('all/' . $page . '.php')) {
    include 'all/' . $page . '.php';
} elseif ((isset($_SESSION['login'])) and (file_exists('auth/' . $page . '.php'))
) {
    include 'auth/' . $page . '.php';
} elseif ((!isset($_SESSION['login'])) and file_exists('guest/' . $page . '.php')) {
    include 'guest/' . $page . '.php';
} else {
    exit('Страница 404');
}
function top($title)
{
    echo '<!DOCTYPE html>
              <html>
              <head>
              <meta charset="UTF-8">
              <title>' . $title . ' </title>
              <link type="text/css" rel="stylesheet" href="style.css" >
              <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
              <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">';
}

function headers($arr)
{
    echo '</head>
              <body>
              <div class="wrapper">  
                          <div class="menu">
                          <header><nav>';
    foreach ($arr as $key => $value) {
        echo '<a href='.$key.'>'.$value.'</a>';
    }
    echo '</nav>
              </header>
</div>
               <div class="content"><div class="bloc">';
}

function bottom()
{
    echo '</div></div></div></body> </html>';
}

?>