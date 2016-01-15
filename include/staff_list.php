<div class="content" id="listofstaff">
<div class="panel panel-default" style="padding-bottom:10px">
<?php

if(isset($_GET['staff_id'])){
	
?>

<div align="center">
<table>

<tr>

<td>FirstName</td><td>:</td><td><input type="text" class="form-control input-sm"></td>

</tr>

<tr>

<td>LastName</td><td>:</td><td><input type="text" class="form-control input-sm"></td>

</tr>

<tr>

<td>Email</td><td>:</td><td><input type="text" class="form-control input-sm"></td>

</tr>

<tr>

<td>
</td>

<td></td>

<td>

<a href="tableedit.php#page=listofstaff" class="btn btn-warning btn-sm">Back</a>
<span class="btn btn-primary btn-sm">Save</span>

</td>

</tr>

</table>
</div>
<?php
	
	
} else {

?>
  <!-- Default panel contents -->
  <div class="panel-heading">List Of Staff</div>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Roles</th>
		<th style="width:30px; text-align:center;">Modify</th>
      </tr>
    </thead>
    <tbody>
	
	<?php
	
	$sql = mysql_query("select * from user where id is not null");
	$counter = 0;
	
	while($show = mysql_fetch_array($sql)){
		
	$counter++;
	
	?>
	
      <tr>
	  
        <td><?=$counter; ?></td>
        <td>Doe</td>
        <td>john@example.com</td>
		<td>
		
		<select name="set_role" class="form-control input-sm">
		
		<option value="1">Administrator</option>
		<option value="2">Manager</option>
		<option value="3">Office Clerk</option>
		
		</select>
		</td>
		<td style="width:30px;">
		<span onclick="editData(<?=$show['id'];?>)" class="btn btn-default input-sm">Edit</span>
		</td>
		
      </tr>
	  
	  
	<?php } ?>
	  
    </tbody>
  </table>
  
<?php } ?>
  
  <script>
  
  function editData(staff_id){
	  
	  window.location= "tableedit.php?staff_id="+staff_id+"#page=listofstaff";
	  
  }
  
  </script>
  
  </div>

</div>