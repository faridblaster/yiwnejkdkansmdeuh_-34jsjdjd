<div class="content" id="editprice">

<div class="panel panel-default" style="padding-bottom:10px">

<form method="post">

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

	<td>Price</td>
	<td>:</td>
	<td><input class="form-control input-sm" name="itemprice" type="text" /></td>

	</tr>

	<tr><td></td><td></td><td><input name="update_price" class="form-control input-sm" type="submit" value="Update" /></td></tr>


</table>
</div>
</form>

<script>

var itemId = $('[name="ITEM"]').val();

$('[name="ITEM"]').change(function(key){

		itemId = key.currentTarget.value;

	})

$('[name="update_price"]').click(function() {

	var priceUpdate = $('#priceUpdate').attr('value');
	var itemprice = $('[name="itemprice"]').val();

    $.ajax({
        type: "POST",
        url: "include/updateprice.php?_id="+itemId+"&priceUpdate=true&itemprice="+itemprice,
        beforeSend: function(){ $('#resultStatus').fadeIn(250).css('color', '#017c04').html('processing...'); },
        success: function(result){

         $('#resultStatus').fadeIn(250).css('color', '#017c04').html('Saved Successfully!').delay(500).fadeOut(250); 

         window.location = "#page=inventory";
         window.location.reload();

     },
        error: function(){ $('#resultStatus').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(500).fadeOut(250); }
    });
    return false;
});

</script>

</div>

</div>