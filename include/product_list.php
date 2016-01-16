<div class="content" id="listofproduct">
<div class="panel panel-default" style="padding-bottom:10px">
  <!-- Default panel contents -->
  <div class="panel-heading">List Of Product</div>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
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
		
      </tr>
	  
	  
	<?php } ?>
	  
    </tbody>
  </table>
  
  </div>

</div>