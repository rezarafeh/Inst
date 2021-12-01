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
// echo "Successfully Connection to the databse!";
$sql = "SELECT * FROM students" ; 
$stmt = $conn->prepare($sql); 
$stmt->execute();
$result = $stmt->get_result();
  
  if ($result->num_rows > 0) {
  ?>
  <table >
      <thead>
        <tr>
          <th> ID </th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email </th>
        </tr>
      </thead>
      <tbody>
      <?php
    // output data of each row
    while($row = $result->fetch_assoc()) {?>
    <tr>
          <td><?php echo $row["STID"]; ?></td>
          <td><?php echo $row["Name"]; ?></td>
          <td><?php echo $row["Lastname"]; ?></td>
          <td><?php echo $row["Email"]; ?></td>
        </tr>
     <?php
    }
  } else {
    echo "0 results";
  }

  $conn->close();
  
?>