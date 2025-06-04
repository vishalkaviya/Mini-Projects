<?php

session_start();
include("db/config.php");
$firstname=$_SESSION['firstname'];
$dob=$_SESSION['dob'];
$gender=$_SESSION['gender'];
$id=$_SESSION['id'];
$mobilenumber=$_SESSION['mobilenumber'];
$email=$_SESSION['email'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="viewprofilesss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewprofile</title>
</head>
<body>
    <div class="maindiv">
    <div class="viewprof">
        <div class="viewprof1">
        <img src="pro6.jpg">
    <h3 class="name"><?php echo "Welcome $firstname!"?></h3>
        </div>
        <div class="viewprof2">
            <h2>User Profile</h2>
            <b><p>Name</p></b>
            <div class="username-box">
                <span id="username"><?php echo $firstname;?></span>
            </div>
           <b> <p>Email</p></b>
            <div class="username-box">
                <span id="username"><?php echo $email;?></span>
            </div>
           <b> <p>Contact  Number</p></b>
            <div class="username-box">
                <span id="username"><?php echo $mobilenumber;?></span>
            </div>
           <b> <p>Gender</p></b>
            <div class="username-box">
                <span id="username"><?php echo $gender;?></span>
            </div>
           <b> <p>D.O.B</p></b>
            <div class="username-box">
                <span id="username"><?php echo $dob;?></span>
            </div>
            
               <button onclick="Edit()" type="submit" name="submit" class="submit" >Edit Profile</button>
               <p style="margin-left:153px;margin-top:15px;"><b><a class="logoutanh" href="home.php">Log Out</a></b></p>
            </div>
</div>
<div class="imgdiv">
<div class="profile">We're Glad, you're here...Let's grow together !</div>
<button class="home-button" onclick="goHome()">Back<<</button>
</div>
</div>
    <script>
        function Edit()
        {
            window.location.href="updateprofile.php";
        }
    </script>

<script>
    function goHome() {
      
      window.location.href = "home.php";
    }
  </script>
</body>
</html>