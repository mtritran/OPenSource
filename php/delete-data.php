<?php

include "config.php";

$id = $_GET["id"];
$sql = "DELETE FROM computer WHERE id=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["success" => true, "message" => "Computer deleted successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Server problem"]);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
