<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вод данных</title>
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
                    url: "test_input.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        first_name: first_name,
                        last_name: last_name,
                        company: company,
                        city: city,
                        country: country,
                    },
                    success: function (result) {
                        $('#Result').div(result);
                    }
                });
            }
        });
    </script>
</head>
<body><pre>
<form action="" method="post" id="user_form">
    <div id="out">Имя:       <input name="first_name" value="" id="first_name"></div>
    <div id="out">Фамилия:   <input name="last_name" value="" id="last_name"></div>
    <div id="out">Компания:  <input name="company" value="" id="company"></div>
    <div id="out">Город:     <input name="city" value="" id="city"></div>
    <div id="out">Страна:    <input name="country" value="" id="country"></div>
    <div>        <input type="submit" value="Отправить"></div>
    <?php include("Serv.php"); ?>
</pre>
</form>

</body>
</html>
