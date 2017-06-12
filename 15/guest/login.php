<?php
top('Войти'); ?>
<script type="text/javascript">
    $(function () {
        var form = $("#user_form");
        form.on('submit', onSubmit);
        function onSubmit(event) {
            event.preventDefault();
            var $that = $(this),
                formData = new FormData($that.get(0));
            formData.append('date_upl', new Date());
            var log = $('#login');
            var pas = $('#password');
            var valid = true;
            if (log.val().length <= 5) {
                valid = false;
                $('#login').removeClass('hide');
            } else {
                $('#login').addClass('hide');
            }
            if (pas.val().length <= 5) {
                valid = false;
                $('#password').removeClass('hide');
            } else {
                $('#password').addClass('hide');
            }
            if (valid) {
                $.ajax({
                    url: "guest/login_ser.php",
                    type: "post",
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        var url = "/";
                        $(location).attr('href',url);
                    }
                });
            }
        }
    });
</script>
<?php
$arr = ['/' => 'Главная',
    'login' => 'Вход',
    'reg' => 'Регистрация'];
headers($arr);
?>
<pre>
    <div class="login">
<form action="" method="post" id="user_form">
    <img src="guest/img/ic.png">
        <p id="error_serv"></p>
    <div id="out">Логин:                <input type="text" class="error hide" placeholder="Логин" name="login" value=""
                                               id="login"></div>
    <div id="out">Пароль:               <input type="password" class="error hide" placeholder="Пароль" name="password"
                                               value=""
                                               id="password"></div>
<input type="submit" value="Войти"
       class="dws-submit"> </div>

    </div>
</pre>
<?php
bottom(); ?>

