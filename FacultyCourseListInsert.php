<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>

    <?php
    session_start();
    // servername => localhost
    // username => root
    // password => empty
    // database name => staff
    $conn = mysqli_connect("localhost", "root", "root123", "wa", 8111);

    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    // Taking all 5 values from the form data(input)
    $list_of_incharge = $_POST['list_of_incharge'];
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
    $attendance = $_POST['attendance'];

    // We are going to insert the data into our sampleDB table
    $sql = "INSERT INTO attendance VALUES ('$id','$name','$attendance','$list_of_incharge')";

    // Check if the query is successful
    if (mysqli_query($conn, $sql)) {
        echo "<h3>data stored in a database successfully."
            . " Please browse your localhost php my admin"
            . " to view the updated data</h3>";
    } else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
    ?>
</body>

</html>