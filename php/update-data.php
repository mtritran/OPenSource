<?php

include "config.php";

$input = file_get_contents("php://input");
$decode = json_decode($input, true);

$id = $decode['id'];
$brand = $decode['brand'];
$name = $decode['name'];
$price = $decode['price'];

$sql = "UPDATE computer SET brand=?, name=?, price=? WHERE id=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssdi", $brand, $name, $price, $id);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["success" => true, "message" => "Computer updated successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Server problem"]);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
