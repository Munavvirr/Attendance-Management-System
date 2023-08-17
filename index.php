<!DOCTYPE html>
<html>
<head>
    <title>Login Page </title>
    <link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2> Login </h2>
        <?php if (isset($_GET['error'])) {?>
            <p class = "error"><?php echo $_GET['error'];?></p>
        <?php } ?>
        <label> Username </label>
        <input type ="text" name="uname" placeholder="Username">
        <br><label> Password </label>
        <input type ="password" name="pword" placeholder ="Password">
        <br><button type="Submit">Login</button>
    </form>
</body>
</html>