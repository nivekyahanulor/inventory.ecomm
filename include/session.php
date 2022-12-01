<?php 
function admin(){
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(!isset($_SESSION['logged_id'])||!isset($_SESSION['logged_type'])||$_SESSION['logged_type']==0){
	die('Access is Denied!');
}//end isset
}
function client(){
	if(session_status() == PHP_SESSION_NONE)
	{
		session_start();//start session if session not start
	}
	
	if(!isset($_SESSION['logged_id'])||!isset($_SESSION['logged_type'])||$_SESSION['logged_type']==1){
		die('Access is Denied!');
	}//end isset
}

function deb(){
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
}
?>
