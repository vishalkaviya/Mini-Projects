<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shows data</title>
    <link rel="stylesheet"href="admin1.css">
</head>
<body>
    <div class="container" style="margin-top: 200px;margin-left: 300px;">
        <form method="post">
            <input type="text" placeholder="search name or id..." name="search">
            <button class="btn" style="border: black;color: rgb(255, 255, 255);background-color: rgb(0, 0, 0);cursor: pointer;" type="submit"name="submit">search</button>
        </form>
        <div class="container" style="margin:20px;">
            <table class="table">
             <?php
            
            if(isset($_POST['submit']))
            {
                $search=$_POST['search'];
                $sql="SELECT * from registration WHERE id like'%$search%' or firstname like '%$search%' or lastname like'%$search%'";
                $result=mysqli_query($con,$sql);
                if($result){
                    if(mysqli_num_rows($result)>0){
                        echo '<thead>
                        <tr>
                        <th>SI. no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>MobileNumber</th>
                        <th>Role</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>DateOfBirth</th>
                        <th>Gender</th>
                        </tr>
                        <thead>';
                        while($row=mysqli_fetch_assoc($result)){
                        echo '<tbody>
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['password'].'</td> 
                            <td>'.$row['mobilenumber'].'</td>
                            <td>'.$row['role'].'</td> 
                            <td>'.$row['firstname'].'</td> 
                            <td>'.$row['lastname'].'</td> 
                            <td>'.$row['dob'].'</td> 
                            <td>'.$row['gender'].'</td>    
                        </tr>
                        </tbody>';
                        }
                    }
                    else{
                        echo "<h2 class=text-danger>Data Not Found</h2>";
                    }
                }
            }
            
            ?>    
            </table>
        </div>
    </div>
</body>
</html>