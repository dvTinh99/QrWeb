<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qr";

$message = $_POST['qr'];
// $message ="ZzPyyRYLMW4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM nguoidangky where maqr = '$message'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $sqlTocheck = "SELECT time_check FROM check_gate where qrCode = '$message'";
  $result1 = $conn->query($sqlTocheck);

  if ($result1->num_rows > 0) {
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
      echo  'Mã đã sử dụng '.$row1["time_check"];
      break ;
    }
  } else {
     //insert to newrecord to check gate for future
  $sql2 = "INSERT INTO check_gate (qrCode)
  VALUES ('$message')";
  if ($conn->query($sql2) === TRUE) {
    while($row = $result->fetch_assoc()) {
      $name = $row["ten_ndk"];
      $sql3 = "UPDATE check_gate SET ten_ndk = '$name' WHERE qrCode = '$message' " ;
      if($conn->query($sql3)===TRUE){
        echo $row["ten_ndk"]. '||'.$row["sdt"].  '||'.$row["email"]. "<br>";
      }else{
        echo 'loi insert name to check table';
      }
      
      break;
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  }

} else {
  echo "false";
}
$conn->close();
?>