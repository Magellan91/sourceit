<?php
if (!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_2'])) {
    if ($_POST['password'] === $_POST['password_2']) {
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $created = date('d.m.y H:i:s');
        include('connect.php');
        $stmt = mysqli_prepare($mysqli, "SELECT * FROM `USERS` WHERE `login` = ? ");
        mysqli_stmt_bind_param($stmt, 's', $login);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $num = mysqli_num_rows($result);
        if ($num == 0) {
            $stmt = mysqli_prepare($mysqli, "SELECT * FROM `USERS` WHERE `email` = ? ");
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $num = mysqli_num_rows($result);
            if ($num == 0) {
                $stmt = mysqli_prepare($mysqli, "INSERT INTO `USERS` (login, email, password, created) VALUES (?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt, 'ssss', $login, $email, $password, $created);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                mysqli_close($mysqli);
                $true = 'Регистрация успешна';
                echo json_encode($true);
            } else {
                $error = "Email существует $email";
            }
        } else {
            $error = "Логин существует $login";
        }
    } else {
        $error = "Пароли не совпадают";
    }
} else {
    $error = "Не обяснимо но ошибка";
}
if (isset($error))
    echo json_encode($error);