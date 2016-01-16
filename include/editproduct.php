<div class="content" id="editproduct">
<div class="panel panel-default" style="padding-bottom:10px">

<form >

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
	<td>Name </td><td>:</td><td><input id="productUpdate" type="text" name="product_name" class="input-sm form-control" value=""></td>
	</tr>


	<tr><td></td><td></td><td>
	<input type="submit" name="update_product" value="Update" class="btn btn-primary" /> <label id="resultStatus">
	</td></tr>	
	</table>
	
	</div>

</form>


<script>

var itemId = $('[name="ITEM"]').val();

$('[name="ITEM"]').change(function(key){

		itemId = key.currentTarget.value;

	})

$('[name="update_product"]').click(function() {

	var productUpdate = $('#productUpdate').attr('value');
	var product_name = $('[name="product_name"]').val();

    $.ajax({
        type: "POST",
        url: "include/updateproduct.php?_id="+itemId+"&productUpdate=true&product_name="+product_name,
        beforeSend: function(){ $('#resultStatus').fadeIn(250).css('color', '#017c04').html('processing...'); },
        success: function(result){

         $('#resultStatus').fadeIn(250).css('color', '#017c04').html('Saved Successfully!').delay(500).fadeOut(250); 

         window.location = "#page=listofproduct";
         window.location.reload();

     },
        error: function(){ $('#resultStatus').fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(500).fadeOut(250); }
    });
    return false;
});

</script>


</div>

</div>