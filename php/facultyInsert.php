<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {

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
                                            <a class="p1" href="/php/AdminHome.php">Home</a>
                                        </div>
                                    </div>
                                    <hr />
                            </li>


                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
                                                    <img src="/images/Message.png">
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
                                                    <div class="p3 p-2">
                                                        <?php echo $_SESSION['a_name']; ?>
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
                <h5 class="text-center ">Faculty Details</h5>
                <?php if (isset($_GET['error'])) {?>
                <p class="error"><?php echo $_GET['error'];?></p>
                <?php } ?>
                <?php if (isset($_GET['success'])) {?>
                <p class="success"><?php echo $_GET['success'];?></p>
                <?php } ?>
                <form action="/php/FacultyInsertion.php" method="post" class="p-5">
                    <div class="row mb-4">
                        <div class="col-6 gx-5">
                            <label class="form-label"> Faculty Name </label>
                            <br> <input type="text" name="FacultyName" placeholder="FacultyName" class="form-control">
                        </div>
                        <div class="col-6 gx-5">
                            <label class="form-label"> Faculty ID </label> <br>
                            <input type="text" name="FacultyID" placeholder="FacultyID" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 gx-5">
                            <label class="form-label"> Username </label> <br>
                            <input type="text" name="uname" placeholder="Username" class="form-control">
                        </div>
                        <div class="col-6 gx-5">
                            <label class="form-label"> Password </label><br>
                            <input type="password" name="pword" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <br><br>

                    <div class="col-12 text-center">
                        <br><button type="Submit" class="btn btn-light submitBtn">Insert</button>
                    </div>
                </form>
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