<?php

if(isset($_GET['priceUpdate'])){

	require_once("db.php");

	$proid=$_POST['itemId'];
	$itemprice=$_POST['itemprice'];
	mysql_query("UPDATE inventory SET price='$itemprice'
	WHERE id='$proid'");

}
?>