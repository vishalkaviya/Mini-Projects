<?php
include("db/config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "vendor/autoload.php";

session_start();
date_default_timezone_set('Asia/Kolkata');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    if (isset($_POST['email'], $_POST['password'], $_POST['categoryname'], $_POST['coursename'], $_POST['price'], $_POST['courseid'])) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $courseid = $_POST['courseid'];
        $categoryname = $_POST['categoryname'];
        $coursename = $_POST['coursename'];
        $price = $_POST['price'];
        $date = $_POST['date'];
        $time = $_POST['time'];

      
        $query = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
        $result = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $firstname = $row['firstname'];
            $_SESSION['id'] = $id;

           
            $insert = "INSERT INTO reservation (categoryname, coursename, price, firstname, id, courseid, date, time) 
                       VALUES ('$categoryname', '$coursename', '$price', '$firstname', '$id', '$courseid', '$date', '$time')";

            if (mysqli_query($mysqli, $insert)) {

              
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
                    $mail->addAddress($email, $firstname);
                    $mail->Subject = "Welcome to Learn Lock - Your Course is Ready!";
                    $mail->isHTML(true);

                    $courseUrl = "http://localhost/pkkpro/home.php";

                    $mail->Body = "
                        <p>Dear <b>$firstname</b>,</p>
                        <p>Congratulations! 🎉 You have successfully reserved the course <b>\"$coursename\"</b> on <b>$date</b>.</p>
                        <p>You can start watching your course now by visiting:<br><a href='$courseUrl'>$courseUrl</a></p>
                        <p>We are so happy to have you as a part of Learn Lock!</p>
                        <p><b>Best wishes,<br>LEARNLOCK TEAM</b></p>
                    ";

                    if ($mail->send()) {
                        header("Location: reserve.php?courseid=$courseid&msg=✅ Reservation successful and Email sent!");
                        exit();
                    } else {
                        echo "<h4 style='color:red; text-align:center;'>❌ Email not sent. Error: " . $mail->ErrorInfo . "</h4>";
                    }
                } catch (Exception $e) {
                    echo "<h4 style='color:red; text-align:center;'>❌ Email sending failed. Error: " . $mail->ErrorInfo . "</h4>";
                }

            } else {
                header("Location: reservation.php?courseid=$courseid&msg=❌ Reservation Failed.");
                exit();
            }
        } else {
            header("Location: regis.php?error=⚠️You're not registered yet. Create an account to access this course.");
            exit();
        }

    } else {
        die("Missing POST fields.");
    }

} else {
    die("Invalid request method.");
}
?>
