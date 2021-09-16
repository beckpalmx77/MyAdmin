<?php
session_start();
error_reporting(0);

include('../config/connect_db.php');
include('../config/lang.php');
include('../util/record_util.php');


if ($_POST["action"] === 'GETDATA') {

    $id = $_POST["id"];

    $return_arr = array();

    $sql_get = "SELECT * FROM v_order_detail WHERE id = " . $id;
    $statement = $dbh->query($sql_get);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $result) {
        $return_arr[] = array("id" => $result['id'],
            "doc_no" => $result['doc_no'],
            "doc_date" => $result['doc_date'],
            "product_id" => $result['product_id'],
            "name_t" => $result['product_name'],
            "quantity" => $result['quantity'],
            "unit_id" => $result['unit_id'],
            "unit_name" => $result['unit_name']);
    }

    echo json_encode($return_arr);

}

if ($_POST["action"] === 'ADD') {
    if ($_POST["doc_date"] !== '') {
        $doc_no = "U-" . sprintf('%04s', LAST_ID($dbh, "v_order_detail", 'id'));
        $doc_date = $_POST["doc_date"];
        $status = $_POST["status"];
        $sql_find = "SELECT * FROM v_order_detail WHERE doc_date = '" . $doc_date . "'";
        $nRows = $dbh->query($sql_find)->fetchColumn();
        if ($nRows > 0) {
            echo $dup;
        } else {
            $sql = "INSERT INTO v_order_detail(doc_no,doc_date,status) VALUES (:doc_no,:doc_date,:status)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':doc_no', $doc_no, PDO::PARAM_STR);
            $query->bindParam(':doc_date', $doc_date, PDO::PARAM_STR);
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

    if ($_POST["doc_date"] != '') {

        $id = $_POST["id"];
        $doc_no = $_POST["doc_no"];
        $doc_date = $_POST["doc_date"];
        $status = $_POST["status"];
        $sql_find = "SELECT * FROM v_order_detail WHERE doc_no = '" . $doc_no . "'";
        $nRows = $dbh->query($sql_find)->fetchColumn();
        if ($nRows > 0) {
            $sql_update = "UPDATE v_order_detail SET doc_no=:doc_no,doc_date=:doc_date,status=:status            
            WHERE id = :id";
            $query = $dbh->prepare($sql_update);
            $query->bindParam(':doc_no', $doc_no, PDO::PARAM_STR);
            $query->bindParam(':doc_date', $doc_date, PDO::PARAM_STR);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            echo $save_success;
        }

    }
}

if ($_POST["action"] === 'DELETE') {

    $id = $_POST["id"];

    $sql_find = "SELECT * FROM v_order_detail WHERE id = " . $id;
    $nRows = $dbh->query($sql_find)->fetchColumn();
    if ($nRows > 0) {
        try {
            $sql = "DELETE FROM v_order_detail WHERE id = " . $id;
            $query = $dbh->prepare($sql);
            $query->execute();
            echo $del_success;
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}

if ($_POST["action"] === 'GETORDERDETAIL') {

    ## Read value
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $searchValue = $_POST['search']['value']; // Search value

    $searchArray = array();

## Search
    $searchQuery = " ";
    if ($searchValue != '') {
        $searchQuery = " AND (doc_no LIKE :doc_no or
        doc_date LIKE :doc_date ) ";
        $searchArray = array(
            'doc_no' => "%$searchValue%",
            'doc_date' => "%$searchValue%",
        );
    }

## Total number of records without filtering
    $stmt = $dbh->prepare("SELECT COUNT(*) AS allcount FROM v_order_detail WHERE DOC_NO = '" . $_POST["doc_no"] . "'");
    $stmt->execute();
    $records = $stmt->fetch();
    $totalRecords = $records['allcount'];

## Total number of records with filtering
    $stmt = $dbh->prepare("SELECT COUNT(*) AS allcount FROM v_order_detail WHERE DOC_NO = '" . $_POST["doc_no"] . "'");
    $stmt->execute();
    $records = $stmt->fetch();
    $totalRecordwithFilter = $records['allcount'];

## Fetch records
/*
    $stmt = $dbh->prepare("SELECT * FROM v_order_detail WHERE 1 " . $searchQuery
        . " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT :limit,:offset");
*/

// Bind values
/*
    foreach ($searchArray as $key => $search) {
        $stmt->bindValue(':' . $key, $search, PDO::PARAM_STR);
    }

    $stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
*/
    $query_str = "SELECT * FROM v_order_detail WHERE doc_no = '" . $_POST["doc_no"] . "'"
    . " ORDER BY line_no " ;

    $stmt = $dbh->prepare($query_str);
    $stmt->execute();
    $empRecords = $stmt->fetchAll();
    $data = array();

    foreach ($empRecords as $row) {

        if ($_POST['sub_action'] === "GETMASTER") {
            $data[] = array(
                "id" => $row['id'],
                "doc_no" => $row['doc_no'],
                "doc_date" => $row['doc_date'],
                "line_no" => $row['line_no'],
                "product_id" => $row['product_id'],
                "product_name" => $row['product_name'],
                "quantity" => $row['quantity'],
                "unit_id" => $row['unit_id'],
                "unit_name" => $row['unit_name'],
                "update" => "<button type='button' name='update' id='" . $row['id'] . "' class='btn btn-info btn-xs update' data-toggle='tooltip' title='Update'>Update</button>",
                "delete" => "<button type='button' name='delete' id='" . $row['id'] . "' class='btn btn-danger btn-xs delete' data-toggle='tooltip' title='Delete'>Delete</button>"
            );
        } else {
            $data[] = array(
                "id" => $row['id'],
                "doc_no" => $row['doc_no'],
                "doc_date" => $row['doc_date'],
                "select" => "<button type='button' name='select' id='" . $row['doc_no'] . "@" . $row['doc_date'] . "' class='btn btn-outline-success btn-xs select' data-toggle='tooltip' title='select'>select <i class='fa fa-check' aria-hidden='true'></i>
</button>",
            );
        }

    }

## Response Return Value
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
    $txt = $_POST["doc_no"];
    fwrite($myfile, $txt);
    fclose($myfile);

    echo json_encode($response);


}
