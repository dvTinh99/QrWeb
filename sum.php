<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qr";
$arr = array();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function query($id,$table){
    GLOBAL $conn ;
    GLOBAL $arr; 
    $sql = "SELECT count($id) as $id  FROM $table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($arr,$row["$id"]);
        // echo $row["$id"];
    }
    } else {
    echo "0 results";
    }
}

query('Number','check_gate');
query('id','nguoidangky');

echo json_encode($arr);
// print_r($arr);
$conn->close();

?>