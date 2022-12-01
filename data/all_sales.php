<?php 
require_once('../class/Sales.php');

$date = $_GET['date'];
$dailySales = $sales->daily_sales($date);


 ?>
<br />
<div class="table-responsive">
        <table id="myTable-sales" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Varieties</th>
                    <th><center>Kilo/Sack</center></th>
                    <th><center>Type</center></th>
                    <th><center>Price</center></th>
                    <th><center>Qty</center></th>
                    <th><center>Sub Total</center></th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $total = 0;
                foreach($dailySales as $ds):
                $subTotal = number_format($ds['item_price'] * $ds['qty'], 2);   
               /* $total += $subTotal;*/

               $total = 0;
               foreach($dailySales as $ds){
                   $subtotal = $ds['item_price'] * $ds['qty'];
                   $total += $subtotal;
               }

            ?>
                <tr>
                    <td><?= $ds['item_code']; ?></td>
                    <td><?= $ds['item_name']; ?></td>
                    <td><?= $ds['item_brand']; ?></td>
                    <td><?= $ds['item_grams']; ?></td>
                    <td><?= $ds['item_type_desc']; ?></td>
                    <td align="center"><?= number_format($ds['item_price'],2); ?></td>
                    <td align="center"><?= $ds['qty']; ?></td>
                    <td align="center"><?= $subTotal; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right"><strong>TOTAL:</strong></td>
                <td align="center">
                    <strong><?= number_format($total,2); ?></strong>
                </td>
            </tr>
        </table>
</div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-sales').DataTable();
    });
</script>

<?php 
$sales->Disconnect();
 ?>