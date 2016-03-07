<?php

if(isset($_GET['priceUpdate'])){

	require_once("../db.php");

	$proid=$_GET['_id'];
	$itemprice=$_GET['itemprice'];
	mysql_query("UPDATE inventory SET price='$itemprice'
	WHERE id='$proid'");

}
?>