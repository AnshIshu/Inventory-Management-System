<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>
<body>
  
</body>
</html>
<?php
session_start();
//include "header.php";
$_SESSION["status"]=false;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LoginUsers";
//function to remove spaces and provide security
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//condition to check whether any input is given by the user or not and if yes then the email is valid aur not.
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    echo "<br><h1>$emailErr</h1>";
  } else {
    $email = test_input($_POST["email"]);
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
   {
        echo "<h3>Invalid email format</h3>";
    
  }
}
  
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//*taking varaibles with $_POST bcause $_SESSION are not set yet.
if(isset($_POST["submit"]))
{
    $email = $_POST["email"];                //*
    //echo "your email is :$email<br>";
    $password = $_POST["password"];        //*
    //echo "Password is :$password";

    
 $sql = 'SELECT email, password FROM ValidUsersTable WHERE email = "'.$email.'" && password = "'.$password.'"';

if(!$result = $conn->query($sql))   {
    die("Error message: %s\n". $conn->error);
}

if ($result->num_rows > 0)
 {
    
    
    //set session variables

    $_SESSION["email"]=$email;
    $_SESSION["password"]=$password;
   $_SESSION["status"]=true;
    include "header.php";
    echo "<br><h3>YOU ARE A VALIDATED USER</h3>";
    echo "<h3>SUCCESSFULLY LOGIN</h3>";
    echo "YOUR EMAIL ADDRESS IS : $email";
    
    
 }
 else
 {
  echo "<br><h3>Sorry, your credentials are not valid,please try  again</h3>";
  //$_SESSION["status"]=false;
 }
 
}
$conn->close();

?>
