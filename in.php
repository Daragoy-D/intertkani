<?php
session_start();
include_once('dbcon.php');

$step = $_POST['step'];
if($step == 1){
	$login = $_POST['login'];
	$pass = $_POST['pass'];	
	$pass = crypt($pass, PASSWORD_DEFAULT);
	
	$query = "SELECT * FROM admins WHERE id='1'";
	$result = mysql_query($query);
	$res = null;
	while ($row = mysql_fetch_array($result)){
		if($login == $row['name']){
			if($pass == $row['pass']){
				$res = $row['name'];  
			}
			else{
				$res = 'e_pass';
			}
		}
		else{
			$res = 'e_log';
		}
	}
	$_SESSION['admin_step_1'] = "l";
	echo $res;
}

if($step == 2){
	if($_SESSION['admin_step_1'] == "l"){
		$_SESSION['autorize'] = 1;
		echo $_SESSION['autorize'];
	}
	
}

if($_POST['out'] == 'out'){
	session_unset();
	session_destroy();
	header("Location: index.php");
	exit();
}

?>