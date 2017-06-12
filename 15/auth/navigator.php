<?php
$per_page = 5;

if ($_POST) {
    $page = $_POST['page'];
}
include ('guest/connect.php');
$start = ($page - 1) * $per_page;
$rsd = mysqli_query($mysqli, "SELECT * FROM `ITEMS` ORDER BY `items_id` limit $start,$per_page");
?>

<table>

    <?php
    while ($row = mysqli_fetch_array($rsd)) {

        $id = $row['items_id'];
        $msg = $row['title'];
        $description = $row['description'];
        $cost=$row['price'];

        ?>
        <tr>
            <td style="color:#B2b2b2; padding-left:4px" width="30px"><?php echo $id; ?></td>
            <td style="color:#000000; padding-left:4px" width="220px">  <?php echo $msg; ?>   </td>
            <td style="color:#202020; padding-left:4px" width="520px">  <?php echo $description; ?>   </td>
            <td style="color:#ff64bf; padding-left:4px" width="30px">  <?php echo $cost; ?>  </td>
        </tr>
        <?php
    } //while
    ?>
</table>

