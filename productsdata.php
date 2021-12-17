<?php

$mysqli = new mysqli("localhost", "root", "", "categories");

// $query = "SELECT DISTINCT * FROM category  join  producttable on producttable.id=category.id";


$query = "SELECT producttable.product_id,  category.title ,producttable.product_name, producttable.sp, producttable.cp, producttable.avlstock
FROM producttable
INNER JOIN category ON producttable.cat_id=category.id";

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
?>