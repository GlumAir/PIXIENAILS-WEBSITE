<?php

    session_start();
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    include("dbconnection.php");


      if($_SERVER["REQUEST_METHOD"] == "POST"){
            $appointment_id_php = $_POST['appointment_id'];
            $stmt = $conn->prepare("DELETE FROM pixiedust_appointment_tbl WHERE appointment_id = ?");
            $stmt->bind_param("i", $appointment_id_php);
            $stmt->execute();
            $stmt->close();

            header("Location: ../PAGE/adminPanel.php");
            exit;
      }
      $conn -> close();
