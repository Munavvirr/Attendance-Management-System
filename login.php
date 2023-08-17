<?php
include "C:\Users\munav\OneDrive\Documents\GitHub\AttendanceSystemNew\db_conn.php";
session_start();
if (isset($_POST['uname']) && isset($_POST['pword'])) {
    print_r($_POST);
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $pword = validate($_POST['pword']);

    if (empty($uname)) {
        header("Location: /index.php?error=Username is required");
        exit();
    } else if (empty($pword)) {
        header("Location: /index.php?error=Password is required");
    } else {
        $sql1 = "SELECT * FROM faculty WHERE username = '$uname' AND password = '$pword' ";
        $result1 = mysqli_query($conn, $sql1);
        $sql2 = "SELECT * FROM student WHERE username = '$uname' AND password = '$pword' ";
        $result2 = mysqli_query($conn, $sql2);
        $sql3 = "SELECT * FROM admin WHERE username = '$uname' AND password = '$pword' ";
        $result3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($result1) === 1) {
            $row = mysqli_fetch_assoc($result1);
            if ($row['username'] === $uname && $row['password'] === $pword) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['faculty_id'] = $row['faculty_id'];
                header("Location: /php/FacultyHome.php");
                exit();
            } else {
                header("Location: /index.php?error=Incorrect username or password!");
                exit();
            }
        } else if (mysqli_num_rows($result2) === 1) {
            $row = mysqli_fetch_assoc($result2);
            if ($row['username'] === $uname && $row['password'] === $pword) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: /php/StudentHome.php");
                exit();
            } else {
                header("Location: /index.php?error=Incorrect username or password!");
                exit();
            }
        }

        else if (mysqli_num_rows($result3) === 1) {
            $row = mysqli_fetch_assoc($result3);
            if ($row['username'] === $uname && $row['password'] === $pword) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['a_name'] = $row['a_name'];
                $_SESSION['admin_id'] = $row['admin_id'];
                header("Location: /php/adminHome.php");
                exit();
            } else {
                header("Location: /index.php?error=Incorrect username or password!");
                exit();
            }
        }
        
        
        else {
            header("Location: /index.php?error=Incorrect username or password!");

            exit();
        }
    }
} else {
    print_r($_POST);    
    header("Location: /index.php");
    exit();
}