<?php
include("db/config.php");


$message = "";

if (isset($_POST['submit'])) {
    $categoryname = mysqli_real_escape_string($mysqli, $_POST['categoryname']);
    $imageName = $_FILES['categoryimage']['name'];
    $imageTmp = $_FILES['categoryimage']['tmp_name'];
    $imagePath = "uploads/" . $imageName;
    move_uploaded_file($imageTmp, $imagePath);
    $categoryintro = mysqli_real_escape_string($mysqli, $_POST['categoryintro']);
    $categorydesc = mysqli_real_escape_string($mysqli, $_POST['categorydesc']);
    $categoryvdodesc = mysqli_real_escape_string($mysqli, $_POST['categoryvdodesc']);
    $videoName = $_FILES['categoryvideo']['name'];
    $videoTmp = $_FILES['categoryvideo']['tmp_name'];
    $videoPath = "uploads/" . $videoName;
    move_uploaded_file($videoTmp, $videoPath);
    if (!preg_match("/^[a-zA-Z ]+$/", $categoryname)) {
        $message = "❌ Category name must only contain letters and spaces. No digits or special characters.";
    }
    else{
        $check_query = "SELECT * FROM categorytable WHERE LOWER(categoryname) = LOWER(?)";
        $stmt = mysqli_prepare($mysqli, $check_query);
        mysqli_stmt_bind_param($stmt, "s", $categoryname);
        mysqli_stmt_execute($stmt);
        $check_result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($check_result) > 0) {
            $message = "❌ This category name already exists. Please use a unique name.";
        } else {
    $sql = "INSERT INTO categorytable (categoryname, categoryimage,categoryintro, categorydesc, categoryvdodesc, categoryvdo)
    
            VALUES ('$categoryname', '$imagePath',' $categoryintro', '$categorydesc', '$categoryvdodesc', '$videoPath' )";

    if (mysqli_query($mysqli, $sql)) {
        header("Location: admincategory.php?msg=✅Category Added successfully !");
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
    <title>Upload Course</title>
    <style>
        body {
            background-image: url("adminbg3.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    justify-content: center;
    display: flex;
    height: 100vh;
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
            background:rgb(60, 52, 116);
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
    <h2>Add New Category</h2>
    <?php if (!empty($message)) echo "<p class='msg'>$message</p>"; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Category Name  <sup>*</sup></label><br>
        <input placeholder="Enter Category Name"type="text" name="categoryname" required><br>
        <label>Category Introduction  <sup>*</sup></label><br>
        <textarea placeholder="Enter Category Introduction"type="text" name="categoryintro"rows="4" required></textarea><br>
        <label>Category Description  <sup>*</sup></label><br>
        <textarea placeholder="Enter Category Description"type="text"name="categorydesc" rows="4" required></textarea><br>
        
        
        <label>Video Description  <sup>*</sup></label><br>
        <textarea placeholder="Enter Video Description"type="text"name="categoryvdodesc" rows="4" required></textarea><br>


        <label>Category Video  <sup>*</sup></label><br>
        <input type="file" name="categoryvideo" accept="uploads/*" required><br>

        <label>Category Image  <sup>*</sup></label><br>
        <input type="file" name="categoryimage" accept="uploads/*" required><br>
       
        
        <input type="submit" name="submit" value="Add Category">
    </form>
</div>

</body>
</html>