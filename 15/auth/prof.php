<?php
top('Профиль');
$arr = ['/' => 'Главная',
    'login' => 'Выход',
    'prof' => 'Профиль']; ?>
<script type="text/javascript">
    $(function () {
        $('#user_form').on('submit', function (e) {
            e.preventDefault();
            var $that = $(this),
                formData = new FormData($that.get(0));
            formData.append('date_upl', new Date());
            $.ajax({
                url: 'auth/Serv.php',
                type: $that.attr('method'),
                contentType: false,
                processData: false,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    $('#title').val('');
                    $('#description').val('');
                    $('#price').val('');
                    $('#error_serv').text(data);
                }
            });
        });
    });
</script>
<?php
headers($arr);
?>
<pre>
    <div class="register">
<form action="" method="post" enctype="multipart/form-data" id="user_form">
    <p id="error_serv"></p>
    <select name="compani">
    <?php include 'guest/connect.php';
    $res = mysqli_query($mysqli, "SELECT  `company`, `supplliers_id` FROM `Supplliers` WHERE 1");
    while ($row = mysqli_fetch_array($res)) {
     echo "    <option value='$row[1]'> $row[0] </option>";
    }
    ?>
    </select>
    <div id="out">Название:       <input class="error hide" placeholder="Название"  name="title" value="" id="title"></div>
    <div id="out">Описание:       <input class="error hide" placeholder="Описание"  name="description" value="" id="description"></div>
    <div id="out">Цена:           <input class="error hide" placeholder="Цена"  name="price" value="" id="price"></div>
    <div id="out">        Загрузить:      <input type="file" name="up" id="up"> </div>
    <div>   <input type="submit" value="Отправить" class="dws-submit"></div>
<script type="text/javascript">
    $(function () {
        var form = $("#user_form");
        form.on('submit', onSubmit);
        function onSubmit(event) {
            var f_title = $('#title');
            var l_description = $('#description');
            var c_price = $('#price');
            var valid = true;
            if (f_title.val().length <= 2) {
                valid = false;
                $('#title').removeClass('hide');
            } else {
                $('#title').addClass('hide');
            }
            if (l_description.val().length <= 2) {
                valid = false;
                $('#description').removeClass('hide');
            } else {
                $('#description').addClass('hide');
            }
            if (c_price.val().length <= 2) {
                valid = false;
                $('#price').removeClass('hide');
            } else {
                $('#price').addClass('hide');
            }
            if (!valid) {
                event.preventDefault();
            }
        }
    });
</script>
</form>
    </div>
</pre>
<?php
bottom(); ?>
