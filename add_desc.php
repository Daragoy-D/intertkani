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


<div id="content">
<p class="t2">Описание для группы товаров</p>
<div class="client_data" style="height:auto;">
	<form action="javascript:void(0);" name="add_desc" id="add_desc" method="post">
		<?php 
			$query = "SELECT * FROM `product` ORDER BY `category` ASC";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			$current_field = $row['category'];
			?>
			<select id="category_select">
				<option value="">-----------------</option>
				<?php
					echo '<option value="'.$current_field.'">'.$current_field.'</option>'."<br>";
					while ($row = mysql_fetch_array($result)){
						if ($current_field != $row['category']){
							echo $row['category']."<br>";
							$current_field = $row['category'];
							echo '<option value="'.$row['category'].'">'.$row['category'].'</option>';
						}
					}
				?>
			</select>
			<br>
			<img class="wait_img" id="wait_sc" src="img/load.gif" />
			<select id="sub_category_select"></select>
			<img class="wait_img" id="wait_t" src="img/load.gif" />
			<select id="type_select"></select>
			<img class="wait_img" id="wait_st" src="img/load.gif" />
			<select id="sub_type_select"></select>
			<img class="wait_img" id="wait_v" src="img/load.gif" />
			<select id="vid_select"></select>
			<img class="wait_img" id="wait_sv" src="img/load.gif" />
			<select id="sub_vid_select"></select>
			<!--<p>Описание для:</p>
			<p class="direct_hint">dddddddddddddd</p>-->
		<textarea id="description"></textarea>
		<div class="butt_adm" id="add_butt_adm" onclick="func_add_description();">Добавить</div>
		<img id="img_w" src="img/load.gif" style="width:100px; display:none;">
		<div class="product_add_mess_ok">Готово!</div>
		<div class="product_add_mess_err">Ошибка!</div>
		
		<input id="category_fiels" type="hidden" value=0 />
		<input id="sub_category_fiels" type="hidden" value=0 />
		<input id="type_fiels" type="hidden" value=0 />
		<input id="sub_type_fiels" type="hidden" value=0 />
		<input id="vid_fiels" type="hidden" value=0 />
		<input id="sub_vid_fiels" type="hidden" value=0 />
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