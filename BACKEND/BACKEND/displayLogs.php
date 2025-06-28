<?php
     include("dbconnection.php");

    $userID = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT appointment_id, services, add_ons, appointment_date, created_at, total_price FROM pixiedust_appointment_tbl WHERE user_id = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    $logs = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    $conn->close();
?>

<?php foreach($logs as $log) : ?>
     <!--SECTION 2-->
        <div class="container logs-container">
            <div class="info-details">
                <!--service LIST-->
                <div class="service-title">
                        <p style="font-style: italic; font-size: .7rem; margin: 1rem 0 0 0;">SERVICES AND ADD-ONS</p>
                        <p><?= nl2br(htmlspecialchars($log['services'])) ?></p>
                        <p style="color: #b6014c;"><?= nl2br(htmlspecialchars($log['add_ons'])) ?></p>
                </div>

                <div class="appointment-date">
                        <div class="icon"><img src="../ASSETS/icons/setDate.png" alt="icon"></div>
                        <span><?= date("F j, Y", strtotime($log['appointment_date'])) ?></span>

                </div>

                <div class="appointment-set">
                        <p>Booked on: <?= date("F j, Y", strtotime($log['created_at'])) ?></p>
                </div>

                <div class="service-total">
                        <div class="icon"><img src="../ASSETS/icons/wallet.png" alt="wallet"></div>
                        <span style="color: green"><?= htmlspecialchars($log['total_price']) ?></span>
                </div>

            </div>
        

            <div class="action-buttons">

                <form action="editAppointment.php" method="GET">
                        <input type="hidden" name="appointment-id" value="<?= htmlspecialchars($log['appointment_id'])  ?>">
                        <button style="background-color: green;">EDIT</button>
                </form>
                
                <form action="../BACKEND/deleteAppointment.php" method="POST">
                        <input type="hidden" name="appointment-id" value="<?= htmlspecialchars($log['appointment_id'])  ?>">
                        <button type="submit" style="background-color: red;" >CANCEL</button>
                </form>
                
                
            </div>

        </div>
        <!---->
<?php endforeach; ?>