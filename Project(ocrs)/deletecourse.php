<?php
include("db/config.php");
if(isset($_GET['deletecourseid']))
{
    $courseid=$_GET['deletecourseid'];
    $sql="DELETE FROM coursetable WHERE courseid=$courseid";
    $result=mysqli_query($mysqli,$sql);
    if($result)
    {
       header("Location:admincourse.php?msg=✅Course Deleted Successfully !");
    }
    else{
        die(mysqli_error($mysqli));
    }
}