<?php
top('Регистрация'); ?>
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
            var mail = $('#email');
            var pas = $('#password');
            var pas_2 = $('#password_2');
            var valid = true;
            if (log.val().length <= 5) {
                valid = false;
                $('#login').removeClass('hide');
            } else {
                $('#login').addClass('hide');
            }
            if (mail.val().length <= 5) {
                valid = false;
                $('#email').removeClass('hide');
            } else {
                $('#email').addClass('hide');
            }
            if (pas.val().length <= 5) {
                valid = false;
                $('#password').removeClass('hide');
            } else {
                $('#password').addClass('hide');
            }
            if (pas_2.val().length <= 5) {
                valid = false;
                $('#password_2').removeClass('hide');
            } else {
                $('#password_2').addClass('hide');
            }
            if (pas_2.val() != pas.val()) {
                if (pas_2.val().length <= 0) {
                    $('#password_2').removeClass('hide');
                } else {
                    $('#password_2').removeClass('hide');
                }
                valid = false;
            } else {
                $('#p_error').addClass('hide');
            }
            if (valid) {
                $.ajax({
                    url: "guest/register_ser.php",
                    type: "post",
                    dataType: "json",
                        contentType: false,
                        processData: false,
                        data: formData,
                    success: function (data) {
                        $('#login').val('');
                        $('#email').val('');
                        $('#password').val('');
                        $('#password_2').val('');
                        $('#error_serv').text(data);
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
headers($arr); ?>
<pre>
    <div class="register">
<form action="" method="post" id="user_form">
    <img src="guest/img/ic.png">
        <p id="error_serv"></p>
    <div id="out">Логин:                <input type="text" class="error hide" placeholder="Логин" name="login" value=""
                                               id="login"></div>
    <div id="out">Email:                <input type="text" class="error hide" placeholder="Email" name="email" value=""
                                               id="email"></div>
    <div id="out">Пароль:               <input type="password" class="error hide" placeholder="Пароль" name="password"
                                               value=""
                                               id="password"></div>
    <div id="out">Подтверждение пароля: <input type="password" class="error hide" placeholder="Подтверждение пароля"
                                               name="password_2"
                                               value="" id="password_2"></div>
<input type="submit" value="Зарегистрироваться"
       class="dws-submit"> </div>

    </div>
</pre>
<?php
bottom(); ?>

