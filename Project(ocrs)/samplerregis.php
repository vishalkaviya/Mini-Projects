<?php
session_start();
 include("db/configcategory.php");
 if ($mysqlii->connect_error) {
    die("Connection failed: " . $mysqlii->connect_error);
 }

 if (isset($_GET['categoryid'])) {<?php
    session_start();
    include("db/config.php");
    
    $nameError = "";
    $emailError = "";
    $passwordError = "";
    $mobilenumberError = "";
    $roleError = "";
    $admin_email = "learnlockkpk@gmail.com";
    $admin_password="Kpk@2004";
    
    if (isset($_POST['submit'])) {
        $name = $_POST["name"];
        $email = $_POST["email"]; 
        $password = $_POST["password"];
        $mobilenumber = $_POST["mobilenumber"];
        $role = ($email === $admin_email && $password===$admin_password) ? 'admin' : 'student';
      
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
            $result =mysqli_query(
                mysql:$mysqli,
                query:"INSERT INTO registration(name,email,password,mobilenumber,role) 
            VALUES('$name', '$email', '$password', '$mobilenumber', '$role')");
            if($result)
            {
                $id=mysqli_insert_id($mysqli);
                $_SESSION['id']=$id;
                $_SESSION['name']=$name;
                $_SESSION['email']=$email;
                $_SESSION['mobilenumber']=$mobilenumber;
                header("Location:profile.php?");
                
            }
            else{
                header("Location:regis.php?msg=Something went wrong try again!");
            }
        }
    }
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Form</title>
        <link rel="stylesheet" href="sampler.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
    
    <body>
        
            <div class="logdivwhite">
                <h1 style="text-align:center;color:rgb(95, 25, 25);margin-top:-10px;">REGISTRATION</h1>
                <div class="headerlog1">
                    <h2 class="ha"><a href="login.php" class="anch">Login</a></h2>
                    <h2 class="haa"><a href="regis.php"class="anch">SignUp</a></h2>
                </div><br><br>
                <?php
         if(isset($_GET['msg'])){
            echo "<p style='margin-top:10px;color:green;font-size:28px;text-align:center;'>".$_GET['msg']."</p>";
        }
         if(isset($_GET['error'])){
            echo "<p style='margin-top:10px;color:red;font-size:28px;text-align:center;'>".$_GET['error']."</p>";
        }?>
                <form method="POST">
                    <table class="table">
                        <tr>
                            <td></td>
                            <td>
                                <p style="color:red;font-size:15px;">
                                    <?php echo $nameError ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:18px;"><b>Username    <sup>*</sup></b></td>
                            <td><input class="inputs1" type="text" name="name" placeholder="Enter Username  *"></td><br>
                        </tr><br>
    
                        <tr>
                            <td></td>
                            <td>
                                <p style="color:red;font-size:15px;">
                                    <?php echo $emailError ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:18px;"><b>Email    <sup>*</sup></b></td>
                            <td><input autocomplete="off" class="inputs1" type="text" name="email"
                                    placeholder="Enter Email *"></td><br>
                        </tr><br>
    
                        <tr>
                            <td></td>
                            <td>
                                <p style="color:red;font-size:15px;">
                                    <?php echo $passwordError ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:18px;"><b>Password    <sup>*</sup></b></td>
                            <td>
                                <div class="password-container">
                                    <input class="inputs1" type="password" id="password" name="password"
                                        placeholder="Enter Password  *">
                                    <span class="toggle-password">
                                        <i class="fa fa-eye-slash" id="eye-icon" onclick="togglePassword()"></i>
                                    </span>
                                </div>
                            </td>
                        </tr><br>
    
                        <tr>
                            <td></td>
                            <td>
                                <p style="color:red;font-size:15px;">
                                    <?php echo $mobilenumberError ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:18px;"><b>Mobile Number   <sup>*</sup></b></td>
                            <td>
    <input autocomplete="off" class="inputs1" type="number" id="mobilenumber" name="mobilenumber"
                                    placeholder="Enter Mobile Number *" required></td><br>
                        </tr><br>
    
                        <tr>
                            <td></td>
                            <td>
                                <p style="color:red;font-size:15px;">
                                    <?php echo $roleError ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:18px;"><b>Role     <sup>*</sup></b></td>
                            <td>
                                <select class="inputs1" name="role" required>
                                    <option value="student">Student</option>
                                    <option value="admin" <?php echo (isset($email) && isset($password) &&
                                        $email===$admin_email && $password===$admin_password) ? 'selected' : '' ; ?>>Admin
                                    </option>
                                </select>
                            </td>
                        </tr>
    
                        <tr>
                            <td></td>
                            <td><button class="sigbtn"type="submit" name="submit" ><a class="sia"href="profile.php">Sign Up</a></button></td>
                        </tr><br>
                    </table>
    
                    <p class="login-link">Already have an Account in Learn Lock? <a class="sign" href="login.php">LogIn</a></p>
                </form>
            
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
    </body>
    
    </html>

    $categoryid = intval($_GET['categoryid']);
    echo $categoryid;



    $sql = "SELECT categorytable.*, coursetable.* 
    FROM coursetable 
    JOIN categorytable ON coursetable.categoryid = categorytable.categoryid 
    WHERE coursetable.categoryid = $categoryid";
    $result = mysqli_query($mysqlii, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $courses=[];
       
        while($row = mysqli_fetch_assoc($result)) {
            $courses[]=$row;
        }
        $category=$courses[0];?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category</title>
    <link rel="stylesheet" href="category.css">
</head>
<body>
    <div class="maindiv">
        <div class="introdiv">
        <?php
       echo" <h1 style='padding-top:30px;'>".$category["categoryname"]."</h1>"?>
       </div>
       <?php
       echo "<img src='" . $category["categoryimage"] . "' alt='Category Image'>";?>
    
    <h2>🧠Category Introduction</h2>
    <?php
    echo"<p>".$category["categoryintro"]."
      </p>";?>
    
      <h2>📚Course Description</h2>
      <?php
      echo"<p>".$category["categorydesc"]." </p>";?>
    
      <h2>📺Introduction Video</h2>
      <?php
      echo"<p>".$category["categoryvdodesc"]." </p>";
      
      
      if(!empty(["categoryvdo"])&file_exists($category["categoryvdo"])){
        echo "<video widht='100%' height='400' controls>
        <source src='".$category["categoryvdo"]. " ' type='video/mp4'>Your browswer does not support the video tag.</video>";
    }
    else{
        echo "<p style='color:red'>video not found</p>";
    }
        ?>
      <h2>📘Available Courses</h2>
      <?php foreach($courses as $course){?>

      <div class="course-list">
        <ul>
            <?php
         echo "<li>".$course["coursename"]."</li>";
       } ?>
        </ul>
      </div>
      <h2>⛳Courses to visit...</h2>
      <div class="totaldiv1">
      <div class="images">
        <div class="indiv">
         <img src="python-file.png" class="imgs">
         
         <a href="course.html" style="text-decoration: none;color: black;margin-left: 50px;font-size: larger;"><b>Python Programming</b></a>
         <p style="margin-top: 5px;margin-left: 10px;">(Learning about variables, syntax, and basic structure of programming.)</p></div>
      </div>
      <div class="images">
        <div class="indiv">
        <img src="app-development.png" class="imgs">
        
        <a href="course.html" style="text-decoration: none;color: black;margin-left: 50px;font-size: larger;"><b>Web Development</b></a>
        <p style="margin-top: 5px;margin-left: 10px;">(Learn to build responsive websites using HTML, CSS,and frameworks.)</p></div>
     </div>
     <div class="images">
        <div class="indiv">
        <img src="protection.png" class="imgs">
        
        <a href="python.page" style="text-decoration: none;color: black;margin-left: 50px;font-size: larger;"><b>Cyber Security</b></a>
        <p style="margin-top: 5px;margin-left: 10px;">(Learn how to protect systems, networks, and data from cyber threats.)</p></div>
     </div></div>
     <br>
     <div class="totaldiv2">
     <div class="images">
        <div class="indiv">
        <img src="cloud-server.png" class="imgs">
        
        <a href="python.page" style="text-decoration: none;color: black;margin-left: 50px;font-size: larger;"><b>Cloud Computing</b></a>
        <p style="margin-top: 5px;margin-left: 10px;">(Learn to deploy, manage, and scale applications in the cloud environment.)</p></div>
     </div>
     <div class="images">
        <div class="indiv">
        <img src="ai.png" class="imgs">
        
        <a href="python.page" style="text-decoration: none;color: black;margin-left: 50px;font-size: larger;"><b>Artificial Intelligence</b></a>
        <p style="margin-top: 5px;margin-left: 10px;">(These videos help you understand how machines think, learn, and make decisions.)</p></div>
     </div>
     </div>
    </div>
    <?php
    
    }

    else{
        echo "No course is found";
    }
}
    else {
        echo "No category selected.";
    }
?>
</body>
</html>