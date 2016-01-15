<div class="content" id="sales">
	<form action="tableedit.php#sales" method="post">
	From: <input name="from" type="text" class="tcal"/>
      To: <input name="to" type="text" class="tcal"/>
	  <input name="" type="submit" value="Seach" />
	  </form><br />
	 Total Sales:  
	  <?php
	  if(isset($_POST['from']) && isset($_POST['to'])){
		  
		$a=$_POST['from'];
		$b=$_POST['to'];
		
		$result1 = mysql_query("SELECT sum(sales) FROM sales where date BETWEEN '$a' AND '$b'");
		while($row = mysql_fetch_array($result1))
		{
			$rrr=$row['sum(sales)'];
			echo formatMoney($rrr, true);
		 }
		 
	  }
		
		?>
</div>