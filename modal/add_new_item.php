<?php 
require_once('data/imageupimg.php');
require_once('database/Database.php');
$db = new Database();
$sql = "SELECT *
		FROM item_type
		ORDER BY item_type_desc ASC";
$types = $db->getRows($sql);
 ?>
<div class="modal fade" id="modal-item">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
			
				<form class="form-horizontal" method="post" action="data/add_item.php" role="form"  enctype="multipart/form-data">
				<input type="hidden" id="item-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Item Photo:</label>
				    <div class="col-sm-9">
				      <input type="file" class="form-control" name="image" placeholder="Enter Item Name" required="" autofocus="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Item Name:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" name="item-name" name="item-name" placeholder="Enter Item Name" required="" autofocus="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Price:</label>
				    <div class="col-sm-9"> 
				      <input type="number" min="0.1" step="any" class="form-control" name="item-price" placeholder="Enter Price" required="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Item Code:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" name="code" placeholder="Enter Item Code" required="" autofocus="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Variety Name:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" name="brand" placeholder="Enter Brand Name" required="" autofocus="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Kilo/Sack:</label>
				    <div class="col-sm-9">
				      <input type="text" maxlength="50" class="form-control" name="grams" placeholder="Enter Kilo/Sack" required="" autofocus="">
				    </div>
				  </div>

				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Type:</label>
				    <div class="col-sm-9"> 
				      <select name="item-type" class="btn btn-default">
				      	<?php foreach($types as $t): ?>
				      		<option value="<?= $t['item_type_id']; ?>"><?= ucwords($t['item_type_desc']); ?></option>
				      	<?php endforeach; ?>
				      </select>
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Save
				      <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
				      </button>
				    </div>
				  </div>
				</form>

				
				
		  
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

<?php 
$db->Disconnect();
 ?>
 
