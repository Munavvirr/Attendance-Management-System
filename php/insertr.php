<?php
include "./sqlcon.php";

$db = new MySQL();

$conn = $db->conn;

$query = $db->conn->prepare("SELECT facultyID FROM studenthome WHERE rid = ?");

$param = $_GET['rid'];
$query->bind_param("s", $param);
$query->execute();
$result = $query->get_result();

$rid = $param;
$fid = "";


while ($row = $result->fetch_assoc()) {
    $fid = $row['facultyID'];
}

$query = $db->conn->prepare("INSERT INTO reqt (rid,fid) VALUES (?,?)");

$param = $_GET['rid'];
$query->bind_param("ii", $param,$fid);
header("Content-Type: application/json");
if($query->execute()){
    echo json_encode(["result" => true]);
    
}else {
    echo json_encode(["result" => false]);
}
$db->close();
?>