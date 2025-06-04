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
 if (isset($_GET['categoryid'])) {
    $categoryid = intval($_GET['categoryid']);
    $sql = "SELECT categorytable.*, coursetable.* 
    FROM coursetable 
    JOIN categorytable ON coursetable.categoryid = categorytable.categoryid 
    WHERE coursetable.categoryid = $categoryid";
    $result = mysqli_query($mysqli, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $courses=[];
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['categoryname']=$row['categoryname'];
            $courses[]=$row;
        }
        $category=$courses[0];?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>category</title>
  <link rel="stylesheet" href="categoryssss.css">
</head>
<body>
  <div class="maindiv">
    <div class="introdiv">
      <img class="caticon" src="list1.gif">
      <?php
       echo" <h1 style='padding-top:30px;'>".$category["categoryname"]."</h1>"?>
    </div>
    <?php
       echo "<img class='catimg'src='" . $category["categoryimage"] . "' alt='Category Image'>";?>

    <h2 style="margin-top:40px;">🧠Category Introduction</h2>
    <?php
    echo"<p class='content'>".$category["categoryintro"]."
      </p>";?>
    <h2>📚Category Description</h2>
    <?php
      echo"<p class='content'>".$category["categorydesc"]." </p>";?>
    <h2>📺Introduction Video</h2>
    <?php
      echo"<p class='content'>".$category["categoryvdodesc"]." </p>";
      if(!empty(["categoryvdo"])&file_exists($category["categoryvdo"])){
        echo "<video style='margin-top:20px;width:1200px;height:600px;object-fit:cover;' controls>
        <source src='".$category["categoryvdo"]. " ' type='video/mp4'>Your browswer does not support the video tag.</video>";
    }
    else{
        echo "<p style='color:red'>video not found</p>";
    }
        ?>
    <h2>📘Available Courses</h2>
    <?php foreach($courses as $course){?>
    <div class='course-list'>
      <ul>
        <li>
          <?php echo $course["coursename"];?>
        </li>
      </ul>
    </div>
    <?php }?>
    <h2>⛳Courses to visit...</h2>
    <div class="totaldiv1">
      <?php   
           foreach($courses as $course){?>
      <div class="images">
        <?php
      echo "<a href='/pkkpro/dummy.php?courseid={$course['courseid']}'>
        <img class='imgs' src=\"{$course['courseimage']}\" alt='Course Image'>
      </a>";
      ?>
        <h4 style="margin-left:50px;"> <a style="text-decoration:none;color:black;"
            href="/pkkpro/dummy.php?courseid=<?php echo $course['courseid'];?>">
            <?php echo $course['coursename'];?>
          </a> </h4>
        <p style='margin-top: 20px;margin-left: 10px;'>
          <?php echo "(".$course['catmaindesc'].")";?>
        </p>
      </div>
      <?php } ?>
    </div>
  </div>
  <?php
    }
    else{
        echo "No course is found";
    }
}
    else {
        ?>
  <div
    style="background-color:white; border-radius:20px;margin-top:30px;margin-left:250px;width:1000px;box-shadow: 0 4px 12px rgba(0,0,0,0.3);height:500px;margin-bottom:40px;"
    class="alert">
    <img src="rotate.gif" style="height:100px;margin-left:470px;padding-top:150px;width:100px;">
    <p style="font-weight:bold;font-family: Arial, Helvetica, sans-serif;margin-left:482px;padding-top:20px;">LOADING...
    </p>
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
</body>
<footer>
  <?php
  include("footer1.php");
  ?>
</footer>
</html>