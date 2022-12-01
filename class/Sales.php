<?php
require_once('../database/Database.php');
require_once('../interface/iSales.php');
class Sales extends Database implements iSales {
	public function new_sales($code,$generic,$brand,$gram,$type,$qty,$price)
	{
		$sql = "INSERT INTO sales(item_code,generic_name,brand,gram,type,qty,price)
				VALUES(?,?,?,?,?,?,?);";
		return $this->insertRow($sql, [$code,$generic,$brand,$gram,$type,$qty,$price]);
	}//end new_sales

	public function daily_sales($date)
	{
		// $sql = "SELECT *
		// 		FROM sales
		// 		WHERE DATE(`date_sold`) = ?";
		$sql ="SELECT a.*,b.*,c.*
		FROM `sales` as a
		LEFT JOIN item as b
		ON a.item_code = b.item_code
		LEFT JOIN item_type as c
		ON b.item_type_id = c.item_type_id
		where DATE(date_sold) =?";
				
		return $this->getRows($sql, [$date]);
	}//end daily_sales
}//end class
$sales = new Sales();

/* End of file Sales.php */
/* Location: .//D/xampp/htdocs/regis/class/Sales.php */