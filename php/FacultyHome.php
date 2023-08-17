<?php
include "./sqlcon.php";
session_start();
$db = new MySQL();
$conn = $db->conn;
if (isset($_SESSION['faculty_id']) && isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amity Attendance System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/FacultyHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 colLeft">
                <div class="imgCenter">
                    <img src="/images/amity logo 2.png" width="250px" height="80px">
                </div>

                <nav class="navbar navbar-expand-lg navbar-dark bs-side-navbar gutterTopNLeftPad">

                    <button class="navbar-toggler btnPos" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">

                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <div class="row gy-3 gx-5">
                                    <div class="col-3">
                                        <div class="p-3">
                                            <img src="/images/True.png">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="p-3">
                                            <a class="p1" href="/php/FacultyHome.php">Home</a>
                                        </div>
                                    </div>
                                    <hr />
                            </li>

                            <li class="nav-item">
                                <div class="row gy-3 gx-5">
                                    <div class="col-3">
                                        <div class="p-3">
                                            <img src="/images/Vector2.png">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="p-3">
                                            <a class="p1" href="/php/FacultyRequest.php">Requests</a>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </li>




                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </ul>
                    </div>
                </nav>
            </div>

            <!-- Right Column -->

            <div class="col-xl-9 RightColMain">

                <div class="content4 p-3">
                    <div class="container px-0">
                        <div class="row gx-0">
                            <div class="col-12 col-xl-6">
                                <div class="p-3">

                                    <div class="container px-xl-0 px-3  d-flex justify-content-xl-start">
                                        <div class="row gx-0">
                                            <div class="col-2 col-xl-2">
                                                <div class="p-3">
                                                    <img src="/images/Vector1.png">
                                                </div>
                                            </div>
                                            <div class="col-10 col-xl-10">
                                                <div class="p-3">
                                                    <a id="textBlack" href="#">
                                                        Home
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="hrLine">
                                </div>
                            </div>
                            <div class="col-xl-3 col-6">
                                <div class="p-xl-3">
                                    <div class="container px-0 d-flex justify-content-xl-end">
                                        <div class="row gx-1 gx-xl-5">
                                            <div class="col-6">
                                                <div class="p-3">
                                                    <img src="/images/Notification.png">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-3">
                                                    <a href="./logout.php"><img src="/images/logout.jpeg"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-3 col-6">
                                <div class="p-xl-3">
                                    <div class="col moveLeft">
                                        <div class="container px-0 px-xl-1 d-flex justify-content-xl-end">
                                            <div class="row gx-0">
                                                <div class="col-6">
                                                    <div class="">
                                                        <img src="/images/Mask Copy.png">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="p3 p-3">
                                                        <?php echo $_SESSION['name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div>
                    <p class="notifications">
                        No new Notifications
                    </p>
                    <br>
                    <div class="courseDiv">
                        <p class="courseList">
                            Course List
                        </p>
                        <?php

              // if ($_SESSION['name'] == 'Seville') {
              //   echo '<div class="container text-center">
              //   <div class="row">
              //     <div class="col-6" id="colBg2">
              //       <a href="FacultyHomeCourseList.php"><button type="button" class="btn roundBtn">R Programming</button></a>
              //     </div>
              //     <div class="col-6" id="colBg2">
              //       <a href="/php/FacultyHCList_Cprog.php"><button type="button" class="btn roundBtn">Introduction to C Programming</button></a>
              //     </div>
              //   </div>';
              // } elseif ($_SESSION['name'] == 'Steve Johnson') {
              //   echo '<p class="para1">No courses available</p>';
              // } elseif ($_SESSION['name'] == 'Dr.Ved Prakash Mishra') {
              //   echo '<div class="row">
              //     <div class="col-12" id="colBg2">
              //       <a href="FacultyHCList_TOC.php"><button type="button" class="btn roundBtn">Theory of Computation</button></a>
              //     </div>';
              // }
              ?>

                        <?php
              $fid = $_SESSION['faculty_id'];
              $sql = "SELECT * FROM course WHERE faculty_id = '$fid' ";

              $result = mysqli_query($conn, $sql);?>
                        <div class="row">
                            <?php if (!empty(mysqli_num_rows($result))) {
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                            <div class="col-4" id="colBg2">
                                <button type="button" class="btn roundBtn"
                                    onclick="onc<?php echo $row['course_id']; ?>()"><?php echo $row['course_name']; ?></button>
                            </div>

                            <script>
                            function onc<?php echo $row['course_id']; ?>() {
                                window.location = "FacultyHomeCourseList.php?cid=<?php echo $row['course_id']; ?> ";
                            }
                            </script>

                            <?php
                            
                }
                
              } else {
                echo "No courses";
              }
              ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>
<?php
} else {
  $db->close();
  header("Location: http://localhost:56578/index.php");
  exit();
}
?>