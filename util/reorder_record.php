<?php
//include('../config/connect_db.php');

function Reorder_Record($dbh,$table) {

    $stmt = $dbh->prepare("SELECT * FROM " . $table . " Order By id");
    $stmt->execute();
    $empRecords = $stmt->fetchAll();

    $loop = 1;

    foreach ($empRecords as $row) {
        //echo $row['id'] . " | " . $loop . "<br>";
        Update_Record($dbh, $table, $row['id'], $loop);
        $loop++;

    }

}
function Update_Record($dbh,$table,$id,$line_no) {
    $sql_update = "UPDATE ". $table . " SET line_no = " . $line_no . " WHERE id = " . $id;
    //echo $sql_update . " | " . $line_no . "<br>";
    $query = $dbh->prepare($sql_update);
    $query->execute();
}

