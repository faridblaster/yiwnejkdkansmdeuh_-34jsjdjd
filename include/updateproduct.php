<?php

if(isset($_GET['productUpdate'])){

	require_once("../db.php");

	$id =  mysql_real_escape_string($_GET['_id']);
	$product_name = mysql_real_escape_string($_GET['product_name']);

	$sql = mysql_query("UPDATE inventory SET item='".$product_name."' WHERE id=$id");

	if($sql == true){

		echo "Update Successfully";


	} else  {

		echo "Update Failed";

	}

}

?>