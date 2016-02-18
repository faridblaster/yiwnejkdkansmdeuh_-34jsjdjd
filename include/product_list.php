<div class="content" id="listofproduct">
<div class="panel panel-default" style="padding-bottom:10px">
  <!-- Default panel contents -->
  <div class="panel-heading">List Of Product</div>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th style="width:30px;"></th>
      </tr>
    </thead>
    <tbody>
	
	<?php
	
	$sql = mysql_query("select * from inventory where id is not null");
	$counter = 0;
	
	while($show = mysql_fetch_array($sql)){
		
	$counter++;
	
	?>
	
      <tr>
	  
        <td><?=$counter; ?></td>
        <td><?=$show['item']; ?></td>
        <td><a href="#" onclick="javascript:del_product(<?=$show['id']; ?>)">Delete</a></td>
		
      </tr>
	  
	  
	<?php } ?>
	  
    </tbody>
  </table>
  
  </div>

</div>
<script type="text/javascript">

function del_product(deleteID){

	swal({
          title: "",
          text: "Adakah Anda Ingin Menghapuskan Produk ini ?",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak",
          closeOnConfirm: false,
          closeOnCancel: true
        }, function () {

        	$.ajax({
                type: "POST",
                url: "include/delete.php?deleteID=" + deleteID,
                data: "deleteID="+ deleteID,
                success: function(result){
                    swal({
		                title: '',
		                text: 'Maklumat dihapuskan',
		                confirmButtonText: 'OK',
		                type: 'success'
		             });

                    window.location = "tableedit.php#page=inventory";
                }
            });

        });

}


</script>