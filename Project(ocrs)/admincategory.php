<?php
 include("db/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>courseadditionpage</title>
    <link rel="stylesheet" href="admincatstyleyyyy.css">
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
        
        <div class="container">
    <table class="table1">
    <?php
    if(isset($_POST['submit']))
    {
      $search=$_POST['search'];
      $sql = "SELECT * FROM categorytable  WHERE categoryid LIKE '%$search%'  OR categoryname LIKE '%$search%'";
       $result=mysqli_query($mysqli,$sql);
      if($result)
      {
        if(mysqli_num_rows($result)>0){
          echo 
          '<thead>
    <tr>
      <th scope="col">CategoryID</th>
      <th scope="col">CategoryName</th>
      <th scope="col">CategoryImage</th>
      <th scope="col">CategoryIntroduction</th>
      <th scope="col">CategoryDescription</th>
      <th scope="col">CategoryVideoDesc</th>
      <th scope="col">Categoryvdo</th>
      <th scope="col">Operation</th>
    

    </tr>
  </thead>';
  while($row=mysqli_fetch_assoc($result)){
  echo'<tbody>
  <tr>
  <td>'.$row['categoryid'].'</td>
  <td>'.$row['categoryname'].'</td>
  <td>'.$row['categoryimage'].'</td>
  <td>'.$row['categoryintro'].'</td>
  <td>'.$row['categorydesc'].'</td>
  <td>'.$row['categoryvdodesc'].'</td>
  <td>'.$row['categoryvdo'].'</td>
 <td> <button class="upbtn"><a class="update" href="updatecategory.php?updatecategoryid='. $row['categoryid'].'">Update</a></button>
    <button class="dltbtn"><a class="delete"href="deletecategory.php?deletecategoryid='.$row['categoryid'].'">Delete</a></button>
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
        <button class="add"><a href="addcategory.php" style="text-decoration: none;color:white;">Add category</a></button>
        <table class="table2">
  <thead>
    <tr>
      <th scope="col">Category ID</th>
      <th scope="col">CategoryName</th>
      <th scope="col">CategoryImage</th>
      <th scope="col">CategoryIntroduction</th>
      <th scope="col">CategoryDescription</th>
      <th scope="col">CategoryvdoDescription</th>
      <th scope="col">Categoryvideo</th>
      <th scope="col">Operations</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * FROM categorytable";
    $result=mysqli_query($mysqli,$sql);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $categoryid=$row['categoryid'];
            $categoryname=$row['categoryname'];
            $categoryimage=$row['categoryimage'];
            $categoryintro=$row['categoryintro'];
            $categorydesc=$row['categorydesc'];
            $categoryvdodesc=$row['categoryvdodesc'];
            $categoryvdo=$row['categoryvdo'];
            ?>
    <tr>
      <th scope="row"><?php echo $categoryid;?></th>

      <td><?php echo $categoryname;?></td>
      <td><?php echo $categoryimage;?></td>
      <td><?php echo $categoryintro;?></td>
      <td><?php echo $categorydesc;?></td>
      <td><?php echo $categoryvdodesc;?></td>
      <td><?php echo $categoryvdo;?></td>
      <td>
      <button class="upbtn"><a class="update" href="updatecategory.php?updatecategoryid=<?php echo $categoryid;?>">Update</a></button>
    <button class="dltbtn"><a class="delete"href="deletecategory.php?deletecategoryid=<?php echo $categoryid;?>">Delete</a></button>
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