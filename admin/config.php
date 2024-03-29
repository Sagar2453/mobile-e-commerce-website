<?php
$servername ="localhost";
$uname = "root";
$pass = "";
$db = "mobile_project";
$conn = new mysqli($servername,$uname,$pass,$db);
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

?>  