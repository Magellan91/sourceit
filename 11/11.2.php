<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вод данных</title>
    <link href="style.css" rel="stylesheet">
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <style type="text/css">
        .error {
    color: red;
}
        .hide {
    display: none;
    /*visibility: hidden;*/
}
    </style>
    <script type="text/javascript">
        $(function () {
            var form = $("#user_form");
            form.on('submit', onSubmit);
            function onSubmit(event) {
                event.preventDefault();
                var question = $("#question").val();
                var answer = $("#answer").val();
                var kat = $("#kat").val();
                $.ajax({
                    url: "test_input.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        question:question,
                        answer:answer,
                        kat:kat,
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });
            }
        });
    </script>
</head>
<body><pre>
<form action="" method="post" id="user_form">
    <div><select name='kat' id="kat">
        <option value='ko'>Категория 1</option>
        <option value='kt'>Категория 2</option>
    </select>
        <?php include("test_input.php"); ?>
</div>
<div>Вопрос: <input type="text" name="question" value="" id="question">
    <div class="error hide" id="question_error">Вопрос должно быть больше 2х символов</div>
</div>
<div>Ответ:  <input type="text" name="answer" value="" id="answer">
    <div class="error hide" id="answer_error">Ответ должна быть больше 2х символов</div>
</div>
<div>        <input type="submit" value="Отправить"></div>
</pre>
</form>
</body>
</html>