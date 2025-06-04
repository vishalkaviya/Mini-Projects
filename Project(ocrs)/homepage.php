<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['email'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hompage</title>
</head>
<body>
    <center><h1>Welcome <?php echo $_SESSION['email'];?></center>
</body>
</html>
<?php
}
else{
    header("Location:login.php");
    exit();
}
?>