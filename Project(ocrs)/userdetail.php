<?php
 include("db/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="userdetailstyleyyyy.css">
    
</head>
<header>
<?php

include("adminheader.php");
?>
</header>
<body>
    
    <form method="POST">
        <input type="text" name="search" class="search"placeholder="   seach...">
        <button class="submit" name="submit">search</button>
    </form>
    <div class="container">
    <table class="table1">
    <?php
    if(isset($_POST['submit']))
    {
      $search=$_POST['search'];
      $sql="SELECT * FROM registration WHERE id='$search' OR name='$search' OR email='$search' OR firstname='$search' OR lastname='$search' OR gender='$search'";
      $result=mysqli_query($mysqli,$sql);
      if($result)
      {
        if(mysqli_num_rows($result)>0){
          echo 
          '<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">MobileNumber</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">D.O.B</th>
      <th scope="col">Gender</th>

    </tr>
  </thead>';
  while($row=mysqli_fetch_assoc($result))
  {
  echo'<tbody>
  <tr>
  <td>'.$row['id'].'</td>
  <td>'.$row['name'].'</td>
  <td>'.$row['email'].'</td>
  <td>'.$row['password'].'</td>
  <td>'.$row['mobilenumber'].'</td>
  <td>'.$row['firstname'].'</td>
  <td>'.$row['lastname'].'</td>
  <td>'.$row['dob'].'</td>
  <td>'.$row['gender'].'</td>
  </tr>
  </tbody>';

              }      }
        else{
          echo "<h2 style='color:red;margin-left:300px;margin-top:20px;'>Data not Found</h2>";
      }
      }
    }
     ?> 
   
  </table>
</div>


    <div class="add-container">
        
        <table class="table2">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">MobileNumber</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">D.O.B</th>
      <th scope="col">Gender</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * FROM registration";
    $result=mysqli_query($mysqli,$sql);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $id=$row['id'];
            $name=$row['name'];
            $email=$row['email'];
            $password=$row['password'];
            $mobilenumber=$row['mobilenumber'];
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $DOB=$row['dob'];
            $gender=$row['gender'];
            ?>
    <tr>
      <th scope="row"><?php echo $id;?></th>
     

      <td><?php echo  $name;?></td>
      <td><?php echo $email;?></td>
      <td><?php echo $password;?></td>
      <td><?php echo $mobilenumber;?></td>
      <td><?php echo $firstname;?></td>
      <td><?php echo $lastname;?></td>
      <td><?php echo $DOB;?></td>
      <td><?php echo $gender;?></td>

      </tr>
        <?php
    }
    }?>
   
  </tbody>
</table>
    </div>
    <?php
      $sql="SELECT * FROM registration";
      $result=mysqli_query($mysqli,$sql);
      $num=mysqli_num_rows($result);
      $query="SELECT * FROM registration WHERE gender='Male'";
      $result=mysqli_query($mysqli,$query);
      $num1=mysqli_num_rows($result);
      $query1="SELECT * FROM registration WHERE gender='Female'";
      $result=mysqli_query($mysqli,$query1);
      $num2=mysqli_num_rows($result);
      
      ?>
    
    <div class="userreport">
    <div class="male"><img src="users.webp"><p class="para1">No. Of Students  Registered</p></div>
      <div class="users"><p class="para2"><?php echo $num;?></p></div>
      <div class="male"><img src="revus1.png"><p class="para1">Male Students</p></div>
      <div class="users"><p class="para2"><?php echo $num1;?></p></div>
      <div class="male"><img src="userkpk4.png"><p class="para1">Female Students</p></div>
      <div class="users"><p class="para2"><?php echo $num2;?></p></div>
  </div>
  
</body>
</html>