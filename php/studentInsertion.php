<?php
include "C:\Users\munav\OneDrive\Documents\GitHub\AttendanceSystemNew\db_conn.php";
session_start();
if (isset($_POST['StudentName']) && isset($_POST['StudentID'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $StudentName = validate($_POST['StudentName']);
    $StudentID = validate($_POST['StudentID']);
    $uname = validate($_POST['uname']);
    $pword = validate($_POST['pword']);
    
    

    if ($conn === false) {
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    if (empty($StudentName)){
        header("Location: /php/StudentInsert.php?error=Student Name is required");
        exit();
    } else if (empty($StudentID)) {
        header("Location: /php/StudentInsert.php?error=Student ID is required");
        exit();
    } else if (empty($uname)) {
        header("Location: /php/StudentInsert.php?error=Username is required");
        exit();
    } else if (empty($pword)) {
        header("Location: /php/StudentInsert.php?error=Password is required");
        exit();
    } else  {
        $sql = "INSERT INTO student VALUES ('$StudentID', '$uname', '$pword', '$StudentName')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header("Location: /php/StudentInsert.php?success=Student added successfully.");
            exit();
        } else {
            header("Location: /php/StudentInsert.php?error=Try again!");
            exit();
        }
    }
} else {
    header("Location: /php/StudentInsert.php");
    exit();
}
?>