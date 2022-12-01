<?php 
	require_once('../class/Item.php');
	
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "items/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	
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

	$saveItem = $item->add_item($iName, $iPrice, $iType, $code, $brand, $grams, $location);
	if($saveItem){
		$return['valid'] = true;
		$return['msg'] = "New Record Added Successfully!";
	}else{
		$return['valid'] = false;
	}
	header("location:../item.php?added");
	// echo json_encode($return);

$item->Disconnect();