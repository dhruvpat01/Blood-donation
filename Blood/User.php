<?php

    session_start();

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "blood";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
 
 $conn = OpenCon();
 if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}



$sql3 = "SELECT * FROM blood";  
$result = $conn->query($sql3);
if ($result->num_rows> 0) {
  while($row = $result->fetch_assoc()) {
    if($_SESSION["username"] == $row["Username"])
    {
        echo "<br><br><br><br>Name: " . $row["Name"]. ",<br><br> Gender: " . $row["Gender"]. ",<br><br> Age: " . $row["Age"].",<br><br> Blood: " . $row["Blood"].",<br><br> Mobile: ". $row["Mobile"]. ",<br><br> Email: ". $row["Email"]. ",<br><br> Address: " . $row["Address"]. ",<br><br> City: ". $row["City"]. ",<br><br> Username: " . $row["Username"]. "<br><br>";
    }
  }
}

echo "<a href = 'blood.html'>Go back</a>";


CloseCon($conn);

?>