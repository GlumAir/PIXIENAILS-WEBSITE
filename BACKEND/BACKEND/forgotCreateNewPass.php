<?php
    session_start();
    include("dbconnection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $new_pass = $_POST['new-pass'];
        $hashedPass = password_hash($new_pass, PASSWORD_DEFAULT);
        $user_email = $_SESSION['user-email'];

        $stmt = $conn->prepare("UPDATE pixiedust_user_tbl SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashedPass, $user_email);

        if($stmt->execute()) {
            $_SESSION['password-update'] = "PASSWORD CHANGE SUCCESSFULLY!";
            header("Location: ../PAGE/forgotPassword.php");
            exit;
        }
        else {
            $_SESSION['password-update'] = "AN ERROR OCCURED";
        }

        $stmt->close();
        $conn->close();
    }
?>