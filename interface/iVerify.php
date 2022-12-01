<?php 
interface iVerify{
	public function all_items();
	public function all_nonVerify();
	public function accept_verify($user_account);
	public function accept_user($user_account);
	public function get_item($item_id);
	public function add_item($iName, $iPrice, $type_id, $code, $brand, $grams);
	public function edit_item($item_id, $iName, $iPrice, $type_id, $code, $brand, $grams);
}//end iItem