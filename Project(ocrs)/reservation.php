<?php
include("db/config.php");
$time=date('H:i');
date_default_timezone_set('Asia/Kolkata'); 
session_start();
if(isset($_GET['courseid']))
{
    $courseid=$_GET['courseid'];
   
    $query="SELECT coursetable.courseid,coursetable.coursename,coursetable.price,coursetable.categoryid,categorytable.categoryname FROM coursetable JOIN categorytable ON coursetable.categoryid=categorytable.categoryid WHERE coursetable.courseid=$courseid";
    $result=mysqli_query($mysqli,$query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    die("Course not found.");
}
} else {
die("Course ID not set.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="reservationstyley.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <div class="container1">
        <h1 style="margin-left:35px;font-family: Arial, Helvetica, sans-serif;">RESERVATION</h1>
        <form method="POST" action="verify-reservation.php">
            <?php
              if(isset($_GET['msg'])){
              echo "<p style='margin-top:10px;color:green;font-size:15px;text-align:center;'>".$_GET['msg']."</p>";
             }?>
            <label><b>Email <sup>*</sup></b></label>
            <input type="email" name="email" placeholder="   Enter the Email" required>
            <label><b>Password <sup>*</sup></b></label>
            <div class="password-container">
                <input class="logput1" type="password" id="password" name="password" placeholder="   Enter Password  *">
                <span class="toggle-password">
                    <i class="fas fa-eye-slash" id="eye-icon" onclick="togglePassword()"></i>
                </span>
            </div>
            <label for="date"><b>Current Date</b></label>
            <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>">
            <label for="time"><b>Current Time</b></label>
            <input type="time" id="time" name="time" value="<?php echo  $time?>">
            <label><b>Courseid</b></label>
            <input value="<?php echo $row['courseid'];?>" type="text" name="courseid">
            <label><b>Category</b></label>
            <input value="<?php echo $row['categoryname'];?>" type="text" name="categoryname">
            <label><b>Cource</b></label>
            <input value="<?php echo $row['coursename'];?>" type="text" name="coursename">
            <label><b>Price</b></label>
            <input value="<?php echo $row['price'];?>" type="text" name="price">
            <button name="submit" type="submit">Reserve</button>
        </form>
    </div>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.getElementById("eye-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.add("fa-eye-slash");
                eyeIcon.classList.remove("fa-eye");

            }
        }
    </script>
</body>
</html>