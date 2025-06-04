<?php
session_start();
include("db/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Lock</title>
    <link rel="stylesheet" href="headfootstylesss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googlapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<div class="header">
<nav class="signinrow">
    <nav class="logo">
        <img src="lock.jpg.jpg" height="60px" width="60px" style="border-radius: 50%; margin-right:0px;">
        <h2 style="font-family: 'Times New Roman', Times, serif; margin-top:15px; color:rgb(252, 207, 6)">Learn
            Lock!</h2>
    </nav>
    <form method="GET">
    <div class="search-container">
        <input id="searchInput" class="search-input" type="text" name="search"value="<?php if(isset($_GET['search'])){
            echo $_GET['search']; } ?>"placeholder="   What would you like to focus on today?">
        <button id="searchBtn" class="searchbutton"type="submit"><img class="searchimage" src="searchicon.png"></button>
    </div>
        </form>
        <?php
        if(isset($_GET['search']))
        {   
            $filtervalue=strtolower(trim($_GET['search']));
            $filtervalue = mysqli_real_escape_string($mysqli, $filtervalue);
           $filterdata="SELECT * FROM coursetable WHERE LOWER(coursename) LIKE'%$filtervalue%'";
            $filterdata_run=mysqli_query($mysqli,$filterdata);
            $count=mysqli_num_rows($filterdata_run);
            
            if ($count > 0) {
                $_SESSION['filtervalue']=$filtervalue;
                
               
                ?>
                <div id="dropdownBox1" class="dropdown-content1">
                    <?php
                    while ($row=mysqli_fetch_assoc($filterdata_run)) {
                        
                        ?>
                       <p class="ddc1">
                       <a style="text-decoration:none;color:purple;"href="/pkkpro/dummy.php?courseid=<?php echo $row['courseid'];?>"><?php echo $row['coursename'];?></a>
                                                   </p>
                        <?php
                    }
                    ?>
                </div>
                <?php
            } else {
               
                ?>
                <div id="dropdownBox1" class="dropdown-content1">
                <p style="color:purple;" class="ddc1">No Record Found</p>
                </div>
                <?php
            }
        }
        ?>
        <script>
function selectCourse(courseName) {
document.getElementById("searchInput").value = courseName;
document.getElementById("searchBtn").click(); 
}
</script>
    <p class="headmrl"><a style="color: black;text-decoration: none;" href="mtk.php">More to Know ! |</a></p>
    <p class="headmrl"><a style="color: black;text-decoration: none;" href="review.php">Review |</p>
    <?php if(isset($_SESSION['id'])){?>
        <p class="logout"><b><a href="logout.php" style="text-decoration:none;color:rgb(73, 16, 50);"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log Out</a></b></p>
            <div class="userprof">
            <i class="fa-solid fa-circle-user"></i>
            <p class="usename"><a  style="text-decoration:none;color:white;margin-top:10px;"href="viewprofile.php"><?= $_SESSION['firstname']?></a></p>
    </div>
        
    <?php }else {?>
        <p class="headmrl"><b><a style="text-decoration: none;color:rgb(73, 16, 50) ;" href="login.php"><i class="fas fa-sign-in-alt "></i>  LogIn</a></b></p>
        <button class="sig"> <a style="text-decoration: none; color: black;" href="regis.php"> Sign In</a></button>
    <?php }?>
</nav>

</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
const dropdown = document.getElementById("dropdownBox1");
const searchInput = document.getElementById("searchInput");

if (dropdown && searchInput.value.trim() !== "") {
dropdown.style.display = "block";
}

document.addEventListener("click", function (event) {
if (!event.target.closest(".search-container") && !event.target.closest(".dropdown-content1")) {
  if (dropdown) dropdown.style.display = "none";
}
});
});
</script>
<div class="menu">

<h3><a style="text-decoration: none;color: black;" href="home.php">Home </a></h3>
<button class="dropdown-btn" onclick="toggleDropdown()">Explore Courses</button>
<div id="dropdownBox" class="dropdown-content">
    <p class="ddc"><a href="#targetDiv" style="text-decoration:none;">Tech&IT</a></p>
    <p class="ddc"><a href="#targetDiv" style="text-decoration:none;">Health</a></p>
    <p class="ddc"><a href="#targetDiv" style="text-decoration:none;">Business</a></p>
    <p class="ddc"><a href="#targetDiv" style="text-decoration:none;">Management</a></p>
    <p class="ddc"><a href="#targetDiv" style="text-decoration:none;">Space Sience</a></p>
    <p class="ddc"><a href="#targetDiv" style="text-decoration:none;">Personal Development</a></p>
    <p class="ddc"><a href="#targetDiv" style="text-decoration:none;">Engineering Construction</a></p>
    <p class="ddc"><a href="#targetDiv" style="text-decoration:none;">English</a></p>
</div>
    
<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdownBox");
        dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
    }
    document.addEventListener("click", function (event) {
        var dropdown = document.getElementById("dropdownBox");
        var button = document.querySelector(".dropdown-btn");

        if (dropdown.style.display === "block" && event.target !== dropdown && event.target !== button) {
            dropdown.style.display = "none";
        }
    });
</script>
<h3><a style="text-decoration: none;color: black;" href="help.php"> Help</a></h3>
<h3><a style="text-decoration: none;color: black;" href="aboutus.php">About Us</a></h3>
<h3><a style="text-decoration: none;color: black;" href="contact.php">Contact Us</a></h3>
<img class="pic" src="sidelogo.jpeg" height="60px" width="80px">

</div>


</html>