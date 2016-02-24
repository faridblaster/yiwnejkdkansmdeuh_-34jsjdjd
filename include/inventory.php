<div class="content" id="inventory">
<span class="header-text">Click the table rows to enter the quantity sold</span><br><br>

<div class="panel panel-default" style="padding-bottom:10px">
  <!-- Default panel contents -->
  <div class="panel-heading">List Of Inventory</div>
  
<table class="table table-striped inventory">
<thead>
<tr class="th-silver">
<th>Bil.</th>
<th>Item</th>
<th>Q.Left</th>
<th>Q.Sold </th>
<th>Price</th>
<th>Sales</th>
</tr>
</thead>
<tbody>
<?php
$da=date("Y-m-d");
$num_rec_per_page=10;
if (isset($_GET["paging"])) { $page  = $_GET["paging"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 

$sql=mysql_query("select * from inventory LIMIT $start_from, $num_rec_per_page");
$i=1;
$counter = 0;

if($page>1){
	$counter = ($_GET["paging"] * $num_rec_per_page)/2;
}

while($row=mysql_fetch_array($sql))
{
$counter++;
$id=$row['id'];

if(isset($row['date'])) {
$date=$row['date'];	
}
$item=$row['item'];
$qtyleft=$row['qtyleft'];
$qty_sold=$row['qty_sold'];
$price=$row['price'];
$sales=$row['sales'];

if($i%2)
{
?>
<tr id="<?php echo $id; ?>" class="edit_tr">
<?php } else { ?>
<tr id="<?php echo $id; ?>" class="edit_tr">
<?php } ?>
<td> <?php echo  $counter; ?></td>
<td>
<span class="text"><?php echo $item; ?></span> 
</td>
<td>
<span class="text"><?php echo $qtyleft; ?></span>
</td>
<td xid="<?php echo $id; ?>" class="editQuantity">

<span id="last_<?php echo $id; ?>" class="text">
<?php
$sqls=mysql_query("select * from sales where date='$da' and product_id='$id'");
while($rows=mysql_fetch_array($sqls))
{
echo $rows['qty'];
}
?>
</span> 
<input type="text" value="<?php if(isset($rtrt)) { echo $rtrt; } ?>"  class="editbox" id="last_input_<?php echo $id; ?>"/>
</td>
<td>
<span id="first_<?php echo $id; ?>" class="text"><?php echo $price; ?></span>
<input type="text" value="<?php echo $price; ?>" class="editbox" id="first_input_<?php echo $id; ?>" />
</td>
<td>

<span class="text"><?php if(isset($dailysales)) { echo $dailysales; } ?>
<?php
$sqls=mysql_query("select * from sales where date='$da' and product_id='$id'");
while($rows=mysql_fetch_array($sqls))
{
$rtyrty=$rows['qty'];
$rrrrr=$rtyrty*$price;
echo $rrrrr;
}

?>
</span> 
</td>
</tr>

<?php
$i++;
}
?>

</tbody>

</table>

<?php
$sql = "SELECT * FROM inventory"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

?>

<nav>
  <ul class="pagination">
    <li>
      <a href="?paging=1#sales&page=inventory" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
	
	<?php for ($i=1; $i<=$total_pages; $i++) {  ?>
	
		<li><a href="?paging=<?=$i;?>#sales&page=inventory'"><?=$i;?></a></li>
		
	<?php }; ?> 
    
    <li>
      <a href="?paging=<?=$total_pages?>#sales&page=inventory" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

Total Sales of this day:
	    <b><?php echo $currentcyCode; ?> <?php
function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}		
$result1 = mysql_query("SELECT sum(sales) FROM sales where date='$da'");
while($row = mysql_fetch_array($result1))
{
    $rrr=$row['sum(sales)'];
	echo formatMoney($rrr, true);
 }

?></b><br /><br />
<input name="" type="button" value="Print" onclick="javascript:child_open()" style="cursor:pointer;" />
</div>
<br />
<br />

</div>