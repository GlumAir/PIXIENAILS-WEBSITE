<?php
session_start();
include("../BACKEND/dbconnection.php");

// Fetch all appointments with user emails
$sql = "
    SELECT 
        a.appointment_id,
        a.user_id,
        u.email,
        a.services,
        a.add_ons,
        a.appointment_date,
        a.total_price
    FROM pixiedust_appointment_tbl a
    JOIN pixiedust_user_tbl u ON a.user_id = u.user_id
    ORDER BY a.appointment_date ASC";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="icon" type="image/x-icon" href="../ASSETS/logo/pixienailsLogo.png">
    <link rel="stylesheet" href="../CSS/adminPanel.css">
</head>
<body>


     <!--NAVICATION/HEADER-->
    <div class="header">
         <div class="container header-content">

                <button class="nav-button" onclick="window.location.href='../BACKEND/logout.php'">
                    <img src="../ASSETS/icons/log-out-icon-white.png" alt="log out" >
                    LOG OUT
                </button>
            </div>
        </div>
    </div>
    <!---->


   <!--admin table-->
   <div class="container admin-panel">
        <!--TITLE-->
        <div class="admin-panel-title">
            <p>ADMIN PANEL</p>
        </div>
        <!---->

        <!--ADMIN TABLE-->
        


        <table class="admin-panel-table">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Services and Add-Ons</th>
                    <th>Appointment Date</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                        
                            <td name="appointment_id"><?= htmlspecialchars($row['appointment_id']) ?></td>
                            <td><?= htmlspecialchars($row['user_id']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['services'] . ', ' . $row['add_ons']) ?></td>
                            <td><?= htmlspecialchars($row['appointment_date']) ?></td>
                            <td><?= htmlspecialchars($row['total_price']) ?></td>
                            <td>
                           <form action="../BACKEND/admin_Auth.php" method="POST">
                                <input type="hidden" name="appointment_id" value="<?= $row['appointment_id'] ?>">
                                <button type="submit" id="completed-button">SERVICE COMPLETED</button>
                            </form>
                            </td>
                            
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align:center;">No appointments found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <!---->
   </div>
</body>
</html>