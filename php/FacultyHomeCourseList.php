<?php
include "./sqlcon.php";   
$db = new MySQL();
$conn = $db->conn;
session_start();
$_SESSION['course_name'] = $_GET['cid'];
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
    <link rel="stylesheet" href="/css/FacultyHomeCourseList.css">
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
                                                        Attendance List
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
                <?php
$fid = $_SESSION['faculty_id'];
$c = $_GET['cid'];
$sql1 = "SELECT * FROM course WHERE course_id = '$c' ;";
$result = mysqli_query($conn, $sql1);
$coursn = "";
if (!empty(mysqli_num_rows($result))) {
  while ($row = mysqli_fetch_assoc($result)) {
                    $coursn = $row['course_name'];
  }
}
                $_SESSION['course_name'] = $coursn;
?>
                <h5 class="heading5"><?php echo $coursn ?></h5>

                <br><br>
                <table class="table table-bordered whiteBg">
                    <thead>
                        <tr>
                            <th scope="col">SL No.</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Attendance</th>
                            <th scope="col">List of in-charge</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php

                $query = "SELECT * from attendance_list";
                $result = mysqli_query($conn, $query);
                if (!empty(mysqli_num_rows($result))) {
                  while ($row = mysqli_fetch_assoc($result)) { ?>
                            <td> <?php echo $row["slno"]; ?> </td>
                            <td> <?php echo $row["studentID"]; ?> </td>
                            <td> <?php echo $row["studentName"]; ?> </td>
                            <td>
                                <select id="Select" class="form-select">
                                    <option>Present</option>
                                    <option>Absent</option>
                                </select>
                            </td>
                            <td>
                                <?php
                        $sid = $row["studentID"];
                        $course = $_SESSION['course_name'];
                        $query1 = "SELECT * from studenthome where id='$sid' and CourseName = '$course' and rid NOT in (SELECT rid FROM reqt) ";
                        $result1 = mysqli_query($conn, $query1);
                        $courses = array();
                            $faculties = array();

                            $sql = "SELECT * FROM faculty";

                            $resulte = mysqli_query($conn, $sql);
                            if (!empty(mysqli_num_rows($resulte))) {
                              while ($row = mysqli_fetch_assoc($resulte)) {
                                $faculties[$row['faculty_id']] = $row['name'];
                              }
                            }
                        if (!empty(mysqli_num_rows($result1))){
                                  while ($row = mysqli_fetch_assoc($result1)) {
                                    $rs = $row['Reason'];
                                    $id = $row['facultyID'];
                                    $rid = $row['rid'];
                                    $function = <<<EOT
                                    
                                    <script>
                                    function sendReq$rid(){
                                      const chr = new XMLHttpRequest();
                                      chr.open("GET","./insertr.php?rid=$rid");
                                      chr.send();
                                      chr.onload = function() {
                                          const btn =document.getElementById("rb$rid");
                                          btn.disabled = true;
                                          
                                          const stat = JSON.parse(chr.responseText);
                                          if (stat.result){
                                              btn.innerHTML = "Request Success";
                                          } else {
                                              btn.innerHTML = "Request Failed";
                                          }
                                      }
                                  
                                    }
                                        
                                    </script>
                                    EOT;
                                    echo $function;
                                  }
                          ?>

                                <label for="approval">To be approved by:</label>
                                <input disabled id="approval" name="<?php echo $id ?>"
                                    value="<?php echo $faculties[$id] ?>">
                                <br>
                                <div>
                                    <p>Reason: <?php echo $rs ?></p>
                                </div> <button class="btn btn-warning submitBtn" onclick="sendReq<?php echo $rid ?>()"
                                    id="rb<?php echo $rid; ?>" type="submit" value="Request">
                                    Request</button>

                                <?php
                        } else {?>
                            <td> </td>
                            <?php }?>
                        </tr>

                        <?php
                  }
                  // $result->free();
                }
          ?>


                    </tbody>
                </table>
                <div class="col-12 text-center">
                    <input class="btn btn-light submitBtn" type="submit" value="Submit">
                </div>
            </div>
        </div>

</body>

</html>
<?php
} else {
  header("Location: /index.php");
  exit();
}
?>