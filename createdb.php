<?php
$servername = "localhost";
$username = "root";
$password = "";

$connection = new mysqli($servername , $username, $password); // create connection
//check conection
if($connection->connect_error)
{
    die("Connection Failed:".$conection->connect_error);
}
echo "Connected Successfully<br>";

//creating database
$sql = "CREATE DATABASE StockLabels";

 if($connection->query($sql) === TRUE)
 {
    echo "DATABASE CREATED SUCCESSFULLY";
 }
 else {
    echo "ERROR CREATING DATABASE" . $connection->error;
  }
  $connection->close();
?>

