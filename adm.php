<?php
session_start();
include_once('dbcon.php');
require_once 'top_head_adm.php';

if (!is_array($_SESSION['cartArr'])){
	$_SESSION['cartArr'] = array();
}
$qqq = 'tkaniinter2020';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="html">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">

	<title>Качественные кальяны по выгодным ценам</title>

	<link rel="stylesheet" href="style.css" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="js/ajax_cart.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
	
	

</head>

<body>
<div class="modalWinowConteiner" id="modalWinowConteiner">
	<div class="buy_modal">
		<form action="javascript:void(0);" name="buy_form_fin" class="buy_form_fin" id="buy_form_fin" method="post">
			<p>Оставьте ваш номер телефона и мы свяжемся с вами</p>
			<p>Ваше имя</p>
			<input onclick="clear_bord('buy_form_fin',0);" id="c_name_cb" type="text" name="name" required="required" placeholder="Ваше имя"><br>
			<p>Контактный номер телефона</p>
			<input onclick="clear_bord('buy_form_fin',1);" id="c_phone_cb" type="text" name="phone" required="required" placeholder="Телефон"><br>	
			<button class="callback_send butt_buy_fin">Отправить</button>
			</form>
	</div>
	<svg class="close_icon" width="23px" height="23px" viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd"> <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect> <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect> </g> </svg>
</div>

<?php

echo $head_top;

?>


<div id="head">
	<div class="is_overlay other">
		<div class="glass">
		</div>
	</div>	
</div>

<div id="content" style="height: 55vh; margin-top:0;">
<div id="client_data">		
	<p id="c_form_data_text"></p>
	<form action="javascript:void(0);" name="adm" id="adm" method="post">
		
		<input onclick="clear_bord('adm',0);" id="c_name" type="text" name="login" required="required" placeholder="login"><br>
		
		<input onclick="clear_bord('adm',1);" id="c_phone" type="password" name="pass" required="required" placeholder="password"><br>	
		<div class="ab" id="butt_buy_fin" onclick="test_form('adm');">Войти</div><br>
	</form>
</div>
		
		
<div id="o_1"></div>
</div>

<?php

echo $foot_bottom;

?>

</body>
</html>