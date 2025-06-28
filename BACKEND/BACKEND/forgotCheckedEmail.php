<?php
    session_start();

    include("dbconnection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $check_email = $_POST['check-email'];

        $stmt = $conn->prepare("SELECT * FROM pixiedust_user_tbl WHERE email = ?");
        $stmt->bind_param("s", $check_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $user = $result->fetch_assoc();

            $_SESSION['checked-email-result'] = "ok";
            $_SESSION['user-email'] = $user['email'];
            header("Location: ../PAGE/forgotPassword.php");
            exit;
        }
        else {
            $_SESSION['checked-email-result'] = "failed";
            header("Location: ../PAGE/forgotPassword.php");
            exit;
        }

        $stmt->close();
        $conn->close();
    }

?>