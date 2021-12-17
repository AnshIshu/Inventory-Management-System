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

  
$sql = "INSERT INTO salestable(id,qty,customer,discount,datime)
VALUES ('15','100','customer 1','500', now() );";

$sql .= "INSERT INTO salestable(id,qty,customer,discount,datime)
VALUES ('15','100','customer 2','600', now() );";

$sql .= "INSERT INTO salestable(id,qty,customer,discount,datime)
VALUES ('16','105','customer 1','510', now() );";

$sql .= "INSERT INTO salestable(id,qty,customer,discount,datime)
VALUES ('17','90','customer 1','610', now() );";

$sql .= "INSERT INTO salestable(id,qty,customer,discount,datime)
VALUES ('17','80','customer 2','530', now() );";

$sql .= "INSERT INTO salestable(id,qty,customer,discount,datime)
VALUES ('17','110','customer 3','620', now() );";

$sql .= "INSERT INTO salestable(id,qty,customer,discount,datime)
VALUES ('18','150','customer 1','550', now() );";

$sql .= "INSERT INTO salestable(id,qty,customer,discount,datime)
VALUES ('19','50','customer 1','635', now() );";

$sql .= "INSERT INTO salestable(id,qty,customer,discount,datime)
VALUES ('20','65','customer 1','480', now() );";

$sql .= "INSERT INTO salestable(id,qty,customer,discount,datime)
VALUES ('21','90','customer 1','450', now() )";

if($conn->multi_query($sql)===true)
{
    echo "DATA INSERTED SUCCESSFULLY";
}
else
{
    echo "ERROR IN INSERTING DATA".$conn->error;
}


$conn->close();
?>