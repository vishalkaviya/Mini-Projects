<header>
  <?php
  include "header1.php";
  ?>
</header>
<?php
 include("db/config.php");
 if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
 }
 if (isset($_GET['courseid'])) {
  $courseid = intval($_GET['courseid']);
    $sql = "SELECT * FROM coursetable WHERE courseid= $courseid" ;
    $result = mysqli_query($mysqli,$sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course</title>
  <link rel="stylesheet" href="coursesyyy.css">
</head>
<body>
  <div class="main">
    <div class="intro">
      <img class="icon" src="courseicon.gif">
      <?php
           echo
        "<h1 style='margin-top:15px;'>".$row["coursename"]."</h1>";
      ?>
    </div>
    <div class="section1">
      <?php
          echo "<img class='corimg'src='" . $row["courseimage"] . "' alt='Course Image'>";
          ?>
      <h3 style="color: #1a73e8;margin-top:20px;">🧠Introduction</h3>
      <?php
          echo"<p class='content'>".$row["courseintro"]."</p>";
          ?>
    </div>
    <div class="section1">
      <h3 style="color: #1a73e8;">📚Course Description</h3>
      <?php
          echo"<p class='content'>".$row["coursedesc"]."</p>";
          ?>
    </div>
    <div class="section1" style="line-height: 1.8;">
      <h3 style="color: #1a73e8;">📺Course Video</h3>
      <?php
          echo"<p class='content'>📝".$row["vdodesc"]."</p>";
          if(isset($_SESSION['id']))
          {
            $id=$_SESSION['id'];
            $res=mysqli_query($mysqli,"SELECT * FROM reservation WHERE id='$id' AND courseid='$courseid'");
            if(mysqli_num_rows($res)>0)
            {
              if(!empty($row["coursevdo"])&file_exists($row["coursevdo"]))
              {
                echo "<video style='margin-top:20px;width:900px;height:600px;object-fit:cover;' controls>
                <source src='".$row["coursevdo"]. " ' type='video/mp4'>Your browswer does not support the video tag.</video>";
      ?>
      <div class="amount">
        <?php
            echo"<p>Price:$".$row["price"]."</p>";
            ?>
      </div>
      <?php
          }
        else
        {
            echo "<p style='color:red'>video not found</p>";
        }
  }
   else{
        ?>
      <div class="video-locked">
        <p>📺This video is only available to enrolled students.Reserve the course by clicking the 'Buy Now'!.</p>
      </div>
      <div class="amount">
        <?php
            echo"<p>Price:$".$row["price"]."</p>";
            ?>
      </div>
      <div class="section1">
        <button class="pay-button"><a class="paya"
            href="/pkkpro/reservation.php?courseid=<?= urlencode($row['courseid']);?>">Buy Now!</a></button>
      </div>
      <?php
      }
    }
    else
    {
      echo"<div class='phrase'><p style='font-size:20px;margin-left:10px;margin-top:-100px;color:darkblue;'><b><a style='text-decoration:none;color:purple;font-size:40px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; href='login.php?courseid=$courseid'>Login!</a></b>  To reserve and watch the video.</p></div>";
     ?>
      <div class="amount">
        <?php
            echo"<p>Price:$".$row["price"]."</p>";
            ?>
      </div>
      <div class="section1">
        <button class="pay-button"><a class="paya"
            href="/pkkpro/reservation.php?courseid=<?= urlencode($row['courseid']);?>">Buy Now!</a></button>

      </div>
      <?php 
        }
      ?>
      <?php
   }
  }
    else{
        echo"No courses found";
    }
  }
  else {
    ?>
      <div
        style="background-color:white; border-radius:20px;margin-top:30px;margin-left:250px;width:1000px;box-shadow: 0 4px 12px rgba(0,0,0,0.3);height:500px;margin-bottom:40px;"
        class="alert">
        <img src="rotate.gif" style="height:100px;margin-left:470px;padding-top:150px;width:100px;">
        <p style="font-weight:bold;font-family: Arial, Helvetica, sans-serif;margin-left:482px;padding-top:20px;">
          LOADING...</p>
        <div style="display:flex;margin-top:20px;">
          <img src="stopwatch.gif" style="height:50px;width:50px;margin-left:350px;">
          <p
            style="color:black;font-weight:bold;font-size:25px;margin-left:5px;margin-top:5px;font-family: Arial, Helvetica, sans-serif;color:rgb(99, 1, 141);">
            Wait for a Moment... !</p>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
  </div>
</body>
<footer>
  <?php
    include("footer1.php");
  ?>
</footer>
</html>