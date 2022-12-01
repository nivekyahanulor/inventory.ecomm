<?php 
require_once('../class/Verify.php');
if(isset($_POST['user_account'])){
	$user_account = $_POST['user_account'];
	$saveEdit = $Verify->accept_verify($user_account);
	$saveEdit2 = $Verify->accept_user($user_account);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Edit Successfully!";
	}else{
		$return['msg'] = "Edit Failed!";
	}
	echo json_encode($return);
}//end isset
$Verify->Disconnect();
