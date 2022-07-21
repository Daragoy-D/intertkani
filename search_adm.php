<?php
session_start();
if($_SESSION['autorize'] != 1){
	header('location: adm.php');
	exit();
}

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
	<?php
	$search_field = $_GET['search_field'];
	$query = "SELECT *
				FROM product
				WHERE LOWER(name) LIKE LOWER('%$search_field%')
				OR LOWER(category) LIKE LOWER('%$search_field%')
				OR LOWER(sub_category) LIKE LOWER('%$search_field%')
				OR LOWER(TYPE) LIKE LOWER('%$search_field%')
				OR LOWER(sub_type) LIKE LOWER('%$search_field%')
				OR LOWER(search_name) LIKE LOWER('%$search_field%')
				ORDER BY id DESC";
	$result = mysql_query($query);	
	$res = mysql_query($query);
	if(mysql_fetch_row($res))
		{
			echo('<p class="t2">Результаты поиска</p>');
			$res=null;		
		}
	else{
			echo('<p class="t2">По вашему запросу ничего не найдено</p>');
			$res=null;
		}
		
	$n = null;
	$i = 1;
	if ( $detect->isMobile() ) { 
		$r = 2;
	}
	else{
		$r = 5;
	}
	echo('<div class="new_product_adm">');
	while ($row = mysql_fetch_array($result)){
		$n = $n+1;
		if ($n!=$r){
	?>
	
		<div class="product_adm">
			<div class="deleted_pr" id="deleted_pr_<?php echo("$row[id]");?>">
				Удалён
			</div>
			<form action="javascript:void(0);" method="post" name="f<?php echo("$row[id]");?>" enctype="multipart/form-data">
				<div class="img_rect_adm">
					<img id="img_<?php echo("$row[id]");?>" src="<?php echo("$row[img]");?>">
					<input style="width:115px" id="up_file_<?php echo("$row[id]");?>" name="img_product" type="file" accept="image/*" onchange="prev_img('<?php echo("$row[id]");?>');" />
				</div>
				<div class="info__">
					<input id="name_<?php echo ("$row[id]");?>" onchange="edit_field_changed('name_<?php echo ("$row[id]");?>');" type="text" name="name" value="<?php echo("$row[name]");?>"><br>
				</div>
				<div class="product_info_adm">
					<p class="t4">расположение</p>
					<table class="t_adm_1">
						<tr>
							<td>Категория</td>
							<td><input onchange="edit_field_changed('category_<?php echo ("$row[id]");?>');" class="input" type="text" name="category" id="category_<?php echo ("$row[id]");?>" value="<?php echo ("$row[category]");?>" /></td>
						</tr>
						<tr>
							<td>Подкатег.</td>
							<td><input onchange="edit_field_changed('sub_category_<?php echo ("$row[id]");?>');" class="input" type="text" name="sub_category" id="sub_category_<?php echo ("$row[id]");?>" value="<?php echo ("$row[sub_category]");?>" /></td>
						</tr>
						<tr>
							<td>Тип</td>
							<td><input onchange="edit_field_changed('type_<?php echo ("$row[id]");?>');" class="input" type="text" name="type" id="type_<?php echo ("$row[id]");?>" value="<?php echo ("$row[type]");?>" /></td>
						</tr>
						<tr>
							<td>Подтип</td>
							<td><input onchange="edit_field_changed('sub_type_<?php echo ("$row[id]");?>');" class="input" type="text" name="sub_type" id="sub_type_<?php echo ("$row[id]");?>" value="<?php echo ("$row[sub_type]");?>" /></td>
						</tr>
						<tr>
							<td>Вид</td>
							<td><input onchange="edit_field_changed('vid_<?php echo ("$row[id]");?>');" class="input" type="text" name="vid" id="vid_<?php echo ("$row[id]");?>" value="<?php echo ("$row[vid]");?>" /></td>
						</tr>
						<tr>
							<td>Подвид</td>
							<td><input onchange="edit_field_changed('sub_vid_<?php echo ("$row[id]");?>');" class="input" type="text" name="sub_vid" id="sub_vid_<?php echo ("$row[id]");?>" value="<?php echo ("$row[sub_vid]");?>" /></td>
						</tr>
					</table>
					<p class="t4">цена</p>
					<table>
						<tr>
							<td>Розница $</td>
							<td><input onchange="edit_field_changed('rozn_<?php echo ("$row[id]");?>');" class="input" type="text" name="rozn" id="rozn_<?php echo ("$row[id]");?>" value="<?php echo ($row['cost']);?>" /></td>
						</tr>
						<tr>
							<td>Мелкий опт $</td>
							<td><input onchange="edit_field_changed('opt_m_<?php echo ("$row[id]");?>');" class="input" type="text" name="opt_m" id="opt_m_<?php echo ("$row[id]");?>" value="<?php echo ($row['cost_opt_m']);?>" /></td>
						</tr>
						<tr>
							<td>Опт $</td>
							<td><input onchange="edit_field_changed('opt_<?php echo ("$row[id]");?>');" class="input" type="text" name="opt" id="opt_<?php echo ("$row[id]");?>" value="<?php echo ($row['cost_opt']);?>" /></td>
						</tr>
					</table>
					<p class="t4">характеристики</p>
					<table>
						<tr>
							<td>Описание</td>
							<td></td>
						</tr>
						<tr>
							<td><textarea onchange="edit_field_changed('desc_<?php echo ("$row[id]");?>');" class="input" name="desc" id="desc_<?php echo ("$row[id]");?>" value="<?php echo ("$row[opisanie]");?>"><?php echo ("$row[opisanie]");?></textarea></td>
							<td></td>
						</tr>
						<tr>
							<td>Назначение</td>
							<td></td>
						</tr>
						<tr>
							<td><textarea onchange="edit_field_changed('naznachenie_<?php echo ("$row[id]");?>');" class="input" name="naznachenie" id="naznachenie_<?php echo ("$row[id]");?>" value="<?php echo ("$row[naznachenie]");?>"><?php echo ("$row[naznachenie]");?></textarea></td>
							<td></td>
						</tr>
					</table>
					<table class="t_adm_1">
						<tr>
							<td>Цвет</td>
							<td><input onchange="edit_field_changed(color_<?php echo ("$row[id]");?>');" class="input" type="text" name="color" id="color_<?php echo ("$row[id]");?>" value="<?php echo ("$row[color]");?>" /></td>
						</tr>
						<tr>
							<td>Рулон м.</td>
							<td><input onchange="edit_field_changed(roll_<?php echo ("$row[id]");?>');" class="input" type="text" name="roll" id="roll_<?php echo ("$row[id]");?>" value="<?php echo ("$row[roll]");?>" /></td>
						</tr>
						<tr>
							<td>Ширина</td>
							<td><input onchange="edit_field_changed('shirina_<?php echo ("$row[id]");?>');" class="input" type="text" name="shirina" id="shirina_<?php echo ("$row[id]");?>" value="<?php echo ("$row[shirina]");?>" /></td>
						</tr>
						<tr>
							<td>Состав</td>
							<td><input onchange="edit_field_changed('sostav_<?php echo ("$row[id]");?>');" class="input" type="text" name="sostav" id="sostav_<?php echo ("$row[id]");?>" value="<?php echo ("$row[sostav]");?>" /></td>
						</tr>
						<tr>
							<td>Произв.</td>
							<td><input onchange="edit_field_changed('proizvoditel_<?php echo ("$row[id]");?>');" class="input" type="text" name="proizvoditel" id="proizvoditel_<?php echo ("$row[id]");?>" value="<?php echo ("$row[proizvoditel]");?>" /></td>
						</tr>
						<tr>
							<td>Рейтинг</td>
							<td><input onchange="edit_field_changed('rating_<?php echo ("$row[id]");?>');" class="input" type="text" name="rating" id="rating_<?php echo ("$row[id]");?>" value="<?php echo ("$row[rating]");?>" /></td>
						</tr>
						<tr>
							<td>Показывать</td>
							<td><input onclick="edit_check_visible('visible_<?php echo ("$row[id]");?>');" class="input" type="checkbox" name="visible" id="visible_<?php echo ("$row[id]");?>" value="<?php echo ("$row[visible]");?>" <?php if ("$row[visible]" == "1"){ echo ("checked"); } ?> /></td>
						</tr>
					</table>
					<input class="butt_adm" type="submit" value="Применить" onclick="func_edit('<?php echo("$row[id]");?>')">
					<div class="del_butt" 
						 id="del_butt_<?php echo("$row[id]");?>"
						 onclick="del_prod('alert_open',<?php echo("$row[id]");?>);">
						 Удалить товар
					</div>
					<img id="img_w<?php echo("$row[id]");?>" src="img/wait.gif" style="margin-left:15px; display:none;">
					<img id="img_o<?php echo("$row[id]");?>" src="img/ok.png" style="margin-left:24px; display:none; height:40px;">
				</div>
			</form>
			<div style="display:none;" class="del_alert" id="del_alert_<?php echo("$row[id]");?>">
				<img id="del_alert_img_<?php echo("$row[id]");?>" src="img/alert.png" height="50">
				<div class="del_alert_text">Точно удалить товар: "<?php echo("$row[name]");?>"?</div>
				<div id="butt_conteiner">
					<div onclick="del_prod('delete',<?php echo("$row[id]");?>);" class="del_alert_butt">Да</div>
					<div onclick="del_prod('alert_close',<?php echo("$row[id]");?>);" class="del_alert_butt">Нет</div>
				</div>
			</div>
		</div>
	
	<?php }
		else{$n=1; echo('</div><div class="new_product_adm">');?>
	
		<div class="product_adm">
			<div class="deleted_pr" id="deleted_pr_<?php echo("$row[id]");?>">
				Удалён
			</div>
			<form action="javascript:void(0);" method="post" name="f<?php echo("$row[id]");?>" enctype="multipart/form-data">
				<div class="img_rect_adm">
					<img id="img_<?php echo("$row[id]");?>" src="<?php echo("$row[img]");?>">
					<input style="width:115px" id="up_file_<?php echo("$row[id]");?>" name="img_product" type="file" accept="image/*" onchange="prev_img('<?php echo("$row[id]");?>');" />
				</div>
				<div class="info__">
					<input id="name_<?php echo ("$row[id]");?>" onchange="edit_field_changed('name_<?php echo ("$row[id]");?>');" type="text" name="name" value="<?php echo("$row[name]");?>"><br>
				</div>
				<div class="product_info_adm">
					<p class="t4">расположение</p>
					<table class="t_adm_1">
						<tr>
							<td>Категория</td>
							<td><input onchange="edit_field_changed('category_<?php echo ("$row[id]");?>');" class="input" type="text" name="category" id="category_<?php echo ("$row[id]");?>" value="<?php echo ("$row[category]");?>" /></td>
						</tr>
						<tr>
							<td>Подкатег.</td>
							<td><input onchange="edit_field_changed('sub_category_<?php echo ("$row[id]");?>');" class="input" type="text" name="sub_category" id="sub_category_<?php echo ("$row[id]");?>" value="<?php echo ("$row[sub_category]");?>" /></td>
						</tr>
						<tr>
							<td>Тип</td>
							<td><input onchange="edit_field_changed('type_<?php echo ("$row[id]");?>');" class="input" type="text" name="type" id="type_<?php echo ("$row[id]");?>" value="<?php echo ("$row[type]");?>" /></td>
						</tr>
						<tr>
							<td>Подтип</td>
							<td><input onchange="edit_field_changed('sub_type_<?php echo ("$row[id]");?>');" class="input" type="text" name="sub_type" id="sub_type_<?php echo ("$row[id]");?>" value="<?php echo ("$row[sub_type]");?>" /></td>
						</tr>
						<tr>
							<td>Вид</td>
							<td><input onchange="edit_field_changed('vid_<?php echo ("$row[id]");?>');" class="input" type="text" name="vid" id="vid_<?php echo ("$row[id]");?>" value="<?php echo ("$row[vid]");?>" /></td>
						</tr>
						<tr>
							<td>Подвид</td>
							<td><input onchange="edit_field_changed('sub_vid_<?php echo ("$row[id]");?>');" class="input" type="text" name="sub_vid" id="sub_vid_<?php echo ("$row[id]");?>" value="<?php echo ("$row[sub_vid]");?>" /></td>
						</tr>
					</table>
					<p class="t4">цена</p>
					<table>
						<tr>
							<td>Розница $</td>
							<td><input onchange="edit_field_changed('rozn_<?php echo ("$row[id]");?>');" class="input" type="text" name="rozn" id="rozn_<?php echo ("$row[id]");?>" value="<?php echo ($row['cost']);?>" /></td>
						</tr>
						<tr>
							<td>Мелкий опт $</td>
							<td><input onchange="edit_field_changed('opt_m_<?php echo ("$row[id]");?>');" class="input" type="text" name="opt_m" id="opt_m_<?php echo ("$row[id]");?>" value="<?php echo ($row['cost_opt_m']);?>" /></td>
						</tr>
						<tr>
							<td>Опт $</td>
							<td><input onchange="edit_field_changed('opt_<?php echo ("$row[id]");?>');" class="input" type="text" name="opt" id="opt_<?php echo ("$row[id]");?>" value="<?php echo ($row['cost_opt']);?>" /></td>
						</tr>
					</table>
					<p class="t4">характеристики</p>
					<table>
						<tr>
							<td>Описание</td>
							<td></td>
						</tr>
						<tr>
							<td><textarea onchange="edit_field_changed('desc_<?php echo ("$row[id]");?>');" class="input" name="desc" id="desc_<?php echo ("$row[id]");?>" value="<?php echo ("$row[opisanie]");?>"><?php echo ("$row[opisanie]");?></textarea></td>
							<td></td>
						</tr>
						<tr>
							<td>Назначение</td>
							<td></td>
						</tr>
						<tr>
							<td><textarea onchange="edit_field_changed('naznachenie_<?php echo ("$row[id]");?>');" class="input" name="naznachenie" id="naznachenie_<?php echo ("$row[id]");?>" value="<?php echo ("$row[naznachenie]");?>"><?php echo ("$row[naznachenie]");?></textarea></td>
							<td></td>
						</tr>
					</table>
					<table class="t_adm_1">
						<tr>
							<td>Цвет</td>
							<td><input onchange="edit_field_changed(color_<?php echo ("$row[id]");?>');" class="input" type="text" name="color" id="color_<?php echo ("$row[id]");?>" value="<?php echo ("$row[color]");?>" /></td>
						</tr>
						<tr>
							<td>Рулон м.</td>
							<td><input onchange="edit_field_changed(roll_<?php echo ("$row[id]");?>');" class="input" type="text" name="roll" id="roll_<?php echo ("$row[id]");?>" value="<?php echo ("$row[roll]");?>" /></td>
						</tr>
						<tr>
							<td>Ширина</td>
							<td><input onchange="edit_field_changed('shirina_<?php echo ("$row[id]");?>');" class="input" type="text" name="shirina" id="shirina_<?php echo ("$row[id]");?>" value="<?php echo ("$row[shirina]");?>" /></td>
						</tr>
						<tr>
							<td>Состав</td>
							<td><input onchange="edit_field_changed('sostav_<?php echo ("$row[id]");?>');" class="input" type="text" name="sostav" id="sostav_<?php echo ("$row[id]");?>" value="<?php echo ("$row[sostav]");?>" /></td>
						</tr>
						<tr>
							<td>Произв.</td>
							<td><input onchange="edit_field_changed('proizvoditel_<?php echo ("$row[id]");?>');" class="input" type="text" name="proizvoditel" id="proizvoditel_<?php echo ("$row[id]");?>" value="<?php echo ("$row[proizvoditel]");?>" /></td>
						</tr>
						<tr>
							<td>Рейтинг</td>
							<td><input onchange="edit_field_changed('rating_<?php echo ("$row[id]");?>');" class="input" type="text" name="rating" id="rating_<?php echo ("$row[id]");?>" value="<?php echo ("$row[rating]");?>" /></td>
						</tr>
						<tr>
							<td>Показывать</td>
							<td><input onclick="edit_check_visible('visible_<?php echo ("$row[id]");?>');" class="input" type="checkbox" name="visible" id="visible_<?php echo ("$row[id]");?>" value="<?php echo ("$row[visible]");?>" <?php if ("$row[visible]" == "1"){ echo ("checked"); } ?> /></td>
						</tr>
					</table>
					<input class="butt_adm" type="submit" value="Применить" onclick="func_edit('<?php echo("$row[id]");?>')">
					<div class="del_butt" 
						 id="del_butt_<?php echo("$row[id]");?>"
						 onclick="del_prod('alert_open',<?php echo("$row[id]");?>);">
						 Удалить товар
					</div>
					<img id="img_w<?php echo("$row[id]");?>" src="img/wait.gif" style="margin-left:15px; display:none;">
					<img id="img_o<?php echo("$row[id]");?>" src="img/ok.png" style="margin-left:24px; display:none; height:40px;">
				</div>
			</form>
			<div style="display:none;" class="del_alert" id="del_alert_<?php echo("$row[id]");?>">
				<img id="del_alert_img_<?php echo("$row[id]");?>" src="img/alert.png" height="50">
				<div class="del_alert_text">Точно удалить товар: "<?php echo("$row[name]");?>"?</div>
				<div id="butt_conteiner">
					<div onclick="del_prod('delete',<?php echo("$row[id]");?>);" class="del_alert_butt">Да</div>
					<div onclick="del_prod('alert_close',<?php echo("$row[id]");?>);" class="del_alert_butt">Нет</div>
				</div>
			</div>
		</div>
	
		<?php	}
	}
			
	?>
</div>
</div>
	
<?php

echo $foot_bottom;

?>


</body>
</html>