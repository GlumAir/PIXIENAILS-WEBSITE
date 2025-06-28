<?php
    session_start();
    include("dbconnection.php");

    if (!isset($_SESSION['login-attempt'])){
        $_SESSION['login-attempt'] = 0;
    }

    if (!isset($_SESSION['max-attempt'])){
         $_SESSION['max-attempt'] = 4;
    }



 if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $admin_email = $_POST['username/email'];
        $pass = $_POST['passlogin'];

        if(($admin_email = "Admin1" || $admin_email = "admin@gmail.com") && $pass == "password"){
            header("Location: ../PAGE/adminPanel.php");
            exit;
        }
 }







    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $username_email = $_POST['username/email'];
        $pass = $_POST['passlogin'];

        $stmt = $conn->prepare("SELECT * FROM pixiedust_user_tbl WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username_email, $username_email);
        $stmt->execute();
        $result = $stmt->get_result();



        if($result->num_rows > 0){
            $user = $result->fetch_assoc();

            if(password_verify($pass, $user['password'])){
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['firstname'];
                header("Location: ../PAGE/home.php");
                exit;
            }else {
                $_SESSION['login-error-msg'] = "INCORRECT PASSWORD";
                $_SESSION['login-attempt'] += 1;
                header("Location: ../PAGE/form.php");
                exit;
            }
        } else {
            $_SESSION['login-error-msg'] = "USER NOT FOUND";
            header("Location: ../PAGE/form.php");
            exit;
        }

        $stmt->close();
        $conn->close();
    }

?>