<?php
session_start();
error_reporting(0);

include('../config/connect_db.php');
include('../config/lang.php');
include('../util/reorder_record.php');


if ($_POST["action"] === 'GETDATA') {

    $id = $_POST["id"];

    $return_arr = array();

    $sql_get = "SELECT * FROM ims_unit WHERE id = " . $id;
    $statement = $dbh->query($sql_get);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $result) {
        $return_arr[] = array("id" => $result['id'],
            "unit_id" => $result['unit_id'],
            "unit_name" => $result['unit_name'],
            "status" => $result['status']);
    }

    echo json_encode($return_arr);

}

if ($_POST["action"] === 'SEARCH') {

    if ($_POST["unit_id"] !== '') {

        $unit_id = $_POST["unit_id"];
        $sql_find = "SELECT * FROM ims_unit WHERE unit_id = '" . $unit_id . "'";
        $nRows = $dbh->query($sql_find)->fetchColumn();
        if ($nRows > 0) {
            echo 2;
        } else {
            echo 1;
        }
    }
}

if ($_POST["action"] === 'ADD') {

    if ($_POST["unit_name"] != '') {
        $unit_id = $_POST["unit_id"];
        $unit_name = $_POST["unit_name"];
        $status = $_POST["status"];
        $sql_find = "SELECT * FROM ims_unit WHERE unit_name = '" . $unit_name . "'";
        $nRows = $dbh->query($sql_find)->fetchColumn();
        if ($nRows > 0) {
            echo $dup;
        } else {
            $sql = "INSERT INTO ims_unit(unit_id,unit_name,status)
            VALUES (:unit_id,:unit_name,:status)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':unit_id', $unit_id, PDO::PARAM_STR);
            $query->bindParam(':unit_name', $unit_name, PDO::PARAM_STR);
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

    if ($_POST["unit_name"] != '') {

        $id = $_POST["id"];
        $unit_id = $_POST["unit_id"];
        $unit_name = $_POST["unit_name"];
        $status = $_POST["status"];
        $sql_find = "SELECT * FROM ims_unit WHERE unit_id = '" . $unit_id . "'";
        $nRows = $dbh->query($sql_find)->fetchColumn();
        if ($nRows > 0) {
            $sql_update = "UPDATE ims_unit SET unit_id=:unit_id,unit_name=:unit_name,status=:status            
            WHERE id = :id";
            $query = $dbh->prepare($sql_update);
            $query->bindParam(':unit_id', $unit_id, PDO::PARAM_STR);
            $query->bindParam(':unit_name', $unit_name, PDO::PARAM_STR);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            echo $save_success;
        }

    }
}

if ($_POST["action"] === 'DELETE') {

    $id = $_POST["id"];

    $sql_find = "SELECT * FROM ims_unit WHERE id = " . $id;
    $nRows = $dbh->query($sql_find)->fetchColumn();
    if ($nRows > 0) {
        try {
            $sql = "DELETE FROM ims_unit WHERE id = " . $id;
            $query = $dbh->prepare($sql);
            $query->execute();
            Reorder_Record($dbh, "ims_unit");
            echo $del_success;
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}

