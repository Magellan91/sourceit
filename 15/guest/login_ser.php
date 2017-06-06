<?php
if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $login = trim($_POST['login']);
        $password =$_POST['password'];
        include('connect.php');
        $res = mysqli_query($mysqli, "SELECT * FROM `USERS` WHERE login = '$login'");
        $num = mysqli_num_rows($res);
        if ($num != 0) {
            $query = mysqli_query($mysqli,"SELECT password FROM `USERS` WHERE login='$login'");
            $arr=mysqli_fetch_array($query);
            $hash=$arr[0];
            if (password_verify($password, $hash)) {
                session_start();
                $_SESSION['login'] =$login;
                $_SESSION['password'] = $password;
                $num = 1;
                $true = 'Регистрация успешна';
                echo json_encode($true);
            }
            else {
                $error = "Пароль не верный $login";
                echo json_encode($error);
            }

        } else {

        }
} else {
    $error = "Не обяснимо но ошибка";
    echo json_encode($error);
}