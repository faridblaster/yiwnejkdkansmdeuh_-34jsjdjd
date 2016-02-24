<ol id="toc">
    <li><a href="#inventory"><span>Inventory</span></a></li>
    <li><a href="#sales"><span>Sales</span></a></li>
    <li><a href="#alert"><span>To be order</span></a></li>

    <?php if($roles_sess == 1 || $roles_sess == 2){ ?>

		<li><a href="#addproitem"><span>Add Item</span></a></li>
	    <li><a href="#addpro"><span>Add Product</span></a></li>
	    <li><a href="#editprice"><span>Edit Price</span></a></li>
		<li><a href="#editproduct"><span>Edit Product</span></a></li>

    <?php } ?>

	<li><a href="#listofproduct"><span>List Of Product</span></a></li>

	<?php if($roles_sess == 1){ ?>
	<li><a href="#listofstaff"><span>List Of Staff</span></a></li>
	<li><a href="#generate_report"><span>Generate Report</span></a></li>
	<?php } ?>

	<li><a href="index.php"><span>Logout</span></a></li>
</ol>

<div align="center">

	<div id="mobile_nav" align="center">
	   
	   <table>

	   <tr>
	   <td><a href="#" xaction="open_close" class="close_menu"><span>Close Menu</span></a></td>
	   </tr>

	   <tr menu>
	   <td><a href="#inventory"><span>Inventory</span></a></td>
	   </tr>

	   <tr menu>
	   <td><a href="#sales"><span>Sales</span></a></td>
	   </tr>

	   <tr menu>
	   <td><a href="#alert"><span>To be order</span></a></td>
	   </tr>

	   <?php if($roles_sess == 1 || $roles_sess == 2){ ?>

	   <tr menu>
	   <td><a href="#addproitem"><span>Add Item</span></a></td>
	   </tr>

	   <tr menu>
	   <td><a href="#addpro"><span>Add Product</span></a></td>
	   </tr>

	   <tr menu>
	   <td><a href="#editprice"><span>Edit Price</span></a></td>
	   </tr>

	   <tr menu>
	   <td><a href="#editproduct"><span>Edit Product</span></a></td>
	   </tr>

	   <?php } ?>

	   <tr menu>
	   <td><a href="#listofproduct"><span>List Of Product</span></a></td>
	   </tr>

	   <?php if($roles_sess == 1){ ?>

	   <tr menu>
	   <td><a href="#listofstaff"><span>List Of Staff</span></a></td>
	   <td><a href="#generate_report"><span>Generate Report</span></a></td>
	   </tr>

	   <?php } ?>

	   <tr menu>
	   <td><a href="index.php"><span>Logout</span></a></td>
	   </tr>
	    
	   </table>
	    
	</div>

</div>