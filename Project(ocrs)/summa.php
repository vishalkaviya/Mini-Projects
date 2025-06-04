<?php
 include("db/configcategory.php");
// ...

// Retrieve courses for the category
if (isset($_GET['categoryid'])) {

    $categoryid = intval($_GET['categoryid']);
$sql = "SELECT coursetable.* FROM coursetable WHERE coursetable.categoryid = $categoryid";
$result = mysqli_query($mysqlii, $sql);
$courses = [];
while ($row = mysqli_fetch_assoc($result)) {
    $courses[] = $row;
}

// Print category information
?>
<div class="maindiv">
    <div class="introdiv">
        <?php echo "<h1 style='padding-top:30px;'>" . $category["categoryname"] . "</h1>"; ?>
    </div>
    <?php echo "<img src='" . $category["categoryimage"] . "' alt='Category Image'>"; ?>
    <h2>Category Introduction</h2>
    <?php echo "<p>" . $category["categoryintro"] . " </p>"; ?>
    <h2>Course Description</h2>
    <?php echo "<p>" . $category["categorydesc"] . " </p>"; ?>
    <h2>Introduction Video</h2>
    <?php echo "<p>" . $category["categoryvdodesc"] . " </p>"; ?>
    <?php if (!empty($category["categoryvdo"]) && file_exists($category["categoryvdo"])) { ?>
        <video width="100%" height="400" controls>
            <source src="<?php echo $category["categoryvdo"]; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php } else { ?>
        <p style="color:red">Video not found</p>
    <?php } ?>
    <h2>Available Courses</h2>
    <ul>
        <?php foreach ($courses as $course) { ?>
            <li><?php echo $course["coursename"]; ?></li>
            <?php }} ?>
    </ul>
</div>