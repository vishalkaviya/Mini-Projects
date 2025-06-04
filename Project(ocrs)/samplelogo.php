<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="samplelogos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <div class="loginbig">
        <div class=loginsmall>


            <h1 style="text-align:center;color:rgb(95, 25, 25);">Login</h1>

            <div class="headerlog">
                <h2 class="ha"><a class="anch"href="login.php">Login</a></h2>
                <h2 class="haa"><a class="anch" href="regis.php">SignUp</a></h2>
            </div>

            <center>
                <form action="loginprocess.php" method="post">

                    <table>
                        <tr>
                            <td></td>
                            <td>
                            <td>
                                <?php
     if(isset($_GET['error'])){
        echo "<p style='color:red;font-size:15px;margin-left:50px;'>".$_GET['error']."</p>";
    }?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <td>
                                <p style="margin-top:10px;">Email   <sup>*</sup></p>
                            </td>
                            <td><input autocomplete="off" class="logput1" type="email" name="email"
                                    placeholder="   Enter Email *"></td><br>
                        </tr><br>

                        <tr>
                            <td>
                            <td>
                                <p tyle="margin-top:20;">password<sup>*</sup></p>
                            </td>

                            <td>
                                <div class="password-container">
                                    <input class="logput1" type="password" id="password" name="password"
                                        placeholder="   Enter Password *">
                                    <span class="toggle-password">
                                        <i class="fas fa-eye-slash" id="eye-icon" onclick="togglePassword()"></i>
                                    </span>
                                </div>
                            </td>
                        </tr><br>
                        <tr>
                            <td>
                            <td>
                            <td><input class="logput2" type="submit" name="submit" value="Login"> </td><br>
                        </tr><br>
                    </table>
                </form>
                <center>
                    <p style="margin-top:20px;font-size:18px;">Don't have an account?<b><a class="sign"href="regis.php">Sign Up</a></b></p>
        </div>
    </div>
    </center>
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