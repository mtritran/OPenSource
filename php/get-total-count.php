<?php

include "config.php";

$sql = "SELECT COUNT(*) AS total FROM computer";
$run_sql = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($run_sql);
$total = $row['total'];

echo json_encode($total);

mysqli_close($conn);

?>
