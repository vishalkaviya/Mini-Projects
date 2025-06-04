<?php
session_start();
include("db/config.php");
$firstname=$_SESSION['firstname'];
$nameError = "";
$emailError = "";
$passwordError = "";
$mobilenumberError = "";
$admin_email = "learnlockkpk@gmail.com";
$admin_password="Kpk@2004";


if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"]; 
    $password = $_POST["password"];
    $mobilenumber = $_POST["mobilenumber"];
    $oldpassword = $_POST["oldpassword"];
    
    if (empty($name)) {
        $nameError = "User Name is Required *";
    } else {
        $upper = $lower = $space = $underscore = $digit = $length = $period = $strwp = $strwu = false;
        $n = strlen($name);
        if ($n >= 3 && $n <= 30) {
            $length = true;
        }
        for ($j = 0; $j < $n; $j++) {
            $ascii = ord($name[$j]);
            if ($ascii >= 65 && $ascii <= 90) {
                $upper = true;
            } else if ($ascii >= 97 && $ascii <= 122) {
                $lower = true;
            } else if ($ascii >= 48 && $ascii <= 57) {
                $digit = true;
            } else if ($ascii == 32) {
                $space = true;
            } else if ($ascii == 95) {
                $underscore = true;
            } else if ($ascii == 46) {
                $period = true;
            }
        }
        if ($name[0] == '.' || $name[0] == '_') {
            $strwp = true;
        }

        if (!$length || $strwp) {
            $nameError = "⚠️Invalid Username!";
        }
    }
    if (empty($email)) {
        $emailError = "Email is Required *";
    } else {
        if (substr_count($email, '@') != 1) {
            $emailError = "⚠️Invalid email!";
        } else if (!preg_match("/^[a-zA-Z0-9]/", $email)) {
            $emailError = "⚠️Invalid Email!";
        } else if (!preg_match("/\.[a-zA-Z]{2,}$/", $email)) {
            $emailError = "⚠️Invalid Email!";
        }
    }
    if (empty($password)) {
        $passwordError = "Password is Required *";
    } else {
        $upper1 = $lower1 = $digit1 = $length1 = $special1 = false;
        $m = strlen($password);

        if ($m >= 8) {
            $length1 = true;
        }
        for ($j = 0; $j < $m; $j++) {
            $ascii = ord($password[$j]);

            if ($ascii >= 65 && $ascii <= 90) {
                $upper1 = true;
            } else if ($ascii >= 97 && $ascii <= 122) {
                $lower1 = true;
            } else if ($ascii >= 48 && $ascii <= 57) {
                $digit1 = true;
            } else if ((33 <= $ascii && $ascii <= 47) || (58 <= $ascii && $ascii <= 64) || (123 <= $ascii && $ascii <= 126)) {
                $special1 = true;
            }
        }
        if (!$upper1 || !$lower1 || !$digit1 || !$length1 || !$special1) {
            $passwordError = "⚠️Invalid Password!";
        }
    }
    if (empty($mobilenumber)) {
        $mobilenumberError = "Mobile Number is Required *";
    } else {
        $len = strlen($mobilenumber);
        if ($len != 10) {
            $mobilenumberError = "⚠️Invalid Mobile Number!";
        }
    }
    if((empty($nameError))&&(empty($passwordError))&&(empty($emailError))&&(empty($mobilenumberError)))
    {
        $sql = "SELECT password FROM registration WHERE password='$oldpassword' ";
        $result = mysqli_query($mysqli, $sql);  
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result); 
            echo $row['password'];
            
            if ( $row['password'] === $oldpassword) {

   
    
     $query="UPDATE registration SET name='$name',email='$email',password='$password',mobilenumber='$mobilenumber' WHERE id='$id' ";
    $result=mysqli_query(mysql:$mysqli,query:$query);
       if($result)
        {
        
            $_SESSION['name']=$name;
            $_SESSION['email']=$email;
            $_SESSION['mobilenumber']=$mobilenumber;
            header("Location:updateprofile.php?msg=✅updated Sucessfully!");
        }
        else{
            header("Location:updateprofile.php?error=Something went wrong try again!");
        }
            }
        }
        else{
            header("Location:updateprofile.php?error=Incorrect Password!");
        }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upuserprofile</title>
    <link rel="stylesheet" href="upprostyleyy.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <div class="maindiv">
    <div class="profilediv" >
   <div class="profilehead" >
    <img src="pro6.jpg">
    <h3 class="name"><?php echo "Welcome $firstname!";?> </h3>
    </div>
    <div class="profilefoot" style="margin-top: 10px;">
        <div class="proform" >
            <h3>EDIT PROFILE</h3>
            <?php
            if(isset($_GET['msg'])){
                echo "<p style='margin-top:10px;color:green;font-size:15px;text-align:center;'>".$_GET['msg']."</p>";
            }
             if(isset($_GET['error'])){
        echo "<p style='margin-top:10px;color:red;font-size:15px;text-align:center;'>".$_GET['error']."</p>";
             }?>
            <form method="POST"><tr>
            <tr>
                        <td></td>
                        <td>
                            <p style="color:red;font-size:small;">
                                <?php echo $nameError ?>
                            </p>
                        </td>
                    </tr>   
            <td><label  class="labelcls">Userame <sup>*</sup></td><br></label>
            <div class="input-container">
                <i class="fa-solid fa-circle-user"></i>
                <input autocomplete="off" type="text" name='name'placeholder="Enter your Name *"required>
            </div><br>
            <tr>
                        <td></td>
                        <td>
                            <p style="color:red;font-size:small;">
                                <?php echo $emailError ?>
                            </p>
                        </td>
                    </tr>
           
            <td><label type="email" class="labelcls"required>Email <sup>*</sup></td><br></label>
            <div class="input-container">
                <i class="fa-solid fa-envelope"></i>
                <input autocomplete="off" type="email" name='email' placeholder="Enter your Email *"required>
            </div><br>
            <?php
            if(isset($_GET['error'])){
        echo "<p style='margin-top:10px;color:red;font-size:15px;text-align:center;'>".$_GET['error']."</p>";
             }?>
            <td><label type="password" class="labelcls" >Old Password <sup>*</sup></td><br></label>
            <div class="input-container">
                <i class="fa fa-eye-slash" id="eye-icon" onclick="togglePassword()"></i>
                <input type="password" id="password" name='oldpassword'placeholder="Enter your Password *"required>
            </div><br>
            <?php
            if(isset($_GET['error'])){
        echo "<p style='margin-top:10px;color:red;font-size:15px;text-align:center;'>".$_GET['error']."</p>";
             }?>
             <tr>
                        <td></td>
                        <td>
                            <p style="color:red;font-size:small;">
                                <?php echo $passwordError ?>
                            </p>
                        </td>
                    </tr>
            <td><label type="password" class="labelcls" >New Password <sup>*</sup></td><br></label>
            <div class="input-container">
                <i class="fa fa-eye-slash" id="eye-icon" onclick="togglePassword()"></i>
                <input type="password" id="password" name='password'placeholder="Enter your Password *"required>
            </div><br>
            <tr>
                        <td></td>
                        <td>
                            <p style="color:red;font-size:small;">
                                <?php echo $mobilenumberError ?>
                            </p>
                        </td>
                    </tr>
            <td><lable class="labelcls"  >Mobile Number <sup>*</sup></td><br></label>
            <div class="input-container">
                <i class="fa-solid fa-phone-volume"></i>
                <input autocomplete="off" type="number"  name='mobilenumber' placeholder="Enter your Mobile Number *"required>
            </div><br>       
                    
                    <tr><td></tr><input class="subbtn" type="submit" value="Submit" name="submit">
                            <br>
                               <p style="margin-left:185px;margin-top:15px;"><b><a class="logoutanch" href="home.php">Log Out</a></b></p>
                            </div>
                            </form>
        </div> </div>
            </div>
            <div class="imgdiv">
<div class="profile">We're Glad, you're here...Let's grow together !</div>
<button class="home-button" onclick="goHome()">Back<<</button>
</div>
</div>
           
<script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.getElementById("eye-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.add("fa-eye");
                eyeIcon.classList.remove("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.add("fa-eye-slash");
                eyeIcon.classList.remove("fa-eye");
            }
        }
    </script>
    <script>
    function goHome() {
     
      window.location.href = "home.php";
    }
  </script>
</body>
</html>