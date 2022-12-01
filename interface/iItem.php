<?php 
interface iItem{
	public function all_items();
	public function get_item($item_id);
	public function add_item($iName, $iPrice, $type_id, $code, $brand, $grams,$image);
	public function edit_item($item_id, $iName, $iPrice, $type_id, $code, $brand, $grams,$image);
}//end iItem