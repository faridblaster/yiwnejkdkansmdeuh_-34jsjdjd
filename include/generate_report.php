<div class="content" id="generate_report">

  <script>

    function printDiv(divName) {

      $('[xprint]').hide();

      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;

      $('[xprint]').show();
      location.reload();

    }

  </script>

    <div class="panel panel-default" id="by_day" style="padding-bottom:10px">
    <!-- Default panel contents -->
    <div class="panel-heading">Jualan Mengikut Hari
      <span class="pull-right">
        <button onclick="printDiv('by_day')" xprint class="btn btn-success btn-xs">Print</button>
      </span>
    </div>

      <table class="table table-responsive">

        <th class="bg-primary">No</th>
        <th class="bg-primary">Kuantiti</th>
        <th class="bg-primary">Jualan</th>
        <th class="bg-primary" style="width: 100px; text-align: center">Hari</th>

        <?php

        $index = 0;
        $total_quantity = 0;
        $total_sales = 0;
        $total_days = 0;

        $gen_sql = mysql_query("SELECT DAY(date) as byDay, SUM(sales) as totalSales, COUNT(qty) as Quantity FROM sales GROUP BY DAY(date) ORDER BY DAY(date)");

        while($rows=mysql_fetch_array($gen_sql)){

          $index++;
          $total_quantity += $rows["Quantity"];
          $total_sales += $rows["totalSales"];
          $total_days += $rows["byDay"];

          echo '
            <tr class="bg-success">
            <td>'.$index.'</td>
            <td>'.$rows["Quantity"].'</td>
            <td>'.number_format($rows["totalSales"],2).'</td>
            <td style="width: 100px; text-align: center">'.$rows["byDay"].'</td>
            </tr>
          ';

        }

        ?>

        <tr class="bg-primary">
          <td></td>
          <td><?=$total_quantity;?></td>
          <td><?=number_format($total_sales,2);?></td>
          <td style="width: 100px; text-align: center"><?=$total_days;?> Hari</td>
        </tr>

      </table>

  </div>

  <div class="panel panel-default" id="by_month" style="padding-bottom:10px">
    <!-- Default panel contents -->
    <div class="panel-heading">Jualan Mengikut Bulan
    <span class="pull-right">
        <button xprint onclick="printDiv('by_month')" class="btn btn-success btn-xs">Print</button>
      </span>
    </div>

    <table class="table table-responsive">

      <th class="bg-primary">No</th>
      <th class="bg-primary">Kuantiti</th>
      <th class="bg-primary">Jualan</th>
      <th class="bg-primary" style="width: 100px; text-align: center">Bulan</th>

      <?php

      $index = 0;
      $total_quantity = 0;
      $total_sales = 0;
      $total_months = 0;

      $gen_sql = mysql_query("SELECT Month(date) as byMonth, SUM(sales) as totalSales, COUNT(qty) as Quantity FROM sales GROUP BY MONTH(date) ORDER BY MONTH(date)");

      while($rows=mysql_fetch_array($gen_sql)){

        $index++;
        $total_quantity += $rows["Quantity"];
        $total_sales += $rows["totalSales"];
        $total_months += $rows["byMonth"];

        echo '
            <tr class="bg-success">
            <td>'.$index.'</td>
            <td>'.$rows["Quantity"].'</td>
            <td>'.number_format($rows["totalSales"],2).'</td>
            <td style="width: 100px; text-align: center">'.$rows["byMonth"].'</td>
            </tr>
          ';

      }

      ?>

      <tr class="bg-primary">
        <td></td>
        <td><?=$total_quantity;?></td>
        <td><?=number_format($total_sales,2);?></td>
        <td style="width: 100px; text-align: center"><?=$total_months;?> Bulan</td>
      </tr>

    </table>

  </div>

  <div class="panel panel-default" id="by_year" style="padding-bottom:10px">
    <!-- Default panel contents -->
    <div class="panel-heading">Jualan Mengikut Tahun
    <span class="pull-right">
        <button onclick="printDiv('by_year')" xprint class="btn btn-success btn-xs">Print</button>
      </span>
    </div>

    <table class="table table-responsive">

      <th class="bg-primary">No</th>
      <th class="bg-primary">Kuantiti</th>
      <th class="bg-primary">Jualan</th>
      <th class="bg-primary" style="width: 100px; text-align: center">Tahun</th>

      <?php

      $index = 0;
      $total_quantity = 0;
      $total_sales = 0;
      $gen_sql = mysql_query("SELECT YEAR(date) as byYear, SUM(sales) as totalSales, COUNT(qty) as Quantity FROM sales GROUP BY YEAR(date) ORDER BY YEAR(date)");

      while($rows=mysql_fetch_array($gen_sql)){

        $index++;
        $total_quantity += $rows["Quantity"];
        $total_sales += $rows["totalSales"];

        echo '
            <tr class="bg-success">
            <td>'.$index.'</td>
            <td>'.$rows["Quantity"].'</td>
            <td>'.number_format($rows["totalSales"],2).'</td>
            <td style="width: 100px; text-align: center">'.$rows["byYear"].'</td>
            </tr>
          ';

      }

      ?>

      <tr class="bg-primary">
        <td></td>
        <td><?=$total_quantity;?></td>
        <td><?=number_format($total_sales,2);?></td>
        <td></td>
      </tr>

    </table>

  </div>

</div>
