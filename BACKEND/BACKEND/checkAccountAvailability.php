<?php
    header("Content-Type: application/json");
    include("dbconnection.php");

    $data = json_decode(file_get_contents("php://input"), true);
    $response = [
        "emailExist" => false,
        "usernameExist" => false
    ];

    if (isset($data['email'])) {
        $email = $data['email'];
        $stmt = $conn->prepare("SELECT user_id FROM pixiedust_user_tbl WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $response['emailExist'] = $stmt->num_rows > 0;
        $stmt->close();
    }

    if (isset($data['username'])) {
        $username = $data['username'];
        $stmt = $conn->prepare("SELECT user_id FROM pixiedust_user_tbl WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $response['usernameExist'] = $stmt->num_rows > 0;
        $stmt->close();
    }

    echo json_encode($response);

    $conn->close();
?>