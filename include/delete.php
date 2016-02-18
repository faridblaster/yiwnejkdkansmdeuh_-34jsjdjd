<?php
require_once('../auth.php');
	include('../db.php');

if(isset($_POST['deleteID']))
  {

   $id = $_POST['deleteID'];
   $id = mysql_escape_String($id);
   $delquery=mysql_query("delete from inventory where id=$id") or die(mysql_error());
   //echo "Record deleted";

  }
?>