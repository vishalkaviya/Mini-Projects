<?php
session_start();
include("db/config.php");
if (isset($_GET['courseid']) ) {
    $courseid = intval($_GET['courseid']);
    $id = $_SESSION['id'];
}
$sql="SELECT * FROM reservation WHERE id='$id'AND courseid=$courseid";
$result=mysqli_query($mysqli,$sql);
if($result)
{
    $row=mysqli_fetch_assoc($result);
    
   
}
else{
    echo "not found";
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>reserve</title>
    <link rel="stylesheet" href="reservestylesss.css">
</head>
<body>
    <div class="maindiv">
        <h1 style="margin-top:30px;">COURSE RESERVATION</h1>
        
        <table class="table">
        <form method="POST">
        <tr>
        <td><label><b>Name</b></label></td>
        <td><input type="text" name="firstname" value="<?php echo $row['firstname'];?>"></td>
        </tr>
        
        <tr>
        <td><label><b>Category Name</b></label></td>
        <td><input type="text" name="categoryname" value="<?php echo $row['categoryname'];?>"></td>
        </tr>
        <tr>
        <td><label><b>Course Name</b></label></td>
        <td><input type="text" name="coursename" value="<?php echo $row['coursename'];?>"></td>
        </tr>
        <tr>
        <td><label><b>Amount to be Paid</b></label></td>
        <td><input type="text" name="price" value="<?php echo '$ '.$row['price'];?>"></td>
        </tr>
       
        
</table>
        <button name="submit"><a style="text-decoration:none;color:white;"href="/pkkpro/done.php?courseid=<?= urlencode($row['courseid']);?>">Pay Now!</a></button>
        <?php
        if(isset($_GET['msg'])){
        echo "<p style='margin-top:5px;color:black;font-size:18px;text-align:center;'>".$_GET['msg']."</p>";
    }?>
    </div>
    
    </form>
</body>
</html>