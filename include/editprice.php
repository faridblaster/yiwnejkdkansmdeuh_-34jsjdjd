<div class="content" id="editprice">
<form action="updateprice.php" method="post">
	<div style="margin-left: 48px;">
	Product name:<?php
	$name= mysql_query("select * from inventory");
	
	echo '<select name="ITEM" id="user" class="textfield1">';
	 while($res= mysql_fetch_assoc($name))
	{
	echo '<option value="'.$res['id'].'">';
	echo $res['item'];
	echo'</option>';
	}
	echo'</select>';
	?>
	</div>
	<br />
	<div style="margin-left: 97px;">Price:<input name="itemprice" type="text" /></div>
	<div style="margin-left: 127px; margin-top: 14px;"><input name="" type="submit" value="Update" /></div>
</form>
</div>