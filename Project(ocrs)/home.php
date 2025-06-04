<?php
include("db/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Lock</title>
    <link rel="stylesheet" href="stylesss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googlapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<header>
  <?php
   include("header1.php")
  ?>
</header>
<body>
    <div class="sbimg">
        <h1 style="margin-left: 450px;">Reserve Your Desired Courses On Online..!!</h1>
        <img src="olc.jpeg" height="500px" style="margin-top:20px;margin-left: -10; margin-left: 430px;">
    </div>
    <div class="motivation">
        <div>
            <img class="motpic" src="fire.jpg">
            <h3>Ignite your Potential</h3>
        </div>
        <div>
            <img class="motpic" src="wing1.jpg">
            <h3>Elewate Your Mind</h3>
        </div>
        <div>
            <img class="motpic" src="compass.jpg">
            <h3>Navigate Your Success</h3>
        </div>
        <div>
            <img class="motpic" src="bulb.jpg">
            <h3>Brighten Your Future</h3>
        </div>
        <div>
            <img class="motpic" src="staircase.jpg">
            <h3>Climb Higher, Achieve More</h3>
        </div>
    </div>
    <div class="word" id="targetcc">
        <h1>Explore 30+ Courses</h1>
    </div>
    <?php
       $sql = "SELECT * FROM categorytable";
       $result = mysqli_query($mysqli, $sql);
    ?>
    <div class="coursecatalog1" id="targetDiv">
        <?php
          while ($row = mysqli_fetch_assoc($result)) {
          $categoryid = $row['categoryid'];
        ?>
        <div class="catwhitediv">
        <?php
            echo "<a href='/pkkpro/dummy1.php?categoryid={$row['categoryid']}'>
            <img style='height:100px;width:100px;' src='{$row["categoryimage"]}' alt='Category Image'></a>";
        ?>
        <h4>
            <a style="text-decoration:none;color:black;" href="/pkkpro/dummy1.php?categoryid=<?php echo $row['categoryid']; ?>">
               <?php echo $row['categoryname']; ?>
            </a>
        </h4>
    <p class="nocourse">5 Courses</p>
    </div>
    <?php
      } 
    ?>
    </div>
    <div class="career">
        <div class="carhead">
            <h3 style="margin-top:10px;color:black;">Success begins with a plan</h3>
            <h4 style="margin-top:10px;color:black;">Try LearnLock's Career Ready Plan</h4>
            <p style="margin-top:10px;margin-top:10;">Whether you want to upskill in your current field or explore a new
                career,LearnLock's Career Ready Plan will show you need to do to get started on the path towards your
                dream job.We believe that everyone’s dream is important. But, finding a way to achieve it is not always
                easy.

                With Alison’s Career Ready Plan, you can get clarity and direction, and learn at your own pace. Once
                you’ve completed the plan, you’ll be more skilled, your resumé will be stronger, and your dream job will
                be within reach.</p>
        </div>
    </div>
    <div class="career1">
        <div class="car1">
            <img src="person.jfif">
            <h4>Personalised</h4>
            <p style="margin-top:10px;">Tailored to fit your interests, schedule, and goals</p>
        </div>
        <div class="car2">
            <img src="simple.jfif">
            <h4>Simplified</h4>
            <p style="margin-top:10px;">Get a step-by-step plan for your chosen career</p>
        </div>
        <div class="car3">
            <img src="holistic.jfif">
            <h4>Holistic</h4>
            <p style="margin-top:10px;">Know your strengths and improve your resumé</p>
        </div>
    </div>
    <div class="plan">
        <div class="planimg">
            <img src="planimag.jfif">
        </div>
        <div class="plancontent">
            <h2>How The Career Ready Plan Works</h2>
            <button>STEP 1</button>
            <p>Take a short assessment to discover most siutable careers</p>
            <button>STEP 2</button>
            <p>Choose the career that excites you the most</p>
            <button>STEP 3</button>
            <p>Follow the recommended step-by-step plan</p>
        </div>
        <div class="planimg1">
            <img src="planimg1.jfif">
        </div>
    </div>
    <div class="studyall">
        <div class="studcont">
            <h3>Learning knows no boundaries</h3>
            <h3>The best classroom is wherever you are</h3>
            <p>1.At Learn Lock, learning isn’t limited to a classroom—it happens wherever you are.</p>
            <p>2. Learn Lock empowers you to gain knowledge anytime, anywhere, at your own pace. </p>
            <p>3. With Learn Lock, every place becomes the perfect place to learn and grow.</p>
        </div>
        <div class="studimg">
            <img src="study.jfif">
        </div>
    </div>
    <div class="learn">
        <div class="learncont">
            <img src="lock.jpg.jpg" height="60px" width="60px" style="border-radius: 50%; margin-right:10px;">
            <h2 style="font-family: 'Times New Roman', Times, serif; margin-top:15px; color:darkblue;">Learn Lock!</h2>
            <p>Simplifying online course reservations, unlocking learning opportunities anytime, anywhere.</p>
            <p>Learn about Our Story</p>
        </div>
        <div class="learnimg">
            <img src="learnlock.jfif">
        </div>
    </div>
    <div class="educations">
        <div class="educimage">
            <img src="education3.jfif">
        </div>
        <div class="education">

            <div class="eduquote">
                <p><i>" Education is the foundation of growth, innovation, and progress. It empowers individuals,
                        unlocks opportunities, and shapes a brighter future for society. True learning goes beyond
                        textbooks it is a lifelong journey fueled by curiosity and the desire to improve. In a world
                        driven by knowledge, access to education should be a right, not a privilege. With technology
                        bridging gaps, learning is now more accessible than ever, enabling anyone, anywhere, to gain new
                        skills and knowledge. At Learn Lock, we believe in breaking barriers to education, making
                        quality learning opportunities available to all."</i></p>
            </div>
            <div class="eduquote1">
                <img src="userkpk3.png">
                <img src="userkpk2.png">
                <img src="userkpk1.png">
            </div>
            <div class="founders">
                <div class="founder">
                    <h4>Padma Sri</h4>
                    <p>Founder & CEO</p>
                    <p>LearnLock</p>
                </div>
                <div class="founder">
                    <h4>KaviBharathi</h4>
                    <p>Founder & CEO</p>
                    <p>LearnLock</p>
                </div>
                <div class="founder">
                    <h4>Kaviya</h4>
                    <p>Founder & CEO</p>
                    <p>LearnLock</p>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
<?php
 include("footer1.php");
?>
</footer>
</html>

