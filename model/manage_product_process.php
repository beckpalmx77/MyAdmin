<?php
session_start();
error_reporting(0);

include('../config/connect_db.php');
include('../config/lang.php');
include('../util/reorder_record.php');


if ($_POST["action"] === 'GETDATA') {

    $id = $_POST["id"];

    $return_arr = array();

    $sql_get = "SELECT * FROM ims_product WHERE id = " . $id;
    $statement = $dbh->query($sql_get);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $result) {
        $return_arr[] = array("id" => $result['id'],
            "product_id" => $result['product_id'],
            "name_t" => $result['name_t'],
            "quantity" => $result['quantity'],
            "unit_id" => $result['unit_id'],
            "status" => $result['status']);
    }

    echo json_encode($return_arr);

}

if ($_POST["action"] === 'SEARCH') {

    if ($_POST["product_id"] !== '') {

        $product_id = $_POST["product_id"];
        $sql_find = "SELECT * FROM ims_product WHERE product_id = '" . $product_id . "'";
        $nRows = $dbh->query($sql_find)->fetchColumn();
        if ($nRows > 0) {
            echo 2;
        } else {
            echo 1;
        }
    }
}

if ($_POST["action"] === 'ADD') {

    if ($_POST["product_id"] != '') {

        $product_id = $_POST["product_id"];
        $name_t = $_POST["name_t"];
        $quantity = $_POST["quantity"];
        $status = $_POST["status"];
        $unit_id = $_POST["unit_id"];
        $picture = "product-001.png";
        $sql_find = "SELECT * FROM ims_product WHERE product_id = '" . $product_id . "'";
        $nRows = $dbh->query($sql_find)->fetchColumn();
        if ($nRows > 0) {
            echo $dup;
        } else {
            $sql = "INSERT INTO ims_product(product_id,name_t,quantity,unit_id,picture,status)
            VALUES (:product_id,:name_t,:quantity,:unit_id,:picture,:status)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
            $query->bindParam(':name_t', $name_t, PDO::PARAM_STR);
            $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
            $query->bindParam(':unit_id', $unit_id, PDO::PARAM_STR);
            $query->bindParam(':picture', $picture, PDO::PARAM_STR);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
            $query->execute();

            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                echo $save_success;
            } else {
                echo $error;
            }

        }

    }
}


if ($_POST["action"] === 'UPDATE') {

    if ($_POST["product_id"] != '') {

        $id = $_POST["id"];
        $product_id = $_POST["product_id"];
        $name_t = $_POST["name_t"];
        $quantity = $_POST["quantity"];
        $status = $_POST["status"];
        $unit_id = $_POST["unit_id"];
        $picture = "product-001.png";
        $sql_find = "SELECT * FROM ims_product WHERE product_id = '" . $product_id . "'";
        $nRows = $dbh->query($sql_find)->fetchColumn();
        if ($nRows > 0) {
            $sql_update = "UPDATE ims_product SET name_t=:name_t,quantity=:quantity,status=:status,unit_id=:unit_id
            ,picture=:picture
            WHERE id = :id";
            $query = $dbh->prepare($sql_update);
            $query->bindParam(':name_t', $name_t, PDO::PARAM_STR);
            $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
            $query->bindParam(':unit_id', $unit_id, PDO::PARAM_STR);
            $query->bindParam(':picture', $picture, PDO::PARAM_STR);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            echo $save_success;
        }

    }
}

if ($_POST["action"] === 'DELETE') {

    $id = $_POST["id"];

    $sql_find = "SELECT * FROM ims_product WHERE id = " . $id;
    $nRows = $dbh->query($sql_find)->fetchColumn();
    if ($nRows > 0) {
        try {
            $sql = "DELETE FROM ims_product WHERE id = " . $id;
            $query = $dbh->prepare($sql);
            $query->execute();
            Reorder_Record($dbh, "ims_product");
            echo $del_success;
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}

