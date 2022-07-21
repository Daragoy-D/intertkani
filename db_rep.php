<?php
include_once('dbcon.php');

$query = 'SELECT * FROM `product`';
$result = mysql_query($query);
$n = 0;
while ($row = mysql_fetch_array($result)){
	$search_name = str_replace('<br>', ' ', $row['name']);
	if (($row['category'] <> '') AND ($row['category'] <> 'n/a')){ $search_name = $search_name.' '.$row['category']; }
	if (($row['sub_category'] <> '') AND ($row['sub_category'] <> 'n/a')){ $search_name = $search_name.' '.$row['sub_category']; }
	if (($row['type'] <> '') AND ($row['type'] <> 'n/a')){ $search_name = $search_name.' '.$row['type']; }
	if (($row['sub_type'] <> '') AND ($row['sub_type'] <> 'n/a')){ $search_name = $search_name.' '.$row['sub_type']; }
	if (($row['vid'] <> '') AND ($row['vid'] <> 'n/a')){ $search_name = $search_name.' '.$row['vid']; }
	if (($row['sub_vid'] <> '') AND ($row['sub_vid'] <> 'n/a')){ $search_name = $search_name.' '.$row['sub_vid']; }
	$search_name = $search_name.' '.$row['sostav'];
	$search_name = $search_name.' '.$row['proizvoditel'];
	$search_name = $search_name.' '.$row['naznachenie'];
	$search_name = str_replace(' для ', ' ', $search_name);
	$search_name = str_replace(' Для ', ' ', $search_name);
	$search_name = str_replace('Для ', ' ', $search_name);
	$search_name = str_replace(' для ', ' ', $search_name);
	$n = $n + 1;
	$id=$row['id'];
	echo $search_name." - ".$n."<br>";
	mysql_query("UPDATE `product` SET search_name='$search_name' WHERE id='$id'");
}


?>

