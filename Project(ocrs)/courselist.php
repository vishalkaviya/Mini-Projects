<?php
include("db/configcategory.php"); 
$sql = "SELECT * FROM categorytable";
$result = mysqli_query($mysqlii, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $categoryid = $row['categoryid'];
    
    echo '<a href="/temprory1/dummy1.php?categoryid=' . $categoryid . '">' .  '</a><br>';
}
?>