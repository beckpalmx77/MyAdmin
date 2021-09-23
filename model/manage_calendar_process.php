<?php
session_start();
error_reporting(0);

include('../config/connect_db.php');
include('../config/lang.php');
include('../util/record_util.php');

if ($_POST["action"] === 'ADD') {
    if ($_POST["title"] !== '') {
        $title = $_POST["title"];
        $start_event = $_POST["date"];
        $end_event = $_POST["date"];

        $sql = "INSERT INTO ims_event(title,start_event,end_event) VALUES (:title,:start_event,:end_event)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':start_event', $start_event, PDO::PARAM_STR);
        $query->bindParam(':end_event', $end_event, PDO::PARAM_STR);
        $query->execute();

        $lastInsertId = $dbh->lastInsertId();

        if ($lastInsertId) {
            echo $save_success;
        } else {
            echo $error;
        }
    }
}


if ($_POST["action"] === 'GETEVENT') {
    if ($_POST["id"] !== '') {



    }
}