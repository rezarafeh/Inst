<?php
$servername = "localhost";
$username = "root";
$password = "test";  //Your password here
$dbname = "online_attendance";
$id =  $_REQUEST["STID"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
  die("Connection failed: " . $conn->connect_error);
$sql = "DELETE FROM students WHERE STID=?";

if ($stmt = $conn->prepare($sql)) 
    $stmt->bind_param("i", $id);
else
    {
        $error = $conn->errno . ' ' . $conn->error;
        echo $error; 
    }
$stmt->execute();
echo "Student has been successfully deleted!";


$conn->close();
//header("Location:PHPJavaScript.php");