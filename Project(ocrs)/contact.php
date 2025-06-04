<?php
include("db/config.php");
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $sql = "SELECT id FROM registration WHERE name='$name' AND email='$email'";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result)) {
        $user = mysqli_fetch_assoc($result);
        $userid = $user['id'];
        $sql1 = "INSERT INTO contact (name, email, message, id) VALUES ('$name', '$email', '$message', '$userid')";
        if (mysqli_query($mysqli, $sql1)) {
            header("Location: contact.php?msg=✅Feedback submitted successfully!");
        } else {
            header("Location: contact.php?error=⚠️Error submitting feedback.");
        }
    } else {
        header("Location: contact.php?error=⚠️You must be a registered user to submit feedback.");
    }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lock Learn</title>
    <link rel="stylesheet" href="stylecontactss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googlapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<header>
<?php
include("header1.php");?>
</header>
<body>
    <div class="contactus">
        <div class="design">
        <?php
            if(isset($_GET['msg'])){
                echo "<p style='color:green;font-size:18px;margin-left:220px;margin-top:10px;font-family:italic'>".$_GET['msg']."</p>";
        }?>
        <?php
             if(isset($_GET['error'])){
                 echo "<p style='color:red;font-size:18px;margin-left:220px;margin-top:10px;font-family:italic'>".$_GET['error']."</p>";
        }?>
        <div class="design0"></div>
        <div class="design1">
            <form method="POST">
                <div class="feedback">
                    <center>
                        <h1 style="color:white;">Let's Get In Touch!</h1>
                        <p style="color:white;"><b>Fill in the form below and I'll get back to you soon</b></p>
                        <div class="input-container">
                            <i class="fa-solid fa-circle-user"></i>
                            <input autocomplete="off" type="text" name='name' class="name" placeholder="Name "
                                    required>
                        </div>
                        <div class="input-container">
                            <i class="fa-solid fa-envelope-open-text"></i>
                            <input autocomplete="off" class="email" type="email" name="email" placeholder="Email"
                                    required>
                        </div>
                        <div class="input-container">
                            <i class="fa-brands fa-signal-messenger"></i>
                            <textarea class="message" name="message" placeholder="       Message" class="message"
                                    required></textarea>
                        </div>
                        <input type="submit" value="Send Message" name="submit" class="msg">
                    </center>
                </div>
            </form>
        </div>
    </div>
    <div class="contact">
        <img src="cntact2.jfif">
    </div>
    <div class="msglogo">
        <img src="msgimg1.jfif">
    </div>
    </div>
    <div class="detail">
        <h1 style="margin-left:60%;color: rgb(55, 55, 163);">contact us</h1>
        <div class="conttt">
            <div class="contimg">
                <img src="addres.jfif">
            </div>
            <div class="contcontent">
                <div class="connn">
                    <img src="contactimage.jfif">
                </div>
                <h3 style="color:rgb(55, 55, 163)">Support & Assistance</h3>
                <h4 style="margin-top: 15px;">Our team is available to assist you with:</h4>
                <p style="margin-top: 15px;">1.Course reservation & enrollment</p>
                <p style="margin-top: 15px;">2.Technical Support</p>
                <p style="margin-top: 15px;">3.General Qustions</p>
            </div>
        </div>
    </div>
    <div class="location">
        <div class="mail">
            <h2 style="margin-top:70px;margin-left:120px;color:rgb(43, 43, 136);">Email</h2>
            <p style="margin-left:70px;margin-top: 10px;color:rgb(43, 43, 136);">learnlock@gmail.com</p>
        </div>
        <div class="call">
            <h2 style="margin-top:70px;margin-left:70px;color:rgb(43, 43, 136);">Phone Number</h2>
            <p style="margin-left:90px;margin-top: 10px;color:rgb(43, 43, 136);">+91 8423450049</p>
        </div>
        <div class="clock">
            <h2 style="margin-top:70px;margin-left:70px;color:rgb(43, 43, 136);">Working Hours</h2>
            <p style="margin-left:100px;margin-top: 10px;color:rgb(43, 43, 136);">24/7 Hours</p>
        </div>
        <div class="loc">
            <h2 style="margin-top:75px;margin-left:100px;color:rgb(43, 43, 136);">location</h2>
            <p style="margin-left:80px;margin-top: 10px;color:rgb(43, 43, 136);">Sengipatti,Thanjavur.</p>
        </div>
    </div>
</body>
<footer>
<?php
include("footer1.php");
?>
</footer>
</html>