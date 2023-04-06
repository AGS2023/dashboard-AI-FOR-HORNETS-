<?php
    $level = rand(10, 100);
    header("Content-Type: application/json");
    echo json_encode(array("level" => $level));
?>
