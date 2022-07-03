<?php
	ob_start();
	session_start();
	session_destroy();
	
	if(isset($_GET['admin'])){
		header('Location:login-admin.php');
	}else{
		header('Location:login.php');
	}
	
    ob_flush();

?>