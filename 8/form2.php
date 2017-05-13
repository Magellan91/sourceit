<?php
if (!empty($_POST['name'])) {

    setcookie("name", $_POST['name']);
} else {
    echo' поле пустое';
}
?>
<pre>
<form method="post">
    <div>Имя Куки: <input type="text" name="name" value=""></div>
    <div><input type="submit" value="Отправить"></div>
</form>
</pre>