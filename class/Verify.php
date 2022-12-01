<?php
require_once('../database/Database.php');
require_once('../interface/iVerify.php');
class Verify extends Database implements iVerify{
	public function all_items()
	{
		$sql = "SELECT * From user where verify='1'";
		return $this->getRows($sql);
	}
	public function all_nonVerify()
	{
		$sql = "SELECT a.*,b.*
		FROM user as a
		LEFT JOIN verification as b
		ON a.user_account = b.verify_user
		WHERE a.user_type=0 AND a.verify=0";
		return $this->getRows($sql);
	}
	public function accept_verify($user_account){
		$sql="UPDATE `verification` SET `verify_pending1` = ?, `verify_pending2` = ?, `verify_pending3` = ? WHERE `verification`.`verify_user` = ?";
		return $this->updateRow($sql, [1,1,1,$user_account]);
		// $sql2="UPDATE `user` SET `verify` = '1' WHERE `user`.`user_account` = '$user_account'";
	}
	public function accept_user($user_account){
		// $sql="UPDATE `verification` SET `verify_pending1` = ?, `verify_pending2` = ?, `verify_pending3` = ? WHERE `verification`.`verify_user` = ?";
		$sql="UPDATE `user` SET `verify` = ? WHERE `user`.`user_account` = ?";
		return $this->updateRow($sql, [1,$user_account]);

	}
	public function get_item($item_id)
	{
		$sql = "SELECT *
				FROM item
				WHERE item_id = ?";
		return $this->getRow($sql, [$item_id]);
	}//end edit_item

	public function add_item($iName, $iPrice, $type_id, $code, $brand, $grams)
	{
		$sql = "INSERT INTO item(item_name, item_price, item_type_id, item_code, item_brand, item_grams)
				VALUES(?, ?, ?, ?, ?, ?)";
		return $this->insertRow($sql, [$iName, $iPrice, $type_id, $code, $brand, $grams]);
	}//end add_item

	public function edit_item($item_id, $iName, $iPrice, $type_id, $code, $brand, $grams)
	{
		$sql = "UPDATE item 
				SET item_name = ?, item_price = ?, item_type_id = ?, item_code = ?, item_brand = ?, item_grams = ?
				WHERE item_id = ?";
		return $this->updateRow($sql, [$iName, $iPrice, $type_id, $code, $brand, $grams, $item_id]);
	}//end edit_item
	
}//end class Verify

$Verify = new Verify();
