<?php
session_start();
error_reporting(0);
include('config/connect_db.php');

if ($_SESSION['alogin'] != '') {
    $_SESSION['alogin'] = '';
}

//if (isset($_POST['login'])) {

//$username = "admin@myadmin.com";
//$password = md5("admin");

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM ims_user  WHERE email=:username and password=:password";
$query = $dbh->prepare($sql);
$query->bindParam(':username', $username, PDO::PARAM_STR);
$query->bindParam(':password', $password, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {

    foreach ($results as $result) {
        $_SESSION['alogin'] = $result->email;
        $_SESSION['login_id'] = $result->id;
        $_SESSION['username'] = $result->email;
        $_SESSION['first_name'] = $result->first_name;
        $_SESSION['last_name'] = $result->last_name;
        $_SESSION['email'] = $result->email;
        $_SESSION['account_type'] = $result->account_type;
        $_SESSION['user_picture'] = $result->picture;
        $_SESSION['lang'] = $result->lang;
        $_SESSION['system_name'] = "Inventory Management System";

    }
    echo 1;
} else {
    echo 0;
}

//}

?>