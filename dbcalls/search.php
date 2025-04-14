<?php
include("conn.php");

$searchResult = $_GET["searchresult"];

$test = '%' . $searchResult . '%';

$stmt = $conn->prepare("SELECT * FROM menuitems WHERE Productnaam LIKE :product;");
$stmt->bindParam(":product", $test);
$stmt->execute();

$result = $stmt->fetchAll();

var_dump($result);