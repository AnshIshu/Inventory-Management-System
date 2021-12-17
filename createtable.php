<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "categories";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
{
    die("connection failed :".$conn->connect_error);
}

$sql = "CREATE TABLE producttable(product_id int(6)  UNSIGNED PRIMARY KEY not null AUTO_INCREMENT, cat_id int(6) unsigned,  product_name varchar(30), sp int(10), cp int(10), avlstock int(10) )";
if ($conn->query($sql) === TRUE) {
    echo "Table  created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
  $conn->close();
?>