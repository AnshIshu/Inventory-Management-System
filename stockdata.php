<?php 
$mysqli = new mysqli("localhost", "root", "", "categories");


$query = "SELECT  producttable.product_name, producttable.sp, producttable.avlstock, stocktable.Discount, stocktable.Tax,
 producttable.cp*producttable.avlstock-stocktable.Discount*(stocktable.tax/100) as 'Total Price', stocktable.supplier
from stocktable
inner join producttable on producttable.product_id=stocktable.id  ";

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