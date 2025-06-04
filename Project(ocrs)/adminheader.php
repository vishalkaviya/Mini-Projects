<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin header</title>
    <style>
        *{
            padding: 0px;
            margin: 0px;
        }

        .headerdiv{
            background-color: rgb(19, 19, 54);
            height: 80px;
            display: flex;
            color: white;
            justify-content: space-evenly;
            padding-top: 40px;
            font-family: Arial, Helvetica, sans-serif;
        }
        .adimg{
            height: 80px;
            width: 80px;
            border-radius: 50%;
            margin-top: -20px;
           
        }
        .select{
            height: 50px;
            width: 110px;
            background-color: rgb(218, 179, 235);
            border-radius: 10px;
            border-color:rgb(218, 179, 235) ;
            border-width: 1px;
            border-style: solid;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            cursor: pointer;
        }
        .add{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }
        a{
            text-decoration: none;
           color: white;
           cursor: pointer;
        }
        a:hover{
            color: gray;
        }
    </style>
</head>
<body>
   <div class="headerdiv">
    <h2><a href="home.php">Home</a></h2>
    <h2><a href="userdetail.php">Users</a></h2>
    <h2><a href="admincategory.php">Category</a></h2>
    <h2><a href="admincourse.php">Course</a></h2>
    <h2><a href="feedback.php">Reviews</a></h2>
    <h2><a href="adminreserve.php">Reservations</a></h2>
    <h2><a href="report.php">Report</a></h2>
    <select onchange="location=this.value;"class="select" name="action" id="action">
        <option value="">--ADD--</option>
        <option value="/pkkpro/addcategory.php">Category</option>
        <option value="/pkkpro/addcourse.php">Course</option>
    </select>
    <a href="admin.php"><img class="adimg"src="ad.png"></div></a>
   </div> 
</body>
</html>
