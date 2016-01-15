<?php

if(isset($_GET['farid'])){

	$id =  mysql_real_escape_string($_GET['_id']);
	$product_name = mysql_real_escape_string($_GET['product_name'])

	$sql = mysql_query("UPDATE product SET item='$product_name' WHERE id='$id' limit 1");

	if($sql == true){

		echo "Update Successfully";


	} else  {

		echo "Update Failed";

	}

}

?>