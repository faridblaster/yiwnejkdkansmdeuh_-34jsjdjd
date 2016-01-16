<div class="content" id="addproitem">

<div class="panel panel-default" style="padding-bottom:10px">

<form action="updateproduct.php" method="post">

<div align="center">

<table>

<tr>

<td>Product name</td>
<td>:</td>
<td><?php
	$name= mysql_query("select * from inventory");
	
	echo '<select name="ITEM" id="user" class="form-control input-sm textfield1">';
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

<td>Number of Item To Add</td>
<td>:</td>
<td><input name="itemnumber" class="form-control input-sm " type="text" /></td>

</tr>


<tr>

<td></td>
<td></td>
<td><input name="" type="submit" class="form-control input-sm " value="Add" /></td>

</tr>

</table>

</div>

</form>
</div>
</div>