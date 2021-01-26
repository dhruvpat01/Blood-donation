<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'blood';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error){
  die("Connection Failed " . $conn->connect_error);
}

if (isset($_POST['login'])){
  $uname = $_POST['username'];
  $pass = $_POST['password'];

  $fandp = $conn->query("SELECT username, password FROM blood");
  if($fandp->num_rows > 0){
    while($row = $fandp-> fetch_assoc()){
      if ($row['username'] == $uname and $row['password'] == $pass){
          $cookie_exp = time()+60*60*24*30;
          setcookie("username",$uname,$cookie_exp);
          session_start();
          $_SESSION["username"] = $uname;
          header("location:blood.html");
      }
      else
      {
        echo '<script>alert("Wrong credentials.Try again")</script>';
        header("location:Intro.html");

      }
    }
  }
  else {
    echo "No data exists" . "<br>";
  }
}
else{
  header("location:login.html");
}

?>