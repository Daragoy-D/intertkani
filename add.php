<?php
session_start();
if($_SESSION['autorize'] != 1){
	header('location: adm.php');
	exit();
}
header("Cache-Control: no-store, no-cache, must-revalidate");
include_once('dbcon.php');
require_once 'top_head_adm.php';
require_once 'mobDetect.php';
$detect = new Mobile_Detect;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="html">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache">
<meta name="viewport" content="width=device-width">

	<title>Админ</title>

	<link rel="stylesheet" href="style.css?<?php echo(mt_rand(10000, 9999999))?>" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js?<?php echo(mt_rand(10000, 9999999))?>"></script>
	<script src="js/ajax_cart.js?<?php echo(mt_rand(10000, 9999999))?>" type="text/javascript"></script>
	<script src="js/main.js?<?php echo(mt_rand(10000, 9999999))?>" type="text/javascript"></script>


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
			<button class="callback_send butt_buy_fin" id="">Отправить</button>
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
<div class="adm_menu">
	<div style="margin:auto; display:flex;">
		<div class="adm_menu_butt" onclick="document.location.href='add.php'">Добавить</div>
		<div class="adm_menu_butt" onclick="document.location.href='edit.php'">Изменить</div>
		<div class="adm_menu_butt" onclick="document.location.href='add_desc.php'">Описание</div>
		<div class="adm_menu_butt" id="butt_logout" onclick="logout();">Выйти</div>
	</div>
</div>


<div id="content" style="margin-top:0;">
<div class="client_data" style="height:auto;">
	<form action="javascript:void(0);" name="add" id="add" method="post" enctype="multipart/form-data">
		
		<table>
			<tr>
				<td>Название</td>
				<td><input class="input" type="text" name="name" id="name" style="width: 200px;"/></td>
			</tr>
			<tr>
				<td>Розница $</td>
				<td><input class="input" type="text" name="rozn" id="rozn" /></td>
			</tr>
			<tr>
				<td>Мелкий опт $</td>
				<td><input class="input" type="text" name="opt_m" id="opt_m" /></td>
			</tr>
			<tr>
				<td>Опт $</td>
				<td><input class="input" type="text" name="opt" id="opt" /></td>
			</tr>
			<tr>
				<td>Цвет</td>
				<td><input class="input" type="text" name="color" id="color" style="width: 200px;"/></td>
			</tr>
			<tr>
				<td>Описание</td>
				<td><input class="input" type="text" name="opisanie" id="opisanie" style="width: 200px;"/></td>
			</tr>
			<tr>
				<td>Назначение</td>
				<td><input class="input" type="text" name="naznachenie" id="naznachenie" style="width: 200px;"/></td>
			</tr>
			<tr>
				<td>Ширина</td>
				<td><input class="input" type="text" name="shirina" id="shirina" style="width: 200px;"/></td>
			</tr>
			<tr>
				<td>Состав</td>
				<td><input class="input" type="text" name="sostav" id="sostav" style="width: 200px;"/></td>
			</tr>
			<tr>
				<td>Производство</td>
				<td><input class="input" type="text" name="proizvoditel" id="proizvoditel" style="width: 200px;"/></td>
			</tr>
			<tr>
				<td>Метров в рулоне</td>
				<td><input class="input" type="text" name="roll" id="roll" style="width: 200px;"/></td>
			</tr>
		</table>
	
	
	
		<table>
			<tr>
				<td>Категория</td>
				<td><input class="input" type="text" name="category" id="category" style="width: 200px;"/></td>
			</tr>
			<tr>
				<td>Подкатегория</td>
				<td><input class="input" type="text" name="sub_category" id="sub_category" style="width: 200px;"/></td>
			</tr>
			<tr>
				<td>Тип</td>
				<td><input class="input" type="text" name="type" id="type" style="width: 200px;"/></td>
			</tr>
			<tr>
				<td>Подтип</td>
				<td><input class="input" type="text" name="sub_type" id="sub_type" style="width: 200px;"/></td>
			</tr>
			<tr>
				<td>Вид</td>
				<td><input class="input" type="text" name="vid" id="vid" style="width: 200px;"/></td>
			</tr>
			<tr>
				<td>Подвид</td>
				<td><input class="input" type="text" name="sub_vid" id="sub_vid" style="width: 200px;"/></td>
			</tr>
		</table>
		<!----------------------------------------------------------->
		<p>Изображение</p>
		<img id="img_add" src="" style="width:276px; height:276px;" alt="">
		
		<input id="up_file" name="img_add" type="file" onchange="prev_img('add');" accept="image/*">
		<div class="butt_adm" id="add_butt_adm" onclick="func_add();">Добавить</div>
		<img id="img_w" src="img/load.gif" style="width:100px; display:none;">
		<div class="product_add_mess_ok">Готово!</div>
		<div class="product_add_mess_err">Ошибка!</div>
	</form>
</div>
		
		<br><br><br>
<div id="o_1"></div>
</div>

<?php

echo $foot_bottom;

?>

</body>
</html>