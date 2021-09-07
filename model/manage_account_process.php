<?php
session_start();
error_reporting(0);

include('../config/connect_db.php');
include('../config/lang.php');
include('../util/reorder_record.php');


if ($_POST["action"] === 'GETDATA') {

    $id = $_POST["id"];

    $return_arr = array();

    $sql_get = "SELECT * FROM ims_user WHERE id = " . $id;
    $statement = $dbh->query($sql_get);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $result) {

        $return_arr[] = array("id" => $result['id'],
            "email" => $result['email'],
            "first_name" => $result['first_name'],
            "last_name" => $result['last_name'],
            "account_type" => $result['account_type'],
            "status" => $result['status']);
    }

    echo json_encode($return_arr);

}

if ($_POST["action"] === 'ADD') {

    if ($_POST["email"] !== '') {

        $email = $_POST["email"];
        $user_id = $_POST["email"];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $account_type = $_POST["account_type"];

        $picture = $account_type == 'admin' ? "img/icon/admin-001.png" : "img/icon/user-001.png";

        $status = "Active";

        $sql_find = "SELECT * FROM ims_user WHERE email = '" . $email . "'";

        $nRows = $dbh->query($sql_find)->fetchColumn();
        if ($nRows > 0) {
            echo 2;
        } else {
            $sql = "INSERT INTO ims_user(user_id,email,password,first_name,last_name,account_type,picture,status)
            VALUES (:user_id,:email,:password,:first_name,:last_name,:account_type,:picture,:status)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
            $query->bindParam(':account_type', $account_type, PDO::PARAM_STR);
            $query->bindParam(':picture', $picture, PDO::PARAM_STR);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
            $query->execute();

            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                Reorder_Record($dbh, "ims_user");
                echo 1;
            } else {
                echo 3;
            }
        }
    }
}


if ($_POST["action"] === 'UPDATE') {

    if ($_POST["email"] != '') {

        $id = $_POST["id"];
        $email = $_POST["email"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $status = $_POST["status"];
        $account_type = $_POST["account_type"];
        $picture = $account_type === 'admin' ? "img/icon/admin-001.png" : "img/icon/user-001.png";
        $sql_find = "SELECT * FROM ims_user WHERE email = '" . $email . "'";
        $nRows = $dbh->query($sql_find)->fetchColumn();
        if ($nRows > 0) {
            $sql_update = "UPDATE ims_user SET first_name=:first_name,last_name=:last_name,status=:status,account_type=:account_type
            ,picture=:picture
            WHERE id = :id";
            $query = $dbh->prepare($sql_update);
            $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
            $query->bindParam(':account_type', $account_type, PDO::PARAM_STR);
            $query->bindParam(':picture', $picture, PDO::PARAM_STR);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            echo $save_success;
        }
    } else {
        echo $error;
    }

}

if ($_POST["action"] === 'DELETE') {

    $id = $_POST["id"];

    $sql_find = "SELECT * FROM ims_user WHERE id = " . $id;
    $nRows = $dbh->query($sql_find)->fetchColumn();
    if ($nRows > 0) {
        try {
            $sql = "DELETE FROM ims_user WHERE id = " . $id;
            $query = $dbh->prepare($sql);
            $query->execute();
            Reorder_Record($dbh, "ims_user");
            echo $del_success;
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}


if ($_POST["action"] === 'CHG') {
    try {
        $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $id = $_POST["login_id"];
        $sql_update = "UPDATE ims_user SET password=:password WHERE id = :id";
        $query = $dbh->prepare($sql_update);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        echo 1;
    } catch (Exception $e) {
        echo 3;
    }


}





