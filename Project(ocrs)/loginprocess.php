<?php
include("db/config.php");  
session_start();  


if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = ($_POST['email']);  
    $password = ($_POST['password']);  

  
    if (empty($email)) {
        header("Location:login.php?error=Email is Required *");
        exit();  
    }
    
    else if (empty($password)) {
        header("Location:login.php?error=password is Required *");
        exit();  
    }
   
    else {
        
        $sql = "SELECT * FROM registration WHERE email='$email' AND password='$password' ";
        $result = mysqli_query($mysqli, $sql);  
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result); 

            
            if ($row['email'] === $email && $row['password'] === $password) {
                $_SESSION['email'] = $row['email']; 
                $_SESSION['name'] =$row['name'];
                $_SESSION['id'] = $row['id'];  
                $_SESSION['firstname']=$row['firstname'];
                $_SESSION['dob']=$row['dob'];
                $_SESSION['gender']=$row['gender'];
                $_SESSION['mobilenumber']=$row['mobilenumber'];
                if ($email === "learnlockkpk@gmail.com" && $password==="Kpk@2004") {  
                    
                    header("Location:admin.php");
                } else {
                    
                    header("Location:home.php");
                }
                exit();  
            }
        } else {
            
            header("Location:login.php?error=⚠️Invalid Email and Password");
            exit();  
        }
    }
}
?>