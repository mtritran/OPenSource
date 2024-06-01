<?php

include "config.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "SELECT * FROM computer WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $output = [];
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $output[] = $row;
        }
    } else {
        $output["empty"] = "empty";
    }
    echo json_encode($output);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
