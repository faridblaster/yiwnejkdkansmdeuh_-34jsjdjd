<?php
	require_once('auth.php');
?>
<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Inventory System</title>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
	
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">
	
	<script src="js/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">

<script type="text/javascript">
$(document).ready(function()
{
$("tr > td.editQuantity").click(function()
{
	
var ID=$(this).attr('xid');
$("#first_"+ID).show();
$("#last_"+ID).hide();
$("#last_input_"+ID).show();
}).change(function()
{
	
	var ID=$(this).attr('xid');
	var first=$("#first_input_"+ID).val();
	var last=$("#last_input_"+ID).val();
	
swal({
	
	title: '',
	text: 'Are you sure wan to commit this changed ?',
	confirmButtonText: 'OK',
	type: "info",   
	showCancelButton: true,   
	closeOnConfirm: false,
	}, function(){  

	var dataString = 'id='+ ID +'&price='+first+'&qty_sold='+last;
	$("#first_"+ID).html('<img src="load.gif" />');
		
		if(first.length && last.length>0)
	{
	$.ajax({
	type: "POST",
	url: "table_edit_ajax.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
		
		if(html == 1){
			swal('','sorry, u cannot sell your item currently..','warning');
			setTimeout(function(){
			   window.location.reload(1);
			}, 5000);
		} else {
			
			swal('', 'your commit saved successfully', 'success');
			setTimeout(function(){
			   window.location.reload(1);
			}, 5000);
	
		}
		
		$("#first_"+ID).html(first);
		$("#last_"+ID).html(last);
		
	
	}
	});
	}

});

});

$(".editbox").mouseup(function() 
{
return false
});

$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});
</script>
<style>
body
{
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
padding:10px;
}
.editbox
{
display:none
}
td
{
padding:7px;
border-left:1px solid #fff;
border-bottom:1px solid #fff;
}
table{
border-right:1px solid #fff;
}
.editbox
{
font-size:14px;
width:29px;
background-color:#ffffcc;

border:solid 1px #000;
padding:0 4px;
}
.editQuantity:hover
{
background:url(edit.png) right no-repeat #80C8E5;
padding: 8px;
cursor:pointer;
}
.editQuantity
{
background: none repeat scroll 0 0;
}
th
{
font-weight:bold;
text-align:left;
padding:7px;
border:1px solid #fff;
border-right-width: 0px;
}
.head
{
background: none repeat scroll 0 0 #91C5D4;
color:#00000;

}

</style>
<link rel="stylesheet" href="reset.css" type="text/css" media="screen" />

<link rel="stylesheet" href="tab.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 
<link href="tabs.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

var popupWindow=null;

function child_open()
{ 

popupWindow =window.open('printform.php',"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=950, height=400,top=200,left=200");

}
</script>
</head>

<body bgcolor="#dedede">

<?php 

if(isset($_SESSION['SESS_ROLE_SET'])){

	$roles_sess = $_SESSION['SESS_ROLE_SET'];
	switch($roles_sess){

			case 1:
			echo "<h1>Inventory System (Administrator)</h1>";
			break;

			case 2:
			echo "<h1>Inventory System (Manager)</h1>";
			break;

			case 3:
			echo "<h1>Inventory System (Office Clerk)</h1>";
			break;

		}

	include("include/nav.php");

	include("include/inventory.php");
	include("include/alert.php");
	include("include/sales.php");
	include("include/addproitem.php");
	include("include/addpro.php");
	include("include/editprice.php");
	include("include/editproduct.php");

	include("include/product_list.php");
	include("include/staff_list.php");

}

?>

<script src="activatables.js" type="text/javascript"></script>
<script type="text/javascript">
activatables('page', ['inventory', 'alert', 'sales', 'addproitem', 'addpro', 'editprice', 'editproduct', 'listofproduct', 'listofstaff']);
</script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="script.js"></script>
	
</body>
</html>
