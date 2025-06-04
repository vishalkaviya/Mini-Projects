<?php
include("config.php");
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $MobileNumber=$_POST['MobileNumber'];

$result=mysqli_query($mysql, "insert into user value('','$name','$email','$password','$confirmpassword','$MobileNumber') ");
if($result)
{
    echo "user registration successfully ,you  can login Now";

}
else{
    echo "Something wrong ,data not stored";
}
}
?>