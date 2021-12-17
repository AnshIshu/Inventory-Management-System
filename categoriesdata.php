<?php

$mysqli = new mysqli("localhost", "root", "", "categories");

$query = "SELECT * FROM category ORDER BY id ASC";

$result = $mysqli->query($query);

if(!$result)
	die($mysqli->error);
$json = new stdClass();
$json->data = array();
/* fetch associative array */
while ($row = $result->fetch_row()) :
    $json->data[] = $row;

endwhile;

echo json_encode($json);

exit;
/*
$number = count($_POST["addtitle"]);
if(number>1)
{
    for($i=0; $i<$number;$i++)
    {
        if(trim($_POST["addtitle"][$i])!=' ')
        {
            $sql  = "INSERT INTO titletable(addtitle) VALUES('".mysqli_real_escape_string($mysqli,$_POST["addtitle"][$i]."'))  ";`
            mysqli_query($conn,$sql);
        }
    }
}*/
?>