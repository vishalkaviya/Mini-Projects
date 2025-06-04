<?php
include("db/config.php");  
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <img src="adminbw.gif" style="height:70px;width:70px;margin-left:60px;border-radius:50%;">
        <h4 style="margin-left:65px;"><?php echo $_SESSION['firstname'];?></h4>
        <a href="#">Dashboard</a>
        <a href="userdetail.php">Users</a>
        <a href="admincategory.php">Categories</a>
        <a href="admincourse.php">Courses</a>
        <a href="feedback.php">Review</a>
        <a href="adminreserve.php">Reservations</a>
        <div class="backhome">
            <button><a href="home.php"style="text-decoration:none;color:white;margin-top:-2px;">Home</a></button>
        </div>
        <div class="logout">
            <button onclick="logout()">Logout</button>
        </div>
    </div>
    <div class="db">
    <h2 style=" margin-top: 10px;margin-left:250px;position:relative;">Dashboard</h2>   
    </div>    
    <br>
    <div class="content">
    <div class="dashboard1">
        <div class="card">
            <img src="users.webp" style="height:60px;">
            <h3> <a href="userdetail.php" style="text-decoration:none;color:black;">Users</a></h3>
            <?php
            $sql="SELECT * FROM registration";
            $result=mysqli_query($mysqli,$sql);
            $num=mysqli_num_rows($result);
            ?>
            <p id="userCount"><?php echo $num?></p>
        </div>
        <div class="card">
            <img src="newcat.png" style="height:60px;">
            <h3> <a href="admincategory.php" style="text-decoration:none;color:black;">Categories</a></h3>
            <?php
            $sql="SELECT * FROM categorytable";
            $result=mysqli_query($mysqli,$sql);
            $num=mysqli_num_rows($result);
            ?>
            <p id="userCount"><?php echo $num?></p>
        </div>
        <div class="card">
            <img src="course.jpg" style="height:60px; border-radius: 50px;">
            <h3><a href="admincourse.php"style="text-decoration:none;color:black;">Courses</a></h3>
            <?php
            $sql="SELECT * FROM coursetable";
            $result=mysqli_query($mysqli,$sql);
            $num=mysqli_num_rows($result);
            ?>
            <p id="userCount"><?php echo $num?></p>
        </div>
        <div class="card">
            <img src="rewimg.png" style="height:60px;">
            <h3><a href="feedback.php"style="text-decoration:none;color:black;">Review</a></h3>
            <?php
            $sql="SELECT * FROM contact";
            $result=mysqli_query($mysqli,$sql);
            $num=mysqli_num_rows($result);
            ?>
            <p id="userCount"><?php echo $num?></p>
        </div>
        <div class="card">
            <img src="reservations].jpeg" style="height:60px; border-radius: 50px;">
            <h3><a href="adminreserve.php"style="text-decoration:none;color:black;">Reservation</a></h3>
            <?php
            $sql="SELECT * FROM reservation";
            $result=mysqli_query($mysqli,$sql);
            $num=mysqli_num_rows($result);
            ?>
            <p id="userCount"><?php echo $num?></p>
        </div>
    </div>
    <div class="reminders">
        <h3 style="padding-top:20px;">Reminders</h3>
        <div class="white" style="height:80px;background-color: rgb(255, 255, 255);">
                <ol style="color:black;text-align: left;padding-top: 20px;">
                  <li>Update English courses</li>
                  <li>Need to remove unnecessary categories</li>
                </ol>
        </div>
    </div>
    <script>
        function logout() {
            alert("Logging out...");
            window.location.href = "home.php"; 
        }
    </script> 
    </div>
    </div>
</div>
</body>
</html>
