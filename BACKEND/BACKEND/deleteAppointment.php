<?php
    session_start();
    include("dbconnection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $userID = $_SESSION['user_id'];
        $appointment_id = $_POST['appointment-id'];

        if($appointment_id) {
            $stmt = $conn->prepare("DELETE FROM pixiedust_appointment_tbl WHERE appointment_id = ? AND user_id = ?");
            $stmt->bind_param("ii", $appointment_id, $userID);
            $stmt->execute();
            $stmt->close();

            $_SESSION['input-planner-msg'] = "success";
        }
        else {
            $_SESSION['input-planner-msg'] = "failed";
           
        }

        header("Location: ../PAGE/travelLogs.php");
        exit;
    }
    $conn->close();
?>