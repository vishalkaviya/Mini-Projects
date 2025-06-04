<?php
include("db/config.php");
if(isset($_GET['deletecategoryid']))
{
    $categoryid=$_GET['deletecategoryid'];
    $sql="DELETE FROM categorytable WHERE categoryid=$categoryid";
    $result=mysqli_query($mysqli,$sql);
    if($result)
    {
        header("Location:admincategory.php?msg=✅Category Deleted Successfully !");
    }
    else{
        die(mysqli_error($mysqli));
    }
}