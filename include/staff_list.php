<div class="content" id="listofstaff">
<div class="panel panel-default" style="padding-bottom:10px">
  <!-- Default panel contents -->
  <div class="panel-heading">List Of Staff</div>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Lastname</th>
        <th>Roles</th>
        <th>email</th>
		<th style="width:30px; text-align:center;">Modify</th>
      </tr>
    </thead>
    <tbody>
	
	<?php
	
	$sql = mysql_query("select * from user where id is not null");
	$counter = 0;

	function optionSelected() {
		echo "selected=selected";
	}
	
	while($show = mysql_fetch_array($sql)){
		
	$counter++;
	
	?>
	
      <tr>
	  
        <td><?=$counter; ?></td>
        <td><?=$show['username']?></td>
		<td>
		
		<select name="set_role" class="form-control input-sm">
		
		<option value="1" <?php if($show['role']==1) { optionSelected(); } ?>>Administrator</option>
		<option value="2" <?php if($show['role']==2) { optionSelected(); } ?> >Manager</option>
		<option value="3" <?php if($show['role']==3) { optionSelected(); } ?>>Office Clerk</option>
		
		</select>
		</td>

		<td><input type="email" class="form-control input-sm" name="up_email<?=$show['id'];?>" value="<?=$show['email']?>"></td>

		<td style="width:30px;">
		<span id="resultStatus<?=$show['id'];?>"></span>
		<span onclick="editUpdateRole(<?=$show['id'];?>)" class="btn btn-default input-sm">Save</span>
		</td>
		
      </tr>
	  
	  
	<?php } ?>
	  
    </tbody>
  </table>
  
  <script>

  var defaultRole = $('[name=set_role]').val();

  $('[name=set_role]').change(function(key){

  	var roleSelected = key.currentTarget.value;

  	defaultRole = roleSelected;

  })
  
  function editUpdateRole(staff_id){

  	var upEmail = $("[name=up_email"+staff_id+"]").val();

  	$.ajax({
        type: "GET",
        url: "include/updaterole.php?staffId="+staff_id+"&staffUpdate=true&role="+defaultRole+"&upEmail="+upEmail,
        beforeSend: function(){ $('#resultStatus'+staff_id).fadeIn(250).css('color', '#017c04').html('processing...'); },
        success: function(result){

         $('#resultStatus'+staff_id).fadeIn(250).css('color', '#017c04').html('Saved Successfully!')

         setTimeout(function () { window.location.reload(); }, 2000);

     },
        error: function(){ $('#resultStatus'+staff_id).fadeIn(250).css('color', '#ff464a').html('An error occurred!').delay(500).fadeOut(250); }
    });
	  
  }
  
  </script>
  
  </div>

</div>