						<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Edit Item</h4>
								</div>
								<div class="modal-body">
									
									<form class="form-horizontal" method="post" id="submitedit" role="form" action="data/edit_item.php" enctype="multipart/form-data">
									  <div class="form-group">
										<label class="control-label col-sm-3" for="">Item Photo:</label>
										<div class="col-sm-9">
										  <input type="file" class="form-control" name="image">
										  <input type="hidden" class="form-control" name="image1" id="image1">
										  <input type="hidden" class="form-control" name="item_id" id="item-id" >
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-3" for="">Item Name:</label>
										<div class="col-sm-9">
										  <input type="text" maxlength="50" class="form-control"  name="item-name" id="item-name" placeholder="Enter Item Name" required="" autofocus="">
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-3" for="">Price:</label>
										<div class="col-sm-9"> 
										  <input type="number" min="0.1" step="any"  class="form-control" name="item-price" id="item-price" placeholder="Enter Price" required="">
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-3" for="">Item Code:</label>
										<div class="col-sm-9">
										  <input type="text" maxlength="50" class="form-control" name="code" id="code" placeholder="Enter Item Code" required="" autofocus="">
										</div>
									  </div>
									  <div class="form-group">
										<label class="control-label col-sm-3" for="">Variety Name:</label>
										<div class="col-sm-9">
										  <input type="text" maxlength="50" class="form-control" name="brand" id="brand" placeholder="Enter Brand Name" required="" autofocus="">
										</div>
									  </div>
									    <br>  <br>
									  <div class="form-group">
										<label class="control-label col-sm-3" for="">Kilo/Sack:</label>
										<div class="col-sm-9">
										  <input type="text" maxlength="50" class="form-control"  name="grams" id="grams" placeholder="Enter Kilo/Sack" required="" autofocus="">
										</div>
									  </div>
									   <div class="form-group">
										<label class="control-label col-sm-3" for="">Type:</label>
										<div class="col-sm-9"> 
										
										  <select name="item-type"  id="item-type" class="btn btn-default">
											<?php 
											foreach($types as $t): ?>
											<?php if($it['item_type_id'] ==  $t['item_type_id']){?>
												<option value="<?= $t['item_type_id']; ?>" selected><?= ucwords($t['item_type_desc']); ?></option>
											<?php } else { ?>
												<option value="<?= $t['item_type_id']; ?>"><?= ucwords($t['item_type_desc']); ?></option>
											<?php } ?>
											<?php endforeach; ?>
										  </select>
										</div>
									  </div>
									  
									 <div class="form-group"> 
										<div class="col-sm-offset-2 col-sm-10">
										  <button type="submit" value="edit" id="submit-item" class="btn btn-default">Save
										  <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
										  </button>
										</div>
									  </div>
									</form>

									<br>  <br>

									
							  
								</div>
								<div class="modal-footer">
								</div>
							</div>
						</div>
					</div>
				