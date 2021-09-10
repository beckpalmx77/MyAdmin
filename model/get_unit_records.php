<?php
include('../config/connect_db.php');

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
    $searchQuery = " AND (unit_id LIKE :unit_id or
        unit_name LIKE :unit_name ) ";
    $searchArray = array(
        'unit_id' => "%$searchValue%",
        'unit_name' => "%$searchValue%",
    );
}

## Total number of records without filtering
$stmt = $dbh->prepare("SELECT COUNT(*) AS allcount FROM ims_unit ");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = $dbh->prepare("SELECT COUNT(*) AS allcount FROM ims_unit WHERE 1 " . $searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$stmt = $dbh->prepare("SELECT * FROM ims_unit WHERE 1 " . $searchQuery
    . " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT :limit,:offset");

// Bind values
foreach ($searchArray as $key => $search) {
    $stmt->bindValue(':' . $key, $search, PDO::PARAM_STR);
}

$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$stmt->execute();
$empRecords = $stmt->fetchAll();
$data = array();

foreach ($empRecords as $row) {

    $data[] = array(
        "id" => $row['id'],
        "unit_id" => $row['unit_id'],
        "unit_name" => $row['unit_name'],
        "status" => $row['status'],
        "select" => "<button type='button' name='select' id='" . $row['unit_id'] . "@" . $row['unit_name'] . "' class='btn btn-outline-success btn-xs select' data-toggle='tooltip' title='select'>select <i class='fa fa-check' aria-hidden='true'></i>
</button>",
    );

}

## Response Return Value
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);