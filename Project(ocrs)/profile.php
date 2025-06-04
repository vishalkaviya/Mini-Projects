<?php
session_start();

include("db/config.php");

if(isset($_POST['submit']))
{ 
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $id=$_SESSION['id'];
    $mobilenumber=$_SESSION['mobilenumber'];

     $query="UPDATE registration SET firstname='$firstname',lastname='$lastname',dob='$dob',gender='$gender' WHERE id='$id' ";
    $result=mysqli_query(mysql:$mysqli,query:$query);
       if($result)
        {
        
            $_SESSION['firstname']=$firstname;
            $_SESSION['dob']=$dob;
            $_SESSION['gender']=$gender;
            header("Location:profile.php?msg=✅saved sucessfully! login now!");
        }
        else{
            header("Location:profile.php?error=Something went wrong try again!");
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userprofile</title>
    <link rel="stylesheet" href="profilestyleyy.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
<div class="maindiv" >
    <div class="profilediv" >
   <div class="profilehead" >
    <img src="pro6.jpg">
    <h3 class="name">WELCOME!</h3>
    </div>
    <div class="profilefoot" style="margin-top: 10px;">
        <div class="proform" >
            <h3>USER PERSONAL</h3>
            <?php
            if(isset($_GET['msg'])){
                echo "<p style='margin-top:10px;color:green;font-size:15px;text-align:center;'>".$_GET['msg']."</p>";
            }
             if(isset($_GET['error'])){
        echo "<p style='margin-top:10px;color:green;font-size:15px;text-align:center;'>".$_GET['error']."</p>";
    }?>
            <form action="profile.php" method="POST">
            <tr>
            <td><label class="labelcls">First Name <sup>*</sup></td><br></label>
            <div class="input-container">
                <i class="fa-solid fa-circle-user"></i>
                <input autocomplete="off" name="firstname" type="text" placeholder="Enter your Name *"required>
            </div><br>
            <label class="labelcls"><td>Last Name <sup>*</sup><br></label>
                <td><div class="input-container">
                    <i class="fa-solid fa-circle-user"></i>
                    <input autocomplete="off" name="lastname" type="text" placeholder="Enter your Lastname *"required>
                </div><br>
                <label class="labelcls"><td>Date Of Birth <sup>*</sup></td><br></label>
                <td><div class="input-container">
                    
                    <input name="dob"type="date" id="dob">
                </div><br>
                <div class="input-container">
                    <td><label style="margin-left: 17px;">Gender <sup>*</sup></label><br>
                    <div class="radio-group">
                        <label>
                        <input  type="radio" name="gender" value="male"style="margin-left: 17px; margin-bottom:15px;"required><td>Male</label>
                        <label>
                            <input type="radio" name="gender" value="female"style="margin-bottom:15px;"required>Female</label>
                </div></div><br>
                   
                    
                    <tr><td></tr><input class="savein" type="submit" value="Save Changes" name="submit">
                            <b> <p class="logpropar"><a class="logproan" href="login.php">login</a></p>  </b>
                            </div><br>
                           
            </form>
        
    
</div>
<div class="imgdiv">
<div class="profile">We're Glad, you're here...Let's grow together !</div>
<button class="home-button" onclick="goHome()">Back<<</button>
</div>
</div>
<script>
    function goHome() {
     
      window.location.href = "home.php";
    }
  </script>

  
</body>
</html>