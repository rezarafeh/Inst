<?php
$servername = "localhost";
$username = "root";
$password = "test";  //Your password here
$dbname = "online_attendance";
$id =  $_REQUEST["STID"];
$name =  $_REQUEST["Name"];
$lname =  $_REQUEST["Lname"];
$email =  $_REQUEST["Email"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
  die("Connection failed: " . $conn->connect_error);
$sql = "UPDATE students SET Name=?, Lastname=?, Email=? WHERE STID=?";

if ($stmt = $conn->prepare($sql)) 
    $stmt->bind_param("sssi", $name, $lname, $email, $id);
else
    {
        $error = $conn->errno . ' ' . $conn->error;
        echo $error; 
    }
$stmt->execute();
echo "Student has been successfully deleted!";


$conn->close();
//header("Location:PHPJavaScript.php");