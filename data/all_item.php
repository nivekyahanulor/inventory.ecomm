<?php 
    require_once('../class/Item.php');
    $items = $item->all_items();
    $types = $item->all_item_types();
    // echo '<pre>';
    //     print_r($items);
    // echo '</pre>';
 ?>
<br />
<div class="table-responsive">
        <table id="myTable-item" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Item Image</th>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Varieties</th>
                    <th>Type</th>
                    <th><center>Kilo/Sack</center></th>
                    <th><center>Price</center></th>
                    <th>
                        <center>Action</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($items as $it): ?>
                    <tr align="center">
                        <td align="left"><img src="data/items/<?= $it['item_image']; ?>" width="200px"</td>
                        <td align="left"><?= $it['item_code']; ?></td>
                        <td align="left"><?= ucwords($it['item_name']); ?></td>
                        <td align="left"><?= $it['item_brand']; ?></td>
                        <td align="left"><?= $it['item_type_desc']; ?></td>
                        <td><?= $it['item_grams']; ?></td>
                        <td><?= "Php ".number_format($it['item_price'], 2); ?></td>
                        <td>
                           <center>
                               <button onclick="editModal('<?= $it['item_id']; ?>');" type="button" class="btn btn-warning btn-xs">Edit
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </button>
                           </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
<?php include_once('../modal/edit-item.php'); ?>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-item').DataTable();
    });
</script>

<?php 
$item->Disconnect();
 ?>