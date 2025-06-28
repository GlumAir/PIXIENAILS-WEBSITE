<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $db_host = "127.0.0.1:3307";
    $db_user = "root";
    $db_pass = "";
    $db_name = "pixiedustdb";

    try {
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    } catch (mysqli_sql_exception $e) {
        echo ("Connection Failed: " . $e->getMessage());
    }
?>