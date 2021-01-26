<?php

    // $id=$_POST["id"];
    $fn=$_POST["name"];
    $gender=$_POST["gender"];
    $age=$_POST["age"];
    $blood=$_POST["blood"];
    $mobile=$_POST["mobile"];
    $email=$_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $date = $_POST["date"];
 

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
else
 echo "Connected Successfully<br>";


$sql1="INSERT INTO booking SET name='$fn', gender='$gender', age='$age', Blood='$blood', mobile='$mobile', email='$email', address='$address', city='$city', date='$date'";
if($conn->query($sql1) === true){
    echo "Inserted into table successfully.<br>";
} else{
    echo "ERROR: Could not able to execute $sql1. " . $conn->error;
}

CloseCon($conn);



header("location:success.html");

?>