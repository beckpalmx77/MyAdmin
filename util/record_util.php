<?php

function LAST_ID($dbh, $table, $field)
{
    $row = $dbh->query("select ". $field . " from " . $table . " order by id desc limit 1 ")->fetch();
    return $row["id"];
}