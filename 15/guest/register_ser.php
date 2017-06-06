<?php
if (!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_2'])) {
    if ($_POST['password'] === $_POST['password_2']) {
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $created = date('d.m.y H:i:s');
        include('connect.php');
        $res = mysqli_query($mysqli, "SELECT * FROM `USERS` WHERE login = '$login'");
        $num = mysqli_num_rows($res);
        if ($num == 0) {
            $res = mysqli_query($mysqli, "SELECT * FROM `USERS` WHERE email = '$email'");
            $num = mysqli_num_rows($res);
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
                echo json_encode($error);
            }
        } else {
            $error = "Логин существует $login";
            echo json_encode($error);
        }
    } else {
        $error = "Пароли не совпадают";
        echo json_encode($error);
    }

} else {
    $error = "Не обяснимо но ошибка";
    echo json_encode($error);
}