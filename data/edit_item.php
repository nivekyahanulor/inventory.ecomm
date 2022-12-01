<?php 
require_once('../class/Item.php');


	$item_id = $_POST['item_id'];
	$iName = $_POST['item-name'];
	$iPrice = $_POST['item-price'];
	$iType = $_POST['item-type'];
	$code = $_POST['code'];
	$brand = $_POST['brand'];
	$grams = $_POST['grams'];
	$iName = strtolower($iName);
	$iPrice = strtolower($iPrice);
	$iName = ucwords(strtolower($iName));
	$code = ucwords(strtolower($code));
	$brand = ucwords(strtolower($brand));
	$grams = ucwords(strtolower($grams));
	
	$letter  	    = $_POST['image1'];

	if ($letter == "") {
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "items/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else {
		if ($_FILES["image"]["name"] == "") {
			$location = $letter;
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "items/" . $_FILES["image"]["name"]);
			$location   =  $_FILES["image"]["name"];
		}
	}
	
	
	
	
	$saveEdit = $item->edit_item($item_id, $iName, $iPrice, $iType, $code, $brand, $grams,$location);
	
	header("location:../item.php?updated");
	
$item->Disconnect();
