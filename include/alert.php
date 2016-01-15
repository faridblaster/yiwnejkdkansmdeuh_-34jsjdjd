<div class="content" id="alert">
	<?php
	$sql2=mysql_query("select * from inventory where qtyleft<='$CRITICAL'");
	
	?>
	
	<div class="panel panel-primary">
	
	<table class="table">
	<thead>
	
	<tr>
	
	<th> Bil </th>
	<th> Name </th>
	<th> Quantity </th>
	<th> Quantity Sold </th>
	
	</tr>
	
	</thead>
	<?php
	$counter = 0;
	while($row2=mysql_fetch_array($sql2))
	{
	$counter++;
	echo 
	'<tr>';
	?>
	
	<td><?=$counter;?></td>
	<td><?=$row2['item'];?></td>
	<td><?=$row2['qtyleft'];?></td>
	<td><?=$row2['qty_sold'];?></td>
	
	<?php
	echo 
	'</tr>';
	}
	?>
	</table>
	
	</div>
	
</div>