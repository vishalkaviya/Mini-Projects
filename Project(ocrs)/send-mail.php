<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "vendor/autoload.php";

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'kpkdatabase');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservationid = $_POST['reservationid']; // Reservation ID input from the form

    // Fetch the reservation details for the given reservation ID
    $stmt1 = $conn->prepare("
        SELECT reservationid, coursename, date 
        FROM reservation 
        WHERE id = ?
    ");
    $stmt1->bind_param("i", $reservationid); 
    $stmt1->execute();
    $stmt1->bind_result($user_id, $coursename, $date);
    $stmt1->fetch();
    $stmt1->close();

    if (!$reservationid || !$coursename || !$date) {
        echo "<h2 style='color:red; text-align:center;'>❌ No matching reservation found for Reservation ID ($reservationid).</h2>";
        exit();
    }

    // Now fetch the email and name from registration based on the user_id
    $stmt2 = $conn->prepare("
        SELECT email, name 
        FROM registration 
        WHERE id = ?
    ");
    $stmt2->bind_param("i", $reservationid);
    $stmt2->execute();
    $stmt2->bind_result($email, $name);
    $stmt2->fetch();
    $stmt2->close();

    if (!$email || !$name) {
        echo "<h2 style='color:red; text-align:center;'>❌ No email or name found for the reservation ID ($reservationid).</h2>";
        exit();
    }

    $courseUrl = "http://localhost/pkkpro/home.php"; // Static URL for course page

    // Start PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "kpkproject09@gmail.com"; 
        $mail->Password = "anfy zcox uxyn spuc"; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom("kpkproject09@gmail.com", "LEARNLOCK TEAM");
        $mail->addAddress($email, $name);
        $mail->Subject = "Welcome to Learn Lock - Your Course is Ready!";
        $mail->isHTML(true);

        $mail->Body = "
            <p>Dear <b>$name</b>,</p>
            <p>Congratulations! 🎉 You have successfully reserved the course <b>\"$coursename\"</b> on <b>$date</b>.</p>
            <p>You can start watching your course now by visiting:<br><a href='$courseUrl'>$courseUrl</a></p>
            <p>We are so happy to have you as a part of Learn Lock!</p>
            <p><b>Best wishes,<br>LEARNLOCK TEAM</b></p>
        ";

        if ($mail->send()) {
            echo "<h4 style='color:green; text-align:center;'>✅ Email sent successfully to $name! ($email)</h4>";
        } else {
            echo "<h4 style='color:red; text-align:center;'>❌ Email could not be sent. Error: " . $mail->ErrorInfo . "</h4>";
        }
    } catch (Exception $e) {
        echo "<h4 style='color:red; text-align:center;'>❌ Email could not be sent. Error: " . $mail->ErrorInfo . "</h4>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Send Course Email</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }
        .form-container {
            background: rgb(237, 163, 114);
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
            width: 400px;
            margin-right: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Send Course Email</h2>
    <form method="POST" action="">
        <label for="reservationid">Reservation ID</label>
        <input type="number" id="reservationid" name="reservationid" placeholder="Enter Reservation ID" required>

        <input type="submit" class="btn" value="Send Email">
    </form>
</div>

</body>
</html>
