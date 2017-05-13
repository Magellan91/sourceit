<?php
session_start();
if (!empty($_POST['name'])) {

    $_SESSION['name']=$_POST['name'];;
} else {
    echo' поле пустое';
}
?>
<pre>
<form method="post">
    <div>Имя сесси: <input type="text" name="name" value=""></div>
    <div><input type="submit" value="Отправить"></div>
</form>
</pre>