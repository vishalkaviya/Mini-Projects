<?php
 include("db/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="feedbackstyleyy.css">
    
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
      $sql="SELECT * FROM contact WHERE contactid='$search' OR name='$search' OR email='$search'";
      $result=mysqli_query($mysqli,$sql);
      if($result)
      {
        if(mysqli_num_rows($result)>0){
          echo 
          '<thead>
    <tr>
      <th scope="col">ContactID</th>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">Message</th>

    </tr>
  </thead>';
  while($row=mysqli_fetch_assoc($result))
  {
  echo'<tbody>
  <tr>
  <td>'.$row['contactid'].'</td>
  <td>'.$row['name'].'</td>
  <td>'.$row['email'].'</td>
  <td>'.$row['message'].'</td>
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
      <th scope="col">ContactID</th>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * FROM contact";
    $result=mysqli_query($mysqli,$sql);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $contactid=$row['contactid'];
            $name=$row['name'];
            $email=$row['email'];
            $message=$row['message'];
            
            ?>
    <tr>
      <th scope="row"><?php echo $contactid;?></th>
     

      <td><?php echo  $name;?></td>
      <td><?php echo $email;?></td>
      <td><?php echo $message;?></td>
     

      </tr>
        <?php
    }
    }?>
   
  </tbody>
</table>
    </div>
</body>
</html>