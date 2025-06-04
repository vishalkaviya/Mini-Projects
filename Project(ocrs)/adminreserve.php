<?php
 include("db/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Details</title>
    <link rel="stylesheet" href="adminresss.css">
    
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
      $sql="SELECT * FROM reservation WHERE reservationid LIKE '%$search%' OR id LIKE'%$search%'OR firstname LIKE'%$search%' OR categoryname LIKE'%$search%'OR coursename LIKE'%$search%' OR courseid LIKE'%$search%' OR date LIKE'%$search%' OR time LIKE '%$search%'";

      $result=mysqli_query($mysqli,$sql);
      if($result)
      {
        if(mysqli_num_rows($result)>0){
          echo 
          '<thead>
    <tr>
      <th scope="col">Reservation Id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Course Name</th>
      <th scope="col">Price</th>
      <th scope="col">First Name</th>
      <th scope="col">User Id</th>
      <th scope="col">Course Id</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
    </tr>
  </thead>';
  while($row=mysqli_fetch_assoc($result))
  {
  echo'<tbody>
  <tr>
  <td>'.$row['reservationid'].'</td>
  <td>'.$row['categoryname'].'</td>
  <td>'.$row['coursename'].'</td>
  <td>'.$row['price'].'</td>
  <td>'.$row['firstname'].'</td>
  <td>'.$row['id'].'</td>
  <td>'.$row['courseid'].'</td>
  <td>'.$row['date'].'</td>
  <td>'.$row['time'].'</td>
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
    <th scope="col">Reservation Id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Course Name</th>
      <th scope="col">Price</th>
      <th scope="col">First Name</th>
      <th scope="col">User Id</th>
      <th scope="col">Course Id</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * FROM reservation";
    $result=mysqli_query($mysqli,$sql);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $reservationid=$row['reservationid'];
            $categoryname=$row['categoryname'];
            $coursename=$row['coursename'];
            $price=$row['price'];
            $firstname=$row['firstname'];
            $id=$row['id'];
            $courseid=$row['courseid'];
            $date=$row['date'];
            $time=$row['time'];
            ?>
    <tr>
      <th scope="row"><?php echo $reservationid;?></th>
     

      <td><?php echo  $categoryname;?></td>
      <td><?php echo $coursename;?></td>
      <td><?php echo $price;?></td>
      <td><?php echo $firstname;?></td>
      <td><?php echo $id;?></td>
      <td><?php echo  $courseid;?></td>
      <td><?php echo  $date;?></td>
      <td><?php echo  $time;?></td>
      </tr>
        <?php
    }
    }?>
   
  </tbody>
</table>
    </div>
</body>
</html>