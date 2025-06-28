<?php
    session_start();
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    include("dbconnection.php");

    try {
         if($_SERVER["REQUEST_METHOD"] == "POST"){
            $userId = $_SESSION['user_id'];
            $services = $_POST['services'] ?? [];
            $addOns = $_POST['addOns'] ?? [];
            $appointment_date = $_POST['appointment_date'];
            $total_price = $_POST['total_price'];
            $admin_id = 1;

            if (!is_array($services)) {
                $services = [$services]; 
            }

            if (!is_array($addOns)) {
                $addOns = [$addOns]; 
            }

            $servicesList = implode(", ", $services);
            $addOnsList = implode(", ", $addOns);

            $stmt = $conn->prepare("INSERT INTO pixiedust_appointment_tbl (user_id, services, add_ons, total_price, appointment_date, admin_id) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssi", $userId, $servicesList, $addOnsList, $total_price, $appointment_date, $admin_id);
            $stmt->execute();
            
            $stmt->close();
            $_SESSION['input-planner-msg'] = 'success';
            header("Location: ../PAGE/travelPlanner.php");
            exit;
        }
    }
    catch (mysqli_sql_exception $e) {
        $_SESSION['input-planner-msg'] = 'failed';
        header("Location: ../PAGE/travelPlanner.php");
        exit;
    }

    $conn->close();
?>