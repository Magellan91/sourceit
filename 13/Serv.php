<?php
if (!empty($_POST['first_name'])&&!empty($_POST['last_name'])&&!empty($_POST['company'])&&!empty($_POST['city'])&&!empty($_POST['country'])) {
    $first_name = $last_name= $company=$city=$country = null;
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $company=$_POST['company'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $created=date('d.m.y');
    include('connect.php');
    $stmt = mysqli_prepare($mysqli, "INSERT INTO `supplliers` (first_name, last_name, company, city, country, created) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssssss', $first_name, $last_name, $company, $city, $country, $created);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);
    $true = ['success' => true];
    echo json_encode($true);
} else {
    $error = ['success' => false, 'errors' => ['question' => 'Field is empty']];
        echo json_encode($error);
}

?>
