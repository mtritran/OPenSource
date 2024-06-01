<?php

include 'config.php';

$input = file_get_contents("php://input");
$decode = json_decode($input, true);

$brand = $decode["brand"];
$name = $decode["name"];
$price = $decode["price"];

$sql = "INSERT INTO computer (brand, name, price) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssd", $brand, $name, $price);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["success" => true, "message" => "Computer added successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Server problem"]);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
