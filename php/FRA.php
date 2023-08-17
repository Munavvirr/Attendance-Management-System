<?php
include "C:\Users\munav\OneDrive\Documents\GitHub\AttendanceSystemNew\db_conn.php";

if (isset($_POST['Accept'])){
    $query = "SELECT * from reqt, studenthome where reqt.rid = studenthome.rid and status= 'pending'";
                            $result = mysqli_query($conn, $query);
                            if (!empty(mysqli_num_rows($result))) {
                              while ($row = mysqli_fetch_assoc($result)) { ?>
<?php $rid = $row["rid"]; 
                            }}
    $sql = "UPDATE reqt SET status ='Accepted' where rid= '$rid'";
    $result = mysqli_query($conn, $sql);
    header("Location: /php/FacultyRequest.php?success=Request Accepted");
    exit();
} else {
    $query = "SELECT * from reqt, studenthome where reqt.rid = studenthome.rid and status= 'pending'";
    $result = mysqli_query($conn, $query);
    if (!empty(mysqli_num_rows($result))) {
      while ($row = mysqli_fetch_assoc($result)) { ?>
<?php $rid = $row["rid"]; 
    }}
$sql = "UPDATE reqt SET status ='Rejected' where rid= '$rid'";
$result = mysqli_query($conn, $sql);
    header("Location: /php/FacultyRequest.php?error=Request Rejected");
    exit();
}?>