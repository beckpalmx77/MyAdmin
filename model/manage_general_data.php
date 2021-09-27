<?php
session_start();
error_reporting(0);

include('../config/connect_db.php');
include('../config/lang.php');
include('../util/record_util.php');

if ($_POST["action"] === 'GET_COUNT_RECORDS') {
    $table_name = $_POST["table_name"];
    $return_arr = array();
    $sql_get = "SELECT count(*) as record_counts  FROM " . $table_name;
    $statement = $dbh->query($sql_get);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $result) {
        $record = $result['record_counts'];
    }
    echo $record;
}
