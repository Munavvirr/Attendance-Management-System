<?php
include "C:\Users\munav\OneDrive\Documents\GitHub\AttendanceSystemNew\db_conn.php";
session_start();
if (isset($_POST['CourseName']) && isset($_POST['DateTime']) && isset($_POST['Reason'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $CourseName = validate($_POST['CourseName']);
    $DateTime = validate($_POST['DateTime']);
    $Reason = validate($_POST['Reason']);
    $facid = Validate($_POST['facName']);
    $sid = $_SESSION['id'];
    $sname = $_SESSION['name'];;

    if ($conn === false) {
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    if (empty($Reason)) {
        header("Location: /php/StudentHome.php?error=Reason is required");
        exit();
    } else if (empty($DateTime)) {
        header("Location: /php/StudentHome.php?error=Date and time is required");
        exit();
    } else {
        $sql = "INSERT INTO studenthome (CourseName, Reason, facultyID, DateTime, id, name) VALUES ('$CourseName','$Reason','$facid', '$DateTime', '$sid', '$sname')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: /php/StudentHome.php?success=Request sent successfully.");
            exit();
        } else {
            header("Location: /php/StudentHome.php?error=Try again!");
            exit();
        }
    }
} else {
    header("Location: /php/StudentHome.php");
    exit();
}