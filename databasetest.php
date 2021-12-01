<?php
$servername = "localhost";
$username = "root";
$password = "test";
$dbname = "online_attendance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
  die("Connection failed: " . $conn->connect_error);
else 
  echo "Successfully Connection to the databse!";
  try {
  $sql = "CREATE TABLE enrollments_new (
    STID int NOT NULL,
    MID VARCHAR(10) NOT NULL,
    Block int,
    PRIMARY KEY (STID,MID),
    FOREIGN KEY (STID) REFERENCES students(STID),
    FOREIGN KEY (MID)  REFERENCES modules(MID)
)";
  $conn->query($sql);
  echo "Database and table users created successfully.";
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}




$conn->close();
?>