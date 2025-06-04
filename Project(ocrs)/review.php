<?php
include("db/config.php");
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $sql = "SELECT id FROM registration WHERE name='$name' AND email='$email'";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result)) {
        $user = mysqli_fetch_assoc($result);
        $userid = $user['id'];
        $sql= "INSERT INTO reviewtable (id,name, email, message) VALUES ('$userid','$name', '$email', '$message')";
        $result=mysqli_query($mysqli, $sql);
         if ($result) {
            header("Location: review.php?msg=✅review submitted successfully!");
        } else {
            header("Location: review.php?error=⚠️Error submitting review.");
        }
    } else {
        header("Location: review.php?error=⚠️You must be a registered user to submit review.");
    }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <link rel="stylesheet" href="reviewstyleees.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googlapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<header>
<?php
include("header1.php");
?>
</header>
<body>
    <div class="rew1">
        <div class="subrew1">
            <img class="msgimg" src="rewmsg1.png">
        </div>
        <h1>Why Our Customers Love Us?</h1>
        <div class="rew2">
            <div class="subrew2">
                <img class="img1" src="revus7.png">
                <img class="img2" src="rat1.png">
                <p class="par1"><i>"The website is easy to navigate, making it simple to find and register for
                        courses.The registration process is quick and straightforward, and I love that there are videos
                        to preview the courses.It’s a great way to get a feel for the course before committing."</p></i>
            </div>
            <div class="subrew3">
                <img class="img1" src="revus2.png">
                <img class="img2" src="rat1.png">
                <p class="par1"><i>"I love how smooth the registration process is. The course details are clear and
                        informative, and the videos provide a great preview of what to expect. Definitely a great
                        platform for learning!"</p></i>
            </div>
            <div class="subrew4">
                <img class="img1" src="revus3.png">
                <img class="img2" src="rat1.png">
                <p class="par1"><i>"This site makes signing up for courses a breeze. I can easily check availability and
                        register for my spot, plus the videos help me decide if the course is right for me. Highly
                        recommend for anyone looking to learn online!"</p></i>
            </div>
        </div>
        <div class="rew3">
            <div class="subrew5">
                <img class="img1" src="revus5.png">
                <img class="img2" src="rat1.png">
                <p class="par1"><i>"The course registration system works seamlessly. I can find courses that fit my
                        schedule with ease, and the videos provide helpful insights into the course content. The website
                        is clean and efficient."</p></i>
            </div>
            <div class="subrew6">
                <img class="img1" src="revus4.png">
                <img class="img2" src="rat1.png">
                <p class="par1"><i>"Registering for online courses is hassle-free with this site. It’s easy to browse
                        through options and secure my seat, and I love the course preview videos that give me a sneak
                        peek before I commit. Great platform for busy learners."</p></i>
            </div>
            <div class="subrew7">
                <img class="img1" src="revus6.png">
                <img class="img2" src="rat1.png">
                <p class="par1"><i>"The videos offered for each course are a fantastic addition. They give a clear
                        preview of the material, making it easier to decide which course to register for. The website is
                        simple to use, and the registration process is straightforward."</p></i>
            </div>
        </div>
    </div>
    <div class="contactus">
        <div class="design">
            <?php
                if(isset($_GET['msg'])){
                 echo "<p style='color:green;font-size:18px;margin-left:220px;margin-top:10px;font-family:italic'>".$_GET['msg']."</p>";
            }?>
            <?php
                if(isset($_GET['error'])){
                echo "<p style='color:red;font-size:18px;margin-left:220px;margin-top:10px;font-family:italic'>".$_GET['error']."</p>";
            }?>
            <div class="design0"></div>
            <div class="design1">
                <form method="POST">
                    <div class="feedback">
                        <center>
                            <h2 style="color:white;">Give Us Your Thoughts!</h2>
                            <p style="color:white;margin-top:10px;"><b>Fill in the form below to share your review!</b>
                            </p>
                            <div class="input-container">
                                <i class="fa-solid fa-circle-user"></i>
                                <input autocomplete="off" type="text" name='name' class="name" placeholder="Name "
                                    required>
                            </div>
                            <div class="input-container">
                                <i class="fa-solid fa-envelope-open-text"></i>
                                <input autocomplete="off" class="email" type="email" name="email" placeholder="Email"
                                    required>
                            </div>
                            <div class="input-container">
                                <i class="fa-brands fa-signal-messenger"></i>
                                <textarea class="message" name="message" placeholder="       Message" class="message"
                                    required></textarea>
                            </div>
                            <input type="submit" value="Send Message" name="submit" class="msg">
                        </center>
                    </div>
                </form>
            </div>
        </div>
        <div class="contact">
            <img src="reviewimg1.jpg">
        </div>
        <div class="msglogo">
            <img src="msgimg1.jfif">
        </div>
    </div>
    <div class="posreview">
        <img class="posimg" src="positive2.jpg">
        <div class="posreview1">
            <img class="ratimg" src="rat2.jpg">
            <p class="par"><i>"Booking your next course has never been easier. With just a few clicks, you can browse
                    through a wide selection of courses tailored to your interests and needs. Our secure payment system
                    ensures a quick and safe transaction, giving you peace of mind. Once your reservation is complete,
                    you'll have instant access to course materials, so you can start learning right away."</i></p>
            <img class="emoji" src="rar3.png">
        </div>
    </div>
    <div class="userreview">
        <?php 
        $sql="SELECT * FROM reviewtable";
        $result=mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($result)>0)
        {
           while($row=mysqli_fetch_assoc($result))
           {
        ?>
        <div class="rr1">
            <div class="r1">
                <i class="fa-solid fa-circle-user"></i>
                <p>
                    <?php echo $row['name'];?>
                </p>
            </div>
            <p><i>
                    <?php echo $row['message'];?>
                </i></p>
        </div>
        <?php
           }   }
        else {
            header("Location: review.php?error=⚠️You must be a registered user to submit feedback.");
        }?>
    </div>
<footer>
<?php
include("footer1.php");
?>
</footer>
</body>
</html>