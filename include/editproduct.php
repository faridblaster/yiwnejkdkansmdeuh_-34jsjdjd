<div class="content" id="editproduct">
<div class="panel panel-default" style="padding-bottom:10px">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

<div align="center">
	
	<table>

	<tr><td>Product name</td><td>:</td>

	<td>
	<?php
	$name= mysql_query("select * from inventory");
	
	echo '<select name="ITEM" id="user" class="input-sm form-control textfield1">';
	 while($res= mysql_fetch_assoc($name))
	{
	echo '<option value="'.$res['id'].'">';
	echo $res['item'];
	echo'</option>';
	}
	echo'</select>';
	?>

	</td>
	</tr>
	
	<tr>
	<td>Name </td><td>:</td><td><input type="text" name="product_name" class="input-sm form-control"></td>
	</tr>
	
	<tr>
	<td>Description </td><td>:</td><td><textarea name="product_desc" ols="10" rows="5" class="input-sm form-control"></textarea></td>
	</tr>

	<tr><td></td><td></td><td>
	<input type="submit" name="update_product" value="Update" class="btn btn-primary" />
	</td></tr>	
	</table>
	
	</div>

</form>
</div>

</div>