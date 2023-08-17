<?php
include "C:\Users\munav\OneDrive\Documents\GitHub\AttendanceSystemNew\db_conn.php";
session_start();
if (isset($_POST['FacultyName']) && isset($_POST['FacultyID'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $FacultyName = validate($_POST['FacultyName']);
    $FacultyID = validate($_POST['FacultyID']);
    $uname = validate($_POST['uname']);
    $pword = validate($_POST['pword']);
    
    

    if ($conn === false) {
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    if (empty($FacultyName)){
        header("Location: /php/FacultyInsert.php?error=Faculty Name is required");
        exit();
    } else if (empty($FacultyID)) {
        header("Location: /php/FacultyInsert.php?error=Faculty ID is required");
        exit();
    } else if (empty($uname)) {
        header("Location: /php/FacultyInsert.php?error=Username is required");
        exit();
    } else if (empty($pword)) {
        header("Location: /php/FacultyInsert.php?error=Password is required");
        exit();
    } else  {
        $sql = "INSERT INTO faculty VALUES ('$FacultyID', '$uname', '$pword', '$FacultyName')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header("Location: /php/FacultyInsert.php?success=Faculty added successfully.");
            exit();
        } else {
            header("Location: /php/FacultyInsert.php?error=Try again!");
            exit();
        }
    }
} else {
    header("Location: /php/FacultyInsert.php");
    exit();
}
?>