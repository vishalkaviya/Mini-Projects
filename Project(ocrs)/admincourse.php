<?php
 include("db/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>courseadditionpage</title>
    <link rel="stylesheet" href="admincstyleyy.css">
    
</head>
<header>
<?php

include("adminheader.php");
?>
</header>
<body>
    
    <form method="POST">
        <input type="text" name="search" class="search"placeholder="   search...">
        <button class="submit" name="submit">search</button>
    
    
        <div class="container">
        
    <table class="table1">
    <?php
    if(isset($_POST['submit']))
    {
      $search=$_POST['search'];
      $sql = "SELECT * FROM coursetable  WHERE courseid LIKE '%$search%'  OR coursename LIKE '%$search%' 
            OR price LIKE '%$search%'";
      $result=mysqli_query($mysqli,$sql);
      if($result)
      {
        if(mysqli_num_rows($result)>0){
          echo 
          '<thead>
    <tr>
      <th scope="col">CourseID</th>
      <th scope="col">CategoryID</th>
      <th scope="col">CourseName</th>
      <th scope="col">CourseImage</th>
      <th scope="col">CourseIntroduction</th>
      <th scope="col">CourseDescription</th>
      <th scope="col">CourseVideoDesc</th>
      <th scope="col">Coursevdo</th>
      <th scope="col">Price</th>
      <th scope="col">Operation</th>
    

    </tr>
  </thead>';
  while ($row = mysqli_fetch_assoc($result)){
  
  echo'<tbody>
  <tr>
  <td>'.$row['courseid'].'</td>
  <td>'.$row['categoryid'].'</td>
  <td>'.$row['coursename'].'</td>
  <td>'.$row['courseimage'].'</td>
  <td>'.$row['courseintro'].'</td>
  <td>'.$row['coursedesc'].'</td>
  <td>'.$row['vdodesc'].'</td>
  <td>'.$row['coursevdo'].'</td>
  <td>'.$row['price'].'</td>
  <td> <button class="upbtn"><a class="update" href="updatecourse.php?updatecourseid='. $row['courseid'].'">Update</a></button>
    <button class="dltbtn"><a class="delete"href="deletecourse.php?deletecourseid='.$row['courseid'].'">Delete</a></button>
  </td>
  
  </tr>
  </tbody>';
  }
        }
        else{
          echo "<h2 style='color:red;margin-left:300px;margin-top:20px;'>Data not Found</h2>";
      }
      }
    }
     ?> 
 <?php
    if(isset($_GET['msg'])){
       echo "<p style='margin-top:30px;color:green;font-size:20px;text-align:center;font-weight:bold;'>".$_GET['msg']."</p>";
   }?>     
  </table>
</div>

    <div class="add-container">
        <button class="add"><a href="addcourse.php" style="text-decoration: none;color:white;">Add course</a></button>
        <table class="table2">
  <thead>
    <tr>
      <th scope="col">Course ID</th>
      <th scope="col">Category ID</th>
      <th scope="col">CourseName</th>
      <th scope="col">CourseImage</th>
      <th scope="col">CourseIntroduction</th>
      <th scope="col">CourseDescription</th>
      <th scope="col">CoursevdoDescription</th>
      <th scope="col">Coursevideo</th>
      <th scope="col">price</th>

      <th scope="col">Operations</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * FROM coursetable";
    $result=mysqli_query($mysqli,$sql);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $courseid=$row['courseid'];
            $categoryid=$row['categoryid'];
            $coursename=$row['coursename'];
            $courseimage=$row['courseimage'];
            $courseintro=$row['courseintro'];
            $coursedesc=$row['coursedesc'];
            $vdodesc=$row['vdodesc'];
            $coursevdo=$row['coursevdo'];
            $courseprice=$row['price'];
            ?>
    <tr>
      <th scope="row"><?php echo $courseid;?></th>
      <th scope="row"><?php echo $categoryid;?></th>

      <td><?php echo $coursename;?></td>
      <td><?php echo $courseimage;?></td>
      <td><?php echo $courseintro;?></td>
      <td><?php echo $coursedesc;?></td>
      <td><?php echo $vdodesc;?></td>
      <td><?php echo $coursevdo;?></td>
      <td><?php echo $courseprice;?></td>
      <td>
      <button class="upbtn"><a class="update" href="updatecourse.php?updatecourseid=<?php echo $courseid;?>">Update</a></button>
    <button class="dltbtn"><a class="delete"href="deletecourse.php?deletecourseid=<?php echo $courseid;?>">Delete</a></button>
        </td>
    </tr>
        <?php
    }
    }?>
   
  </tbody>
</table>
    </div>
    </form>
</body>
</html>