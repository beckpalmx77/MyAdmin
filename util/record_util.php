<?php

function Last_ID($dbh, $table, $field)
{

    $last_record = 0;
    $stmt = $dbh->prepare("SELECT  " . $field . " AS last_record FROM " . $table . " ORDER BY " . $field . " DESC LIMIT 1");
    $stmt->execute();
    $empRecords = $stmt->fetchAll();
    foreach ($empRecords as $row) {
        $last_record = $row->last_record;
    }

    return $last_record;

}