<?php
session_start();
error_reporting(0);

include('../config/connect_db.php');
include('../config/lang.php');
include('../util/record_util.php');

if ($_POST["action"] === 'ADD') {
    if ($_POST["title"] !== '') {
        $title = $_POST["title"];
        $start = $_POST["date"];
        $end = $_POST["date"];

        $sql = "INSERT INTO ims_event(title,start,end) VALUES (:title,:start,:end)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':start', $start, PDO::PARAM_STR);
        $query->bindParam(':end', $end, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();

        if ($lastInsertId) {
            echo $save_success;
        } else {
            echo $error;
        }
    }
}