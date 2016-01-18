<?php

if(isset($_GET['staffUpdate'])){

	require_once("../db.php");

	$staffId = mysql_real_escape_string($_GET['staffId']);
	$role = mysql_real_escape_string($_GET['role']);

	mysql_query("UPDATE user SET role='$role' WHERE id='$staffId'");

}

?>