<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вод данных</title>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <style type="text/css">
        body {
            background: #fffbfb;
            font-size: 14px;
        }

        form {
            margin: 0 auto;
            padding: 10px;
            background: #a3a2ff;
            width: 600px;
            border-radius: 3px;
            color: #000000;
            box-shadow: 0 0 10px #000000;

        }

        #out {
            margin: 0 auto;
            color: #000000;
            width: 550px;
        }
        .error {
            color: red;
        }

        .hide {
            display: none;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            var form = $("#user_form");
            form.on('submit', onSubmit);
            function onSubmit(event) {
                event.preventDefault();
                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var company = $("#company").val();
                var city = $("#city").val();
                var country = $("#country").val();
                $.ajax({
                    url: "Serv.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        first_name: first_name,
                        last_name: last_name,
                        company: company,
                        city: city,
                        country: country,
                    },
                    success: function (data) {
                        $('#first_name').val('');
                        $('#last_name').val('');
                        $('#company').val('');
                        $('#city').val('');
                        $('#country').val('');
                    }
                });
            }
        });
    </script>
</head>
<body>

<pre>
<form action="" method="post" id="user_form">
    <div id="out">Имя:       <input name="first_name" value="" id="first_name"></div>
     <div class="error hide" id="first_name_error">Вопрос должно быть больше 2х символов</div>
    <div id="out">Фамилия:   <input name="last_name" value="" id="last_name"></div>
     <div class="error hide" id="last_name_error">Вопрос должно быть больше 2х символов</div>
    <div id="out">Компания:  <input name="company" value="" id="company"></div>
     <div class="error hide" id="company_error">Вопрос должно быть больше 2х символов</div>
    <div id="out">Город:     <input name="city" value="" id="city"></div>
     <div class="error hide" id="city_error">Вопрос должно быть больше 2х символов</div>
    <div id="out">Страна:    <input name="country" value="" id="country"></div>
     <div class="error hide" id="country_error">Вопрос должно быть больше 2х символов</div>
    <div>        <input type="submit" value="Отправить"></div>

<script type="text/javascript">
    $(function () {
        var form = $("#user_form");
        form.on('submit', onSubmit);
        function onSubmit(event) {
            var f_name = $('#first_name');
            var l_name = $('#last_name');
            var compan = $('#company');
            var cit = $('#city');
            var countr = $('#country');
            var valid = true;
            if (f_name.val().length <= 2) {
                valid = false;
                $('#first_name_error').removeClass('hide');
            } else {
                $('#first_name_error').addClass('hide');
            }
            if (l_name.val().length <= 2) {
                valid = false;
                $('#last_name_error').removeClass('hide');
            } else {
                $('#last_name_error').addClass('hide');
            }
            if (compan.val().length <= 2) {
                valid = false;
                $('#company_error').removeClass('hide');
            } else {
                $('#company_error').addClass('hide');
            }
            if (cit.val().length <= 2) {
                valid = false;
                $('#city_error').removeClass('hide');
            } else {
                $('#city_error').addClass('hide');
            }
            if (countr.val().length <= 2) {
                valid = false;
                $('#country_error').removeClass('hide');
            } else {
                $('#country_error').addClass('hide');
            }
            if (!valid) {
                event.preventDefault();
            }
        }
    });
</script>
</pre>
</form>

</body>
</html>
