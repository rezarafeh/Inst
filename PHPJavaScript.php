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
$i = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     $rows[$i] = $row;
     $i++;
       }
  } else {
    echo "0 results";
  }
  
?>
<HTML>
<head>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>
    <h1>Student Information</h1>
    <div class=" col-sm-6">
    <table id="student_table" class="table" >
    <thead class="thead-dark">
    <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email </th>
    <th></th>
    </tr>
    </thead>
    </div>
     <script language="JavaScript">  
        
        var result = <?php echo json_encode($rows); ?>;
        let table = document.getElementById("student_table");
        let nrow = table.rows.length;   //Number of rows in the table (1 at the beginning)
        for(i=0; i < result.length; i++){
                table.insertRow(nrow);
                let row = table.rows[nrow];
                let cell1 = row.insertCell(0);
                let cell2 = row.insertCell(1);
                let cell3 = row.insertCell(2);
                let cell4 = row.insertCell(3);
                let cell5 = row.insertCell(4);
                cell1.innerHTML = cell1.innerHTML =  "<div >"+result[i].STID+" </div>";
                cell2.innerHTML = "<div >"+result[i].Name+" </div>";
                cell3.innerHTML = "<div >"+result[i].Lastname+" </div>";
                cell4.innerHTML = "<div >"+result[i].Email+" </div>";
                var x = document.createElement("button");
                x.setAttribute("id", "deletst-"+i);
                x.setAttribute("style", "width:33%");
                x.className="btn"	 ;
                x.innerHTML = '<span class="fa fa-trash"></span>';
                x.onclick = function() {delete_student(table,this);}
                cell5.appendChild(x);
                var y = document.createElement("button");
                y.setAttribute("id", "editst-"+i);
                y.setAttribute("style", "width:33%");
                y.className="btn"	 ;
                y.innerHTML = '<span class="fa fa-pencil"></span>';
                y.onclick = function() {edit_student(table,this);}
                cell5.appendChild(y);
                var z = document.createElement("button");
                z.setAttribute("id", "applyeditst-"+i);
                z.setAttribute("style", "width:33%");
                z.className="btn"	 ;
                z.innerHTML = '<span class="fa fa-check"></span>';
                z.onclick = function() {apply_edit_student(table,this);}
                cell5.appendChild(z);
                        
        } 
      function delete_student(table, element){
        let row = element.parentElement.parentElement;
        let STID = row.cells[0].innerText;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            table.deleteRow(row.rowIndex); // Record has been successfully deleted
  
         }
       };
	
        xmlhttp.open("GET", "deletestudent.php?STID="+STID, true);
        xmlhttp.send();
	
    
      }
      function  edit_student(table, element){
        let row = element.parentElement.parentElement;
        row.cells[1].contentEditable = 'true';
        row.cells[2].contentEditable = 'true';
        row.cells[3].contentEditable = 'true';
              }
      function apply_edit_student(table, element){
        let row = element.parentElement.parentElement;
        row.contentEditable = 'false';
        let STID = row.cells[0].innerText;
        let Name = row.cells[1].innerText;
        let Lname = row.cells[2].innerText;
        let Email = row.cells[3].innerText;
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //table.deleteRow(row.rowIndex); // Record has been successfully deleted
  
         }
       };
	
        xmlhttp.open("GET", "editstudent.php?STID="+STID+"&Name="+Name+"&Lname="+Lname+"&Email="+Email, true);
        xmlhttp.send();
	
    
      }

    </script>
</HTML>