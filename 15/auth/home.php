<?php
top('Главная');
$arr = ['/' => 'Главная',
    'login' => 'Выход',
    'prof' => 'Профиль'];
$per_page = 5;
include ('guest/connect.php');
$sql = "select * from `ITEMS`";
$rsd = mysqli_query($mysqli, $sql);
$count = mysqli_num_rows($rsd);
$pages = ceil($count / $per_page)
?>
<script type="text/javascript">
    $(document).ready(function () {
        function Display_Load() {
            $("#loading").fadeIn(900, 0);
            $("#loading").html("<img src='../bigLoader.gif' />");
        }
        function Hide_Load() {
            $("#loading").fadeOut('slow');
        };

        $("#pagination li:first").css({'color': '#ffffff'}).css({'border': 'none'});
        Display_Load();
        $("#content").load("navigator", {page: 1}, Hide_Load());
        $("#pagination li").click(function () {
            Display_Load();
            $("#pagination li")
                .css({'border': 'solid #dddddd 1px'})
                .css({'color': '#000000'});

            $(this)
                .css({'color': '#ffffff'})
                .css({'border': 'none'});
            var pageNum = this.id;
            $("#content").load("navigator", {page: pageNum}, Hide_Load());
        });
    });
</script>
<?php
headers($arr);
?>
<div align="center">

    <div id="loading"></div>
    <div id="content"></div>
    <table>
        <tr>
            <td>
                <ul id="pagination">
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                        echo '<li id="' . $i . '">' . $i . '</li>';
                    }
                    ?>
                </ul>
            </td>
        </tr>
    </table>
</div>

<?php
bottom(); ?>
