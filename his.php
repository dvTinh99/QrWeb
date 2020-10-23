<?php
class ndk
{
    public $name ;
    public $time;
    public function __construct($name,$time){ 
        $this->name = $name;
        $this->time = $time;
    } 
    public function init($name,$time){
        $this->name = $name;
        $this->time = $time;
    }
    public function getName(){
        return $this->name ;
    }
    public function getTime(){
        return $this->time;
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qr";
$arr = [] ;

// $message ="ZzPyyRYLMW4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ten_ndk,time_check FROM check_gate ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $person = new ndk($row['ten_ndk'],$row['time_check']);
     
      array_push($arr,$person);
    }
}

echo json_encode($arr);
// print_r($arr);
$conn->close();

?>