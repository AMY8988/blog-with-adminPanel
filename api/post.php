<?php
//for json-code
header("Content-Type: application/json; charset=UTF-8");

require "../core/functions.php";
require  "../core/base.php";


$sql = "SELECT * FROM `posts` WHERE 1";

if(isset($_GET['id'])){
    $id = textFilter($_GET['id']);
    $sql .= " AND id='$id' ";
}

if(isset($_GET['limit'])){
    $limit = textFilter($_GET['limit']);
    $sql .= " LIMIT $limit ";
}


$rows = [];
$query = mysqli_query(con(), $sql);

while ($row =mysqli_fetch_assoc($query)){
    $arr = [
        "id" => $row['id'],
        "title" => $row['title'],
        "description" => $row['description'],
        "category" => category($row['category_id'])['title']
    ];

    array_push($rows, $arr);
}

apiOutPut($rows);