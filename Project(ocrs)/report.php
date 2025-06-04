<?php
require_once('tcpdf/tcpdf/tcpdf.php'); 
include("db/config.php");     


$student_count = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM registration WHERE role='student'"))['total'];
$male_count = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM registration WHERE role='student' AND gender='male'"))['total'];
$female_count = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM registration WHERE role='student' AND gender='female'"))['total'];
$category_count = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM categorytable"))['total'];
$course_count = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM coursetable"))['total'];
$reservation_count = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM reservation"))['total'];
$weekly_count = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM reservation WHERE YEARWEEK(date) = YEARWEEK(CURDATE())"))['total'];
$monthly_count = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM reservation WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())"))['total'];
$popular_category = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT categoryname, COUNT(*) AS total FROM reservation GROUP BY categoryname ORDER BY total DESC LIMIT 1"))['categoryname'] ?? 'N/A';
$popular_course = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT coursename, COUNT(*) AS total FROM reservation GROUP BY courseid ORDER BY total DESC LIMIT 1"))['coursename'] ?? 'N/A';


if (isset($_POST['download_pdf'])) {
    $pdf = new TCPDF();
    $pdf->AddPage();

    $html = "
      
         <h2>Admin Report</h2>
        <ul>
            <li><strong>Total Registered Students:</strong> $student_count</li>
            <li><strong>Male Students:</strong> $male_count</li>
            <li><strong>Female Students:</strong> $female_count</li>
            <li><strong>Total Categories:</strong> $category_count</li>
            <li><strong>Total Courses:</strong> $course_count</li>
            <li><strong>Total Reservations:</strong> $reservation_count</li>
            <li><strong>Weekly Reservations:</strong> $weekly_count</li>
            <li><strong>Monthly Reservations:</strong> $monthly_count</li>
            <li><strong>Most Popular Category:</strong> $popular_category</li>
            <li><strong>Most Enrolled Course:</strong> $popular_course</li>
        </ul>
        
    ";

    $pdf->writeHTML($html);
    $pdf->Output('admin_report.pdf', 'D');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Report</title>
   <link rel="stylesheet" href="reportstyle.css">
</head>
<body>
    <div class="report-div">
    <h2>Report</h2>
        <h3>Total Registered Students</h3> <div class="ansdiv"><p><?= $student_count ?></p></div>
        <h3>Male Students</h3>   <div class="ansdiv"><p><?= $male_count ?></p></div>
        <h3>Female Students</h3> <div class="ansdiv"> <p> <?= $female_count ?></p></div>
        <h3>Total Categories</h3> <div class="ansdiv"> <p> <?= $category_count ?></p></div>
        <h3>Total Courses</h3>  <div class="ansdiv"><p> <?= $course_count ?></p></div>
        <h3>Total Reservations</h3>  <div class="ansdiv"><p> <?= $reservation_count ?></p></div>
        <h3>Weekly Reservations</h3>  <div class="ansdiv"> <p><?= $weekly_count ?></p></div>
        <h3>Monthly Reservations</h3>  <div class="ansdiv"> <p><?= $monthly_count ?></p></div>
        <h3>Most Popular Category</h3>  <div class="ansdiv"> <p><?= $popular_category ?></p></div>
        <h3>Most Enrolled Course</h3>  <div class="ansdiv"> <p><?= $popular_course ?></p></div>
    

    <form method="post">
        <input class="dbtn"type="submit" name="download_pdf" value="Download PDF Report">
    </form>
</div>
</body>
</html>
