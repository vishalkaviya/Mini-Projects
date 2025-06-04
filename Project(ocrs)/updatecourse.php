<?php
include("db/config.php");


$message = "";
$courseid=$_GET['updatecourseid'];
$querry="SELECT * FROM coursetable where courseid=$courseid";
$result=mysqli_query($mysqli,$querry);
$row=mysqli_fetch_assoc($result);
$categoryid=$row['categoryid'];
$coursename=$row['coursename'];
if (isset($_POST['submit'])) {
    $coursename = mysqli_real_escape_string($mysqli, $_POST['coursename']);
    $categoryname = mysqli_real_escape_string($mysqli, $_POST['categoryname']);
    
    
    
    $imageName = $_FILES['courseimage']['name'];
    $imageTmp = $_FILES['courseimage']['tmp_name'];
    $imagePath = "uploads/" . $imageName;
    move_uploaded_file($imageTmp, $imagePath);
    $courseintro = mysqli_real_escape_string($mysqli, $_POST['courseintro']);
    $coursedesc = mysqli_real_escape_string($mysqli, $_POST['coursedesc']);
    $vdodesc = mysqli_real_escape_string($mysqli, $_POST['vdodesc']);
    $videoName = $_FILES['coursevideo']['name'];
    $videoTmp = $_FILES['coursevideo']['tmp_name'];
    $videoPath = "uploads/" . $videoName;
    move_uploaded_file($videoTmp, $videoPath);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    if (!preg_match("/^[a-zA-Z ]+$/", $coursename)) {
        $message = "❌ Course name must only contain letters and spaces. No digits or special characters.";
    }
    else{
        $check_query = "SELECT * FROM coursetable WHERE LOWER(coursename) = LOWER(?)";
        $stmt = mysqli_prepare($mysqli, $check_query);
        mysqli_stmt_bind_param($stmt, "s", $coursename);
        mysqli_stmt_execute($stmt);
        $check_result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($check_result) > 0) {
            $message = "❌ This coursename already exists. Please use a unique name.";
        } else {
    
            $sql="UPDATE coursetable set courseid=$courseid,coursename='$coursename',courseimage='$imageName',courseintro='$courseintro',coursedesc='$coursedesc',vdodesc='$vdodesc',coursevdo='$videoName',price='$price' WHERE courseid=$courseid";   
            $result=mysqli_query($mysqli, $sql);
            if ($result) {
               header("Location:admincourse.php?msg=✅Course updated successfully!");
            } else {
                $message = "❌Upload failed: " . mysqli_error($mysqli);
            }
}
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Course</title>
    <style>
        body {
            background-image: url("adminbg3.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    justify-content: center;
    display: flex;
    height: 1100px;
    width: 100vw;
        }
        .form-container {
            background-color:rgb(199, 176, 146);
            max-width: 430px;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-left:100px;
            display: block;
            
        }
        h2 {
            text-align: center;
            color: #4a4a4a;
        }
        input[type="text"],
        input[type="file"],
        textarea {
            width: 400px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type="submit"] {
            background: rgb(60, 52, 116);
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background: #4500b5;
        }
        .msg {
            text-align: center;
            color: green;
            font-weight: bold;
        }
        sup{
            color:red;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Update Course</h2>
    <?php if (!empty($message)) echo "<p class='msg'>$message</p>"; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Course Name <sup>*</sup></label>
        <input value="<?php echo $coursename?>"placeholder="Enter Course Name"type="text" name="coursename" required>
        <label>Category ID <sup>*</sup></label>
        <br>
        <input type="text" name="categoryid" value="<?php echo $categoryid?>"required>
    <br>

        <label>Course Image <sup>*</sup></label>
        <input type="file" name="courseimage" accept="uploads/*" required>
        <label>Course Introduction <sup>*</sup></label>
        <textarea placeholder="Enter Course Introduction"type="text"name="courseintro" rows="4" required></textarea>
        <label>Course Description <sup>*</sup></label>
        <textarea placeholder="Enter Course Description"type="text"name="coursedesc" rows="4" required></textarea>
        <label>Video Description <sup>*</sup></label>
        <textarea placeholder="Enter video Description"type="text"name="vdodesc" rows="4" required></textarea>


        <label>Course Video <sup>*<sup></label>
        <input type="file" name="coursevideo" accept="uploads/*" required>

        <label>Price <sup>*</sup><p>(Must be in dollar)</p></label>
        <input placeholder="Enter course price"type="text"name="price" rows="4" required>
        <label>Main Description <sup>*</sup></label>
        <textarea placeholder="Enter Main Description"type="text"name="vdodesc" rows="4" required></textarea>

        <input type="submit" name="submit" value="Update Course">
    </form>
</div>

</body>
</html>