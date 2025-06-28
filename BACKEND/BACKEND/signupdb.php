<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    session_start();

    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include("dbconnection.php");
            $fname = trim($_POST['firstname']);
            $lname = trim($_POST['lastname']);
            $mname = trim($_POST['middlename']);
            $username = trim($_POST['username']);
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $cellnum = $_POST['cellnum'];

            $hasshedPass = password_hash($pass, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO pixiedust_user_tbl (username, email, password, firstname, middlename, lastname, phonenum) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $username, $email, $hasshedPass, $fname, $mname, $lname, $cellnum);
            $stmt->execute();
            $stmt->close();

            $conn->close();

            $_SESSION['registration_status_msg'] = "REGISTRATION SUCCESSFUL";
            $_SESSION['registration_status'] = "success";
            header("Location: ../PAGE/form.php");
            exit;
        }
    }
    catch (mysqli_sql_exception $e) {
        error_log("Database error: " . $e->getMessage());
        $conn->close();
        $_SESSION['registration_status_msg'] = "REGISTRATION FAILED. TRY AGAIN";
        $_SESSION['registration_status'] = "error";
        header("Location: ../PAGE/form.php");
        exit;
    }
?>