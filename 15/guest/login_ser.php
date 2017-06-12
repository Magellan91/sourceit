<?php
if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    include('connect.php');
    $stmt = mysqli_prepare($mysqli, "SELECT * FROM `USERS` WHERE `login` = ? ");
    mysqli_stmt_bind_param($stmt, 's', $login);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $num = mysqli_num_rows($result);
    if ($num != 0) {
        $query = mysqli_prepare($mysqli, "SELECT `login`, `password` FROM `USERS` WHERE login = ?");
        mysqli_stmt_bind_param($query, 's', $login);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        $arr = mysqli_fetch_assoc($result);
        $hash = $arr['password'];
        if (password_verify($password, $hash)) {
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $num = 1;
            $true = 'Регистрация успешна';
            echo json_encode($true);
        } else {
            $error = "Пароль не верный $login";
        }

    } else {

    }
} else {
    $error = "Не обяснимо но ошибка";
}
if (isset($error))
    echo json_encode($error);