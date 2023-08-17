<?php
$sname = "localhost";
$uname = "root";
$pword = "root123";
$db_name = "newAttendance";
$conn = mysqli_connect($sname, $uname, $pword, $db_name, 8111);

if (!$conn) {
    echo "Connection failed";
}