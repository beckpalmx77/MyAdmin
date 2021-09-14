<?php

function LAST_ID_YEAR($dbh, $table, $field, $doc_year)
{
    $query_str = "select " . $field . " from " . $table
        . " where doc_year = " . $doc_year
        . " order by " . $field . " desc limit 1 ";
    $row = $dbh->query($query_str)->fetch();
    if (empty($row["0"])) {
        $ret_value = 1;
    } else {
        $ret_value = $row["0"] + 1;
    }
    return $ret_value;
}

function LAST_ID($dbh, $table, $field)
{
    $row = $dbh->query("select " . $field . " from " . $table . " order by " . $field . " desc limit 1 ")->fetch();
    if (empty($row["0"])) {
        $ret_value = 1;
    } else {
        $ret_value = $row["0"] + 1;
    }
    return $ret_value;
}