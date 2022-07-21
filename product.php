<?php
session_start();
if (!$_SESSION['limit']){
	$_SESSION['limit'] = 24;
}
include_once('dbcon.php');
require_once 'mobDetect.php';
require_once 'top_head.php';
$detect = new Mobile_Detect;

//получаем содержимое адресной строки
	$protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
	$address = $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$address = str_replace('&sorting=cost', '', $address);
	
	if (stripos($address, '?') === FALSE) {
		$address = $address.'?x=1';
	}


$query = "SELECT * FROM admins WHERE id='3'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$curs = $row['name'];

if ($_GET['id']){
		$id = $_GET['id'];
		$query = "SELECT * FROM product WHERE id = '$id'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		
		$category = $row['category'];
		$sub_category = $row['sub_category'];
		$type = $row['type'];
		$sub_type = $row['sub_type'];
		$vid = $row['vid'];
		$sub_vid = $row['sub_vid'];
		
		$category_ = str_replace('<br>', ' ', $category);
		$sub_category_ = str_replace('<br>', ' ', $sub_category);
		$type_ = str_replace('<br>', ' ', $type);
		$sub_type_ = str_replace('<br>', ' ', $sub_type);
		$vid_ = str_replace('<br>', ' ', $vid);
		$sub_vid_ = str_replace('<br>', ' ', $sub_vid);
		$cost_meta = '';
		if ($row['cost_opt_m'] != '0'){$cost_meta = $row['cost_opt_m'];}
			else{
				if ($row['cost_opt'] != '0'){$cost_meta = $row['cost_opt'];}
					else {$cost_meta = $row['cost'];                                                                                               }
			}
		$cost_meta = round($cost_meta*$curs, 1);
		
		$description_meta = $row['name'].' высокого качества в интернет-магазине Интерткани. Купить за '.$cost_meta.' грн. ✈ Доставка по Украине.';
		if (($category_ != '') AND ($category_ != 'n/a')) {$keywords = $keywords.' '.$category_;}
		if (($sub_category_ != '') AND ($sub_category_ != 'n/a')) {$keywords = $keywords.' '.$sub_category_;}
		if (($type_ != '') AND ($type_ != 'n/a')) {$keywords = $keywords.' '.$type_;}
		if (($sub_type_ != '') AND ($sub_type_ != 'n/a')) {$keywords = $keywords.' '.$sub_type_;}
		if (($vid_ != '') AND ($vid_ != 'n/a')) {$keywords = $keywords.' '.$vid_;}
		if (($sub_vid_ != '') AND ($sub_vid_ != 'n/a')) {$keywords = $keywords.' '.$sub_vid_;}
		$title = $row['name'].' '.$row['color'].' '.$row['proizvoditel'].' купить с доставкой. '.$keywords;
		$keywords = $keywords.' '.$row['proizvoditel'].' '.$row['color'].' '.$row['name'].' купить оптом';
		
		

}
else{
		$category = $_GET['category'];
		$sub_category = $_GET['sub_category'];
		$type = $_GET['type'];
		$sub_type = $_GET['sub_type'];
		$vid = $_GET['vid'];
		$sub_vid = $_GET['sub_vid'];
		if ($category == 'Ткани/'){$category='Ткани';}
		if ($category == 'Фурнитура/'){$category='Фурнитура';}
		if ($category == 'Утеплитель/'){$category='Утеплитель';}
		if ($category == 'Мех/'){$category='Мех';}
	
	if (!$category){
			$query = "SELECT * FROM product ";
		}
		else{
			if (!$sub_category){
				$query = "SELECT * FROM product WHERE category = '$category'";
				$product = $category;
			}
			else{
				if (!$type){
					$query = "SELECT * FROM product WHERE category = '$category' AND sub_category = '$sub_category'";
					$product = $sub_category;
				}
				else{
					if (!$sub_type){
						$query = "SELECT * FROM product WHERE category = '$category' AND sub_category = '$sub_category' AND type = '$type'";
						$product = $type;
					}
					else{
						if (!$vid){
							$query = "SELECT * FROM product WHERE category = '$category' AND sub_category = '$sub_category' AND type = '$type' AND sub_type = '$sub_type'";
							$product = $sub_type;
						}
						else{
							if (!$sub_vid){
								$query = "SELECT * FROM product WHERE category = '$category' AND sub_category = '$sub_category' AND type = '$type' AND sub_type = '$sub_type' AND vid = '$vid'";
								$product = $vid;
							}
							else{
								$query = "SELECT * FROM product WHERE category = '$category' AND sub_category = '$sub_category' AND type = '$type' AND sub_type = '$sub_type' AND vid = '$vid' AND sub_vid = '$sub_vid'";				
								$product = $sub_vid;
							}
						}
					}
				}
			}
		}
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		
		$category = $row['category'];
		$sub_category = $row['sub_category'];
		$type = $row['type'];
		$sub_type = $row['sub_type'];
		$vid = $row['vid'];
		$sub_vid = $row['sub_vid'];
		
		$category_ = str_replace('<br>', ' ', $category);
		$sub_category_ = str_replace('<br>', ' ', $sub_category);
		$type_ = str_replace('<br>', ' ', $type);
		$sub_type_ = str_replace('<br>', ' ', $sub_type);
		$vid_ = str_replace('<br>', ' ', $vid);
		$sub_vid_ = str_replace('<br>', ' ', $sub_vid);
		
		
		$description_meta = $product.' высокого качества в интернет-магазине Интерткани. ✈ Доставка по Украине.';
		if (($category_ != '') AND ($category_ != 'n/a')) {$keywords = $keywords.' '.$category_;}
		if (($sub_category_ != '') AND ($sub_category_ != 'n/a')) {$keywords = $keywords.' '.$sub_category_;}
		if (($type_ != '') AND ($type_ != 'n/a')) {$keywords = $keywords.' '.$type_;}
		if (($sub_type_ != '') AND ($sub_type_ != 'n/a')) {$keywords = $keywords.' '.$sub_type_;}
		if (($vid_ != '') AND ($vid_ != 'n/a')) {$keywords = $keywords.' '.$vid_;}
		if (($sub_vid_ != '') AND ($sub_vid_ != 'n/a')) {$keywords = $keywords.' '.$sub_vid_;}
		$title = $product.' купить. '.$keywords;
		$keywords = $keywords.' купить оптом';
}

	$keywords = str_replace('<br>', ' ', $keywords);
	$title = str_replace('<br>', ' ', $title);
	$description_meta = str_replace('<br>', ' ', $description_meta);
	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MK8336L');</script>
<!-- End Google Tag Manager -->


<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js", "ym");

   ym(64396894, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/64396894" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">
<meta name="description" content="<?php echo $description_meta;?>" />
<meta name="keywords" content="<?php echo $keywords;?>" />


	<title><?php echo $title; ?></title>

	<link rel="stylesheet" href="style.css?<?php echo(mt_rand(10000, 9999999))?>" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js?<?php echo(mt_rand(10000, 9999999))?>"></script>
	<script src="js/ajax_cart.js?<?php echo(mt_rand(10000, 9999999))?>" type="text/javascript"></script>
	<script src="js/main.js?<?php echo(mt_rand(10000, 9999999))?>" type="text/javascript"></script>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<script src="js/wow.min.js"></script>
	
	
	
	<script type="text/javascript">
		window.onload = function(){
			sendform('0','chek');
			if(location.toString().indexOf('id') != -1) {
				preCalc();
			}
		}
	</script>

</head>

<body>
	<script>
		new WOW().init();
	</script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MK8336L"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<input id="current_URL" type="hidden" value="<? echo $address; ?>" />

<div class="loadWindow">
	<div class="cssload-loader loadImg">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
</div>

<div class="spsWindow">
	<p>Готово!</p>
	<p>Мы свяжемся с вами в ближайшее время.</p>
	<p>Спасибо, что обратились к нам.</p>
	<button class="spsWindowCls" onclick="document.location='product.php'">закрыть</button>
</div>

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

<div id="content">
	
	<?php
	$k = null;
	if ($_GET['id']){
		
		$id = $_GET['id'];
		$query = "SELECT * FROM product WHERE id = '$id'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		
		$category = $row['category'];
		$sub_category = $row['sub_category'];
		$type = $row['type'];
		$sub_type = $row['sub_type'];
		$vid = $row['vid'];
		$sub_vid = $row['sub_vid'];
		
		$category_ = str_replace('<br>', ' ', $category);
		$sub_category_ = str_replace('<br>', ' ', $sub_category);
		$type_ = str_replace('<br>', ' ', $type);
		$sub_type_ = str_replace('<br>', ' ', $sub_type);
		$vid_ = str_replace('<br>', ' ', $vid);
		$sub_vid_ = str_replace('<br>', ' ', $sub_vid);
		
	
		
		if ($sub_vid != 'n/a'){
			echo("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
													 > <a href='product.php'>Каталог</a>
													 > <a href='product.php?category=".$category."'>".$category_."</a> 
													 > <a href='product.php?category=".$category."&sub_category=".$sub_category."'>".$sub_category_."</a> 
													 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."'>".$type_."</a> 
													 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."&sub_type=".$sub_type."'>".$sub_type_."</a> 
													 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."&sub_type=".$sub_type."&vid=".$vid."'>".$vid_."</a> 
													 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."&sub_type=".$sub_type."&vid=".$vid."&sub_vid=".$sub_vid."'>".$sub_vid_."</a> 
													 > <span>".str_replace('<br>', ' ', $row['name'])."</span></p></div>");
			$current_category_name = $sub_vid;
			$current_category = 'sub_vid';
			$previous_category = 'vid';
		}
		else{
			if ($vid != 'n/a'){
				echo("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
														 > <a href='product.php'>Каталог</a>
														 > <a href='product.php?category=".$category."'>".$category."</a> 
														 > <a href='product.php?category=".$category."&sub_category=".$sub_category."'>".$sub_category_."</a> 
														 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."'>".$type_."</a> 
														 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."&sub_type=".$sub_type."'>".$sub_type_."</a> 
														 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."&sub_type=".$sub_type."&vid=".$vid."'>".$vid_."</a> 
														 > <span>".str_replace('<br>', ' ', $row['name'])."</span></p></div>");
				$current_category_name = $vid;
				$current_category = 'vid';
				$previous_category = 'sub_type';
			}
			else{
				if ($sub_type != 'n/a'){
					echo("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
															 > <a href='product.php'>Каталог</a>
															 > <a href='product.php?category=".$category."'>".$category_."</a> 
															 > <a href='product.php?category=".$category."&sub_category=".$sub_category."'>".$sub_category_."</a> 
															 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."'>".$type_."</a> 
															 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."&sub_type=".$sub_type."'>".$sub_type_."</a> 
															 > <span>".str_replace('<br>', ' ', $row['name'])."</span></p></div>");
					$current_category_name = $sub_type;
					$current_category = 'sub_type';
					$previous_category = 'type';
				}
				else{
					if ($type != 'n/a'){
						echo("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
															 > <a href='product.php'>Каталог</a>
															 > <a href='product.php?category=".$category."'>".$category_."</a> 
															 > <a href='product.php?category=".$category."&sub_category=".$sub_category."'>".$sub_category_."</a> 
															 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."'>".$type_."</a> 
															> <span>".str_replace('<br>', ' ', $row['name'])."</span></p></div>");
						$current_category_name = $type;
						$current_category = 'type';
						$previous_category = 'sub_category';
					}
					else{
						if ($sub_category != 'n/a'){
							echo("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
															 > <a href='product.php'>Каталог</a>
															 > <a href='product.php?category=".$category."'>".$category_."</a> 
															 > <a href='product.php?category=".$category."&sub_category=".$sub_category."'>".$sub_category_."</a> 
															 > <span>".str_replace('<br>', ' ', $row['name'])."</span></p></div>");
							$current_category_name = $sub_category;
							$current_category = 'sub_category';
							$previous_category = 'category';
						}
						else{
							if ($category){
								echo("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
															 > <a href='product.php'>Каталог</a>
															 > <a href='product.php?category=".$category."'>".$category_."</a> 
															> <span>".str_replace('<br>', ' ', $row['name'])."</span></p></div>");
								$current_category_name = $category;
								$current_category = 'category';
								$previous_category = 'all';
							}
						}
					}
				}		
			}	
		}
		
		echo('<H1 class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s">'.str_replace('<br>', ' ', $row['name']).'</H1>');
		
		?>
		<div class="new_product new_product_I">		
			<div class="product_rect_top">
				<div class="left_nav_wrapper wow animate_animated animate__fadeInLeft" data-wow-duration="0.5s">
					<div class="left_nav">
						<div class="ssd">Меню категорий</div>
						<ul>
						<?php
						$cat = mysql_query('SELECT DISTINCT category FROM product');
						while ($row_ = mysql_fetch_array($cat)){
							?><li><div <? if ($category == $row_['category']) {echo 'class="selected"';} ?> ><a href="<? echo 'product.php?category='.$row_['category']; ?>"><? echo str_replace('<br>', ' ', $row_['category']); ?></a><?php
							$s_cat = mysql_query('SELECT DISTINCT sub_category
												FROM product
												WHERE category = "'.$row_['category'].'"
												AND sub_category <> "n/a"
												AND sub_category <> ""
												ORDER BY sub_category ASC'); 
							
							if (mysql_num_rows($s_cat) > 0){ 
								?><div class="toggle"></div></div><ul <? if ($category == $row_['category']) {echo 'style="display:block"';} else {echo 'style="display:none"';} ?>><?
								while($row_1 = mysql_fetch_array($s_cat)){
									?><li><div <? if ($sub_category == $row_1['sub_category']) {echo 'class="selected"';} ?> ><a href="<? echo 'product.php?category='.$row_['category'].'&sub_category='.$row_1['sub_category']; ?>"><? echo str_replace('<br>', ' ', $row_1['sub_category']); ?></a><?
									$type_q = mysql_query('SELECT DISTINCT type
															FROM product
															WHERE sub_category = "'.$row_1['sub_category'].'"
															AND type <> "n/a"
															AND type <> ""
															ORDER BY type ASC'); 
									
									if (mysql_num_rows($type_q) > 0){
										?><div class="toggle"></div></div><ul <? if ($sub_category == $row_1['sub_category']) {echo 'style="display:block"';} else {echo 'style="display:none"';} ?>><?
										while($row_2 = mysql_fetch_array($type_q)){ 
											?><li><div <? if ($type == $row_2['type']) {echo 'class="selected"';} ?> ><a href="<? echo 'product.php?category='.$row_['category'].'&sub_category='.$row_1['sub_category'].'&type='.$row_2['type']; ?>"><? echo str_replace('<br>', ' ', $row_2['type']); ?></a></div></li><?
											
										}
										?></ul><?
									}
									else{
										?></div><?
									}
									?></li><?
								}
								?></ul><?
							}
							else{
								?></div><?
							}
							?></li><?
						}
						?>
						</ul>
					</div>
				</div>
				<div class="img_w wow animate_animated animate__fadeInUp" data-wow-duration="0.5s" <?php echo("id='$row[id]_'");?>>
					<?php echo("<img alt='".$keywords."' title='".$description_meta."' class='product_image img_to_card' src=$row[img]?".mt_rand(10000, 9999999).">");?>
				</div>
				<div class="modalWinowConteinerProd">
					<?php echo("<img alt='".$keywords."' title='".$description_meta."' class='modalWindow' src=$row[img]>");?>
					<svg class="close_icon" width="23px" height="23px" viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd"> <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect> <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect> </g> </svg>
				</div>
				<div class="order_rect">
					<p class=" wow animate_animated animate__fadeInRightBig" data-wow-duration="0.8s">Цена</p>
						<p id="rozn_c" style="display: none"><?php echo (round($row['cost']*$curs, 1));?></p>
						<p id="opt_m_c" style="display: none"><?php echo (round($row['cost_opt_m']*$curs, 1));?></p>
						<p id="opt_c" style="display: none"><?php echo (round($row['cost_opt']*$curs, 1));?></p>
					<?php 
					if ((($category == 'Фурнитура') and (($id != '1967') and ($id != '1968'))) OR (($row['cost_opt'] == 0) AND ($row['cost_opt_m'] == 0))){
						?><table class=" wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s">
							<tr><td>Цена:</td><td></td><td id="rozn"><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн");?></td></tr> 
							<input id="roll" type="hidden" value="<?php echo ("$row[roll]");?>" />
							<input id="order_summ" type="hidden" value="" />
						</table>
						<?php
					}
					if (($id == '1968') or ($id == '1967')){
						?><table class=" wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s">
							<tr><td>От 3 м:</td><td></td><td id="rozn"><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн");?></td></tr> 
							<tr><td>От 100 м:</td><td></td><td id="opt"><?php echo (round($row['cost_opt']*$curs, 1)."&nbsp;грн");?></td></tr> 
							<input id="roll" type="hidden" value="<?php echo ("$row[roll]");?>" />
							<input id="order_summ" type="hidden" value="" />
						</table>
						<?php
					}
					if ($sub_category == 'Стеганая плащевка'){
						?><table class=" wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s">
							<tr><td>От 3 м:</td><td></td><td id="rozn"><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
							<input id="roll" type="hidden" value="<?php echo ("$row[roll]");?>" />
							<input id="order_summ" type="hidden" value="" />
						</table><?php
					}
					if ($row['name'] == 'Холлофайбер высший сорт'){
						?><table class=" wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s">
							<tr><td>Упаковка 10 кг:</td><td></td><td id="rozn"><?php echo (round($row['cost_opt']*$curs, 1)."&nbsp;грн");?></td></tr> 
							<input id="roll" type="hidden" value="<?php echo ("$row[roll]");?>" />
							<input id="order_summ" type="hidden" value="" />
						</table><?php
					}
					if (($category != 'Фурнитура') and ($sub_category != 'Стеганая плащевка') and ($row['name'] != 'Холлофайбер высший сорт') and ($id != '1967') and ($id != '1968')){ 
						if(($row['cost_opt'] != 0) or ($row['cost_opt_m'] != 0)){
							?><table class=" wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s">
								<tr <? if ($row['cost'] == 0){ echo 'style="display:none;"'; } ?> ><td>От 3 м:</td><td></td><td id="rozn" value="<?php echo ($row['cost']*$curs);?>"><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
								<tr <? if (($row['cost_opt_m'] == 0) OR ($row['cost_opt_m'] == $row['cost'])){ echo 'style="display:none;"'; } ?> ><td>От 10 м:</td><td></td><td id="opt_m"><?php echo (round($row['cost_opt_m']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
								<tr  <? if (($row['cost_opt'] == 0) OR ($row['cost_opt'] == $row['cost_opt_m'])){ echo 'style="display:none;"'; } ?> ><td>От <?php echo ("$row[roll]");?> м:</td><td></td><td id="opt"><?php echo (round($row['cost_opt']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
								<input id="roll" type="hidden" value="<?php echo ("$row[roll]");?>" />
								<input id="order_summ" type="hidden" value="" />
							</table><?php
						}
					}
					?>
					<form class="form wow animate_animated animate__fadeInRightBig" data-wow-duration="1s" action="javascript:void(0);" method="post" name="f<?php echo("$row[id]");?>">
						<div id="decrement">-</div>
						<input id="quantity_field" 
								class="input" 
								type="text" 
								name="quantity" 
								value="1" 
								required="required" 
								placeholder="1"
								onChange="preCalc()"/>
						<div id="increment">+</div>
						<button <?php echo("id='$row[id]'");?> class="button_add_to_card" onclick="sendform('<?php echo("$row[id]");?>','cart_prdct')">добавить в корзину</button>
					</form>
					<div id="summa" class=" wow animate_animated animate__fadeInUpBig" data-wow-duration="1.5s"></div>
				</div>
			</div>
			<div id="description" class=" wow animate_animated animate__fadeInLeftBig" data-wow-duration="1s">
						<p>Описание</p>
						<p id="description_text"><?php echo ("$row[opisanie]");?></p>
					</div>
			<div class="specifications wow animate_animated animate__fadeInLeftBig" data-wow-duration="1s">
				<p>Характеристики</p>
				<?php
					if ($category == 'Фурнитура'){
						?><table>
							<tr><td>Цвет:</td><td id="color" value="<?php echo ("$row[color]");?>"><?php echo ("$row[color]");?></td></tr> 
							<tr><td>Назначение:</td><td id="naznachenie"><?php echo ("$row[naznachenie]");?></td></tr> 
						</table><?php
					}
					else{
						if($sub_category == 'Холлофайбер'){
							?><table>
								<tr><td>Цвет:</td><td id="color" value="<?php echo ("$row[color]");?>"><?php echo ("$row[color]");?></td></tr> 
								<tr><td>Назначение:</td><td id="naznachenie"><?php echo ("$row[naznachenie]");?></td></tr> 
								<tr><td>Производитель:</td><td id="proizvoditel"><?php echo ("$row[proizvoditel]");?></td></tr> 
								<tr><td>Килограмм в упаковке:</td><td id="roll"><?php echo ("$row[roll]");?></td></tr> 
							</table><?php
						}else{
							?><table>
								<tr><td>Цвет:</td><td id="color" value="<?php echo ("$row[color]");?>"><?php echo ("$row[color]");?></td></tr> 
								<tr><td>Назначение:</td><td id="naznachenie"><?php echo ("$row[naznachenie]");?></td></tr> 
								<tr><td>Состав:</td><td id="sostav"><?php echo ("$row[sostav]");?></td></tr> 
								<tr><td>Производитель:</td><td id="proizvoditel"><?php echo ("$row[proizvoditel]");?></td></tr> 
								<tr><td>Ширина рулона:</td><td id="shirina"><?php echo ("$row[shirina]");?></td></tr> 
								<tr><td>Метров в рулоне:</td><td id="roll"><?php echo ("$row[roll]");?></td></tr> 
							</table><?php
						}
					}
					
				?>
			</div>
		</div>
		
		<?
			$query_dop = mysql_query('SELECT DISTINCT * FROM product WHERE '.$current_category.' = "'.$current_category_name.'" LIMIT 0, 20');
			if (mysql_num_rows($query_dop) > 0){
				$nmr = 0;
				$k = 0;
				?>
				<p class="dop_prod_text">Похожие товары</p>
				<div class="content" style="width: 100%;
												margin-left: 0;
												margin: auto;
												border-top: 1px solid #9a9a9a9c;
												min-height: unset;"><?
				while ($row = mysql_fetch_array($query_dop)){
					if ($row['id'] <> $id){
						
						if ($nmr != 4) {
							$nmr = $nmr + 1;
						}
						else{
							$nmr = 1;
						}
			?>
							<div class="product 
										product_ 
										wow 
										animate_animated 
										animate__fadeInUp"
										<? 
										if ($nmr == 1){	echo 'data-wow-duration="0.5s"';}
										if ($nmr == 2){	echo 'data-wow-duration="1s"';}
										if ($nmr == 3){	echo 'data-wow-duration="1.5s"';}
										if ($nmr == 4){	echo 'data-wow-duration="2s"';}
										?> style="visibility: hidden;">
								<a href="<?php echo("product.php?id="."$row[id]");?>">
									<div class="img_rect img_rect_" <?php echo("id='$row[id]_'");?>><?php echo("<img alt='".$keywords."' title='".$title."' class='img_to_card' src=$row[img]?".mt_rand(10000, 9999999).">");?>
										<!--<div class="info info_">
											<p><?php echo("$row[opisanie]");?></p>
										</div>-->
									</div>
								</a>
								<a href="<?php echo("product.php?id="."$row[id]");?>">
									<p><?php echo("$row[name]");?></p>
								</a>
								<form class="form db" action="javascript:void(0);" method="post" name="f<?php echo("$row[id]");?>">
									<div class="price"><?php 
									if ($category == 'Фурнитура'){
										?><table>
											<tr><td>&ensp;&ensp;&ensp;&ensp;&ensp;</td><td></td></tr> 
											<tr><td>Цена:</td><td><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн");?></td></tr> 
											<tr><td></td></tr> 
										</table><?php
									}
									
									if ($sub_category == 'Стеганая плащевка'){
										?><table>
											<tr><td>&ensp;&ensp;&ensp;&ensp;&ensp;</td><td></td></tr> 
											<tr><td>От 3 м:</td><td><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
											<tr><td></td></tr> 
										</table><?php
									}
									
									if ($sub_category == 'Холлофайбер'){
										?><table>
											<tr><td>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</td><td></td></tr> 
											<tr><td>Упаковка 10 кг:</td><td><?php echo (round($row['cost_opt']*$curs, 1)."&nbsp;грн");?></td></tr> 
											<tr><td></td></tr> 
										</table><?php
									}
									
									if ( ($category != 'Фурнитура') and ($sub_category != 'Стеганая плащевка') and ($sub_category != 'Холлофайбер')){
										?><table>
											<tr <? if ($row['cost'] == 0){ echo 'style="display:none;"'; } ?> ><td>От 3 м:</td><td><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
											<tr <? if (($row['cost_opt_m'] == 0) OR ($row['cost_opt_m'] == $row['cost'])){ echo 'style="display:none;"'; } ?> ><td>От 10 м:</td><td><?php echo (round($row['cost_opt_m']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
											<tr <? if (($row['cost_opt'] == 0) OR ($row['cost_opt'] == $row['cost_opt_m'])){ echo 'style="display:none;"'; } ?> ><td>От <?php echo ("$row[roll]");?> м:</td><td><?php echo (round($row['cost_opt']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
										</table><?php
									}?></div>
									<input id="qt_<?php echo("$row[id]"); ?>" class="input" type="hidden" name="quantity" 
											value="<?php 
												$a = 1;
												if ($row['cost'] == 0){ $a = 10; }
												if ($row['cost_opt_m'] == 0){ $a = $row['roll']; }
												if ($row['category'] == 'Фурнитура'){$a = 1;}
												if ($row['sub_category'] == 'Стеганая плащевка'){$a = 1;}
												echo $a;
											?>"/>
									<button class="ggg" onclick="document.location='<?php echo("product.php?id="."$row[id]");?>'">подробнее</button>
									<button <?php echo("id='$row[id]'");?> class="button_add_to_card" onclick="sendform('<?php echo("$row[id]");?>','cart')">в корзину</button>
								</form>
							</div>
						
			<?
					}
				}
				?></div><?
			}
			?>
		<?php
	}
	else{
		$search = $_GET['search']; 
		$category = $_GET['category'];
		$sub_category = $_GET['sub_category'];
		$type = $_GET['type'];
		$sub_type = $_GET['sub_type'];
		$vid = $_GET['vid'];
		$sub_vid = $_GET['sub_vid'];
		if ($_GET['page']){	$page = $_GET['page'];}	else{ $page = 1; }
		if ($_GET['sorting']){ $sorting = $_GET['sorting']; } else { $sorting = 'name';	}
		if ($_GET['order_by']){ $order_by = $_GET['order_by'];	} else { $order_by = 'ASC'; }
		if ($_GET['limit']){ 
			$limit = $_GET['limit']; 
			$_SESSION['limit'] = $_GET['limit'];
		}
		else{
			$limit = $_SESSION['limit'];
		}
		
		
		if ($category == 'Ткани/'){$category='Ткани';}
		if ($category == 'Фурнитура/'){$category='Фурнитура';}
		if ($category == 'Утеплитель/'){$category='Утеплитель';}
		if ($category == 'Мех/'){$category='Мех';}
		
		$category_ = str_replace('<br>', ' ', $category);
		$sub_category_ = str_replace('<br>', ' ', $sub_category);
		$type_ = str_replace('<br>', ' ', $type);
		$sub_type_ = str_replace('<br>', ' ', $sub_type);
		$vid_ = str_replace('<br>', ' ', $vid);
		$sub_vid_ = str_replace('<br>', ' ', $sub_vid);
		
		if (!$search){
			if (!$category){
				$query = "SELECT * FROM product ";
				$nav_panel_top = ("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
											 > <span>Все товары<span></p></div>");
				$name = '<H1 class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="0.7s">Каталог</H1>';
				$current_field = '1';
				$next_field = 'category';
			}
			else{
				if (!$sub_category){
					$query = "SELECT * FROM product WHERE category = '$category' AND visible = '1'";
					$nav_panel_top = ("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
												 > <a href='product.php'>Каталог</a>
												 > <span>".$category_."<span></p></div>");
					$name = '<H1 class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="0.7s">'.$category_.'</H1>';
					$current_field = 'category';
					$next_field = 'sub_category';
					
				}
				else{
					if (!$type){
						$query = "SELECT * FROM product WHERE category = '$category' AND sub_category = '$sub_category' AND visible = '1'";
						$nav_panel_top = ("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
													 > <a href='product.php'>Каталог</a>
													 > <a href='product.php?category=".$category."&sub_category=0'>".$category_."</a>
													 > <span>".$sub_category_."</span></p>
						</div>");
						$name = '<H1 class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="0.7s">'.$sub_category_.'</H1>';
						$current_field = 'sub_category';
						$next_field = 'type';
					}
					else{
						if (!$sub_type){
							$query = "SELECT * FROM product WHERE category = '$category' AND sub_category = '$sub_category' AND type = '$type' AND visible = '1'";
							$nav_panel_top = ("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
														 > <a href='product.php'>Каталог</a>
														 > <a href='product.php?category=".$category."'>".$category_."</a>
														 > <a href='product.php?category=".$category."&sub_category=".$sub_category."'>".$sub_category_."</a>
														 > <span>".$type_."</span></p>
							</div>");
							$name = '<H1 class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="0.7s">'.$type_.'</H1>';
							$current_field = 'type';
							$next_field = 'sub_type';
						}
						else{
							if (!$vid){
								$query = "SELECT * FROM product WHERE category = '$category' AND sub_category = '$sub_category' AND type = '$type' AND sub_type = '$sub_type' AND visible = '1'";
								$nav_panel_top = ("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
															 > <a href='product.php'>Каталог</a>
															 > <a href='product.php?category=".$category."'>".$category_."</a>
															 > <a href='product.php?category=".$category."&sub_category=".$sub_category."'>".$sub_category_."</a>
															 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."'>".$type_."</a>
															 > <span>".$sub_type_."</span></p>
								</div>");
								$name = '<H1 class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="0.7s">'.$sub_type_.'</H1>';
								$current_field = 'sub_type';
								$next_field = 'vid';
							}
							else{
								if (!$sub_vid){
									$query = "SELECT * FROM product WHERE category = '$category' AND sub_category = '$sub_category' AND type = '$type' AND sub_type = '$sub_type' AND vid = '$vid' AND visible = '1'";
									$nav_panel_top = ("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
																 > <a href='product.php'>Каталог</a>
																 > <a href='product.php?category=".$category."'>".$category_."</a>
																 > <a href='product.php?category=".$category."&sub_category=".$sub_category."'>".$sub_category_."</a>
																 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."'>".$type_."</a>
																 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."&sub_type=".$sub_type."'>".$sub_type_."</a>
																 > <span>".$vid_."</span></p>
									</div>");
									$name = '<H1 class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="0.7s">'.$vid_.'</H1>';
									$current_field = 'vid';
									$next_field = 'sub_vid';
								}
								else{
									$query = "SELECT * FROM product WHERE category = '$category' AND sub_category = '$sub_category' AND type = '$type' AND sub_type = '$sub_type' AND vid = '$vid' AND sub_vid = '$sub_vid' AND visible = '1'";

									$nav_panel_top = ("<div class='navigate_panel wow animate_animated animate__fadeInRightBig' data-wow-duration='0.5s'><p><a href='index.php'>Главная</a>
																 > <a href='product.php'>Каталог</a>
																 > <a href='product.php?category=".$category."'>".$category_."</a>
																 > <a href='product.php?category=".$category."&sub_category=".$sub_category."'>".$sub_category_."</a>
																 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."'>".$type_."</a>
																 > <a href='product.php?category=".$category."&sub_category=".$sub_category."&type=".$type."&sub_type=".$sub_type."&vid=".$vid."'>".$vid_."</a>
																 > <span>".$sub_vid_."</span></p>
									</div>");
									$name = '<H1 class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="0.7s">'.$sub_vid_.'</H1>';
									$current_field = 'sub_vid';
									$next_field = 'fin';
								}
							}
						}
					}
				}
			}
		}
		else{
			$query = 'SELECT DISTINCT *
						FROM product
						WHERE '; 
			$search_explode = explode (' ', $search);
			$query = $query.'LOWER(search_name) LIKE LOWER("%'.$search_explode[0].'%")';
			
			for ($i = 1; $i <= count($search_explode)-1; $i++) {
				
				$query = $query.' OR LOWER(search_name) LIKE LOWER("%'.$search_explode[$i].'%")';
				
			}
		
		}
		

		
		$description_text = '';
			
		if ($current_field == 'category'){
			$description_text = $row['category_desc'];
		}
		if ($current_field == 'sub_category'){
			$description_text = $row['sub_category_desc'];
		}
		if ($current_field == 'type'){
			$description_text = $row['type_desc'];
		}
		if ($current_field == 'sub_type'){
			$description_text = $row['sub_type_desc'];
		}
		if ($current_field == 'vid'){
			$description_text = $row['vid_desc'];
		}
		if ($current_field == 'sub_vid'){
			$description_text = $row['sub_vid_desc'];
		}
		
		
		?>
		
		
		<div class="main_wrapper">
		
		<!--генерируем меню категорий-->
			<div class="left_nav_wrapper wow animate_animated animate__fadeInLeft" data-wow-duration="0.5s">
				<div class="left_nav">
					<div class="ssd">Меню категорий</div>
					<ul>
					<?php
					$cat = mysql_query('SELECT DISTINCT category FROM product');
					while ($row = mysql_fetch_array($cat)){
						?><li><div <? if ($category == $row['category']) {echo 'class="selected"';} ?> ><a href="<? echo 'product.php?category='.$row['category']; ?>"><? echo str_replace('<br>', ' ', $row['category']); ?></a><?php
						$s_cat = mysql_query('SELECT DISTINCT sub_category
											FROM product
											WHERE category = "'.$row['category'].'"
											AND sub_category <> "n/a"
											AND sub_category <> ""
											ORDER BY sub_category ASC'); 
						
						if (mysql_num_rows($s_cat) > 0){ 
							?><div class="toggle"></div></div><ul <? if ($category == $row['category']) {echo 'style="display:block"';} else {echo 'style="display:none"';} ?>><?
							while($row_1 = mysql_fetch_array($s_cat)){
								?><li><div <? if ($sub_category == $row_1['sub_category']) {echo 'class="selected"';} ?> ><a href="<? echo 'product.php?category='.$row['category'].'&sub_category='.$row_1['sub_category']; ?>"><? echo str_replace('<br>', ' ', $row_1['sub_category']); ?></a><?
								$type_q = mysql_query('SELECT DISTINCT type
														FROM product
														WHERE sub_category = "'.$row_1['sub_category'].'"
														AND type <> "n/a"
														AND type <> ""
														ORDER BY type ASC'); 
								
								if (mysql_num_rows($type_q) > 0){
									?><div class="toggle"></div></div><ul <? if ($sub_category == $row_1['sub_category']) {echo 'style="display:block"';} else {echo 'style="display:none"';} ?>><?
									while($row_2 = mysql_fetch_array($type_q)){ 
										?><li><div <? if ($type == $row_2['type']) {echo 'class="selected"';} ?> ><a href="<? echo 'product.php?category='.$row['category'].'&sub_category='.$row_1['sub_category'].'&type='.$row_2['type']; ?>"><? echo str_replace('<br>', ' ', $row_2['type']); ?></a></div></li><?
										
									}
									?></ul><?
								}
								else{
									?></div><?
								}
								?></li><?
							}
							?></ul><?
						}
						else{
							?></div><?
						}
						?></li><?
					}
					?>
					</ul>
				</div>
			</div>
		
		
			<div class="content">
			
				<?php
				
				$result = mysql_query($query);
				$num_rows = mysql_num_rows($result);
				$cell = ceil($num_rows/$limit);
				$a = ($page*$limit)-$limit;
				$query = $query." ORDER BY ".$sorting." ".$order_by." LIMIT ".$a.", ".$limit; 
				
				if (($search) AND ($num_rows > 0)){
					$name = '<h1 class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s">Результаты поиска</h1>';
				}
				if (($search) AND ($num_rows == 0)){
					$name = '<h1 class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s">Ничего не найдено</h1>';
				}
				echo $nav_panel_top;
				echo $name;
				
				if ($current_field == 1){
				
				
				?>
				
				
				<table class="product_table wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s">
					<tr>
						<td class="product_table_cell" onclick="document.location='product.php?category=Нетканые материалы&sub_category=Спанбонд'">
							<img src="img/spanbond.jpg" />
							<div class="product_nvg_pnl">
								<p>Спанбонд</p>
								<button onclick="document.location='product.php?category=Нетканые материалы&sub_category=Спанбонд'">подробнее</button>
							</div>
						</td>
						<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Спецткани'">
							<img src="img/spectkani.jpg" />
							<div class="product_nvg_pnl">
								<p>Спецткани</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Спецткани'">подробнее</button>
							</div>
						</td>
						<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Сетка'">
							<img src="img/setka.jpg" />
							<div class="product_nvg_pnl">
								<p>Сетка</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Сетка'">подробнее</button>
							</div>
						</td>
						<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Сумочные%20и%20палаточные'">
							<img src="img/sumial.jpg" />
							<div class="product_nvg_pnl">
								<p>Сумочные ткани</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Сумочные%20и%20палаточные'">подробнее</button>
							</div>
						</td>
					</tr> 
					<tr>
						<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Плащевка'">
							<img src="img/plash.jpg" />
							<div class="product_nvg_pnl">
								<p>Курточные ткани</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Плащевка'">подробнее</button>
							</div>
						</td>
						<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Стеганая плащевка'">
							<img src="img/plash_steg.jpg" />
							<div class="product_nvg_pnl">
								<p>Стеганая плащевка</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Стеганая плащевка'">подробнее</button>
							</div>
						</td>
						<td class="product_table_cell" onclick="document.location='product.php?category=Фурнитура'">
							<img src="img/furnitura.jpg" />
							<div class="product_nvg_pnl">
								<p>Фурнитура</p>
								<button onclick="document.location='product.php?category=Фурнитура'">подробнее</button>
							</div>
						</td>
						<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Подкладка'">
							<img src="img/podkladka.jpg" />
							<div class="product_nvg_pnl">
								<p>Подкладка</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Подкладка'">подробнее</button>
							</div>
						</td>
					</tr> 
					<tr>
						<td class="product_table_cell" onclick="document.location='product.php?category=Мех'">
							<img src="img/mex.jpg" />
							<div class="product_nvg_pnl">
								<p>Мех</p>
								<button onclick="document.location='product.php?category=Мех'">подробнее</button>
							</div>
						</td>
						<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Распродажа'">
							<img src="img/rasprodaja.jpg" />
							<div class="product_nvg_pnl">
								<p>Распродажа</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Распродажа'">подробнее</button>
							</div>
						</td>
						<td class="product_table_cell" onclick="document.location='product.php?category=Утеплитель'">
							<img src="img/utepliteli.jpg" />
							<div class="product_nvg_pnl">
								<p>Утеплитель</p>
								<button onclick="document.location='dress.php'">подробнее</button>
							</div>
						</td>
					</tr> 
				</table>
				
				<table class="product_table_mob wow animate_animated animate__fadeIn" data-wow-duration="0.3s">
					<tr>
						<td class="product_table_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.5s" onclick="document.location='product.php?category=Нетканые материалы&sub_category=Спанбонд'">
							<img src="img/spanbond.jpg" />
							<div class="product_nvg_pnl">
								<p>Спанбонд</p>
								<button onclick="document.location='product.php?category=Нетканые материалы&sub_category=Спанбонд'">подробнее</button>
							</div>
						</td>
					</tr>
					<tr>
						<td class="product_table_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.5s" onclick="document.location='product.php?category=Ткани&sub_category=Спецткани'">
							<img src="img/spectkani.jpg" />
							<div class="product_nvg_pnl">
								<p>Спецткани</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Спецткани'">подробнее</button>
							</div>
						</td>
					</tr>
					<tr>
						<td class="product_table_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.5s" onclick="document.location='product.php?category=Ткани&sub_category=Сетка'">
							<img src="img/setka.jpg" />
							<div class="product_nvg_pnl">
								<p>Сетка</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Сетка'">подробнее</button>
							</div>
						</td>
					</tr>
					<tr>
						<td class="product_table_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.5s" onclick="document.location='product.php?category=Ткани&sub_category=Сумочные%20и%20палаточные'">
							<img src="img/sumial.jpg" />
							<div class="product_nvg_pnl">
								<p>Сумочные ткани</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Сумочные%20и%20палаточные'">подробнее</button>
							</div>
						</td>
					</tr> 
					<tr>
						<td class="product_table_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.5s" onclick="document.location='product.php?category=Ткани&sub_category=Плащевка'">
							<img src="img/plash.jpg" />
							<div class="product_nvg_pnl">
								<p>Курточные ткани</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Плащевка'">подробнее</button>
							</div>
						</td>
					<tr>
					</tr>
						<td class="product_table_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.5s" onclick="document.location='product.php?category=Ткани&sub_category=Стеганая плащевка'">
							<img src="img/plash_steg.jpg" />
							<div class="product_nvg_pnl">
								<p>Стеганая плащевка</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Стеганая плащевка'">подробнее</button>
							</div>
						</td>
					<tr>
					</tr>
						<td class="product_table_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.5s" onclick="document.location='product.php?category=Фурнитура'">
							<img src="img/furnitura.jpg" />
							<div class="product_nvg_pnl">
								<p>Фурнитура</p>
								<button onclick="document.location='product.php?category=Фурнитура'">подробнее</button>
							</div>
						</td>
					<tr>
					</tr>
						<td class="product_table_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.5s" onclick="document.location='product.php?category=Ткани&sub_category=Подкладка'">
							<img src="img/podkladka.jpg" />
							<div class="product_nvg_pnl">
								<p>Подкладка</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Подкладка'">подробнее</button>
							</div>
						</td>
					</tr> 
					<tr>
						<td class="product_table_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.5s" onclick="document.location='product.php?category=Мех'">
							<img src="img/mex.jpg" />
							<div class="product_nvg_pnl">
								<p>Мех</p>
								<button onclick="document.location='product.php?category=Мех'">подробнее</button>
							</div>
						</td>
					</tr> 
					<tr>
						<td class="product_table_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.5s" onclick="document.location='product.php?category=Ткани&sub_category=Распродажа'">
							<img src="img/rasprodaja.jpg" />
							<div class="product_nvg_pnl">
								<p>Распродажа</p>
								<button onclick="document.location='product.php?category=Ткани&sub_category=Распродажа'">подробнее</button>
							</div>
						</td>
					</tr> 
					<tr>
						<td class="product_table_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.5s" onclick="document.location='product.php?category=Утеплитель'">
							<img src="img/utepliteli.jpg" />
							<div class="product_nvg_pnl">
								<p>Утеплитель</p>
								<button onclick="document.location='dress.php'">подробнее</button>
							</div>
						</td>
					</tr> 
				</table>
				
				
				<?
				}
				?>
				
							<div style="display: none;" class="sortirovka wow animate_animated animate__fadeInRightBig" data-wow-duration="1.2s">
								<span>Сортировать по:</span>
								<select class="sort_select sort_p wow animate_animated animate__fadeInRightBig" data-wow-duration="1.5s">
									<option value="0">---</option>
									<option value="&sorting=cost&order_by=DESC">От дорогих к дешевым &#11015;</option>
									<option value="&sorting=cost&order_by=ASC">От дешевым к дорогим &#11014;</option>
									<option value="&sorting=color&order_by=DESC">По цвету &#11015;</option>
									<option value="&sorting=color&order_by=ASC">По цвету &#11014;</option>
									<option value="&sorting=name&order_by=DESC">По названию &#11015;</option>
									<option value="&sorting=name&order_by=ASC">По названию &#11014;</option>
								</select>
							</div>
							
							<div class="sortirovka wow animate_animated animate__fadeInRightBig" data-wow-duration="1.4s">								
								<span>Товаров на странице:&ensp;</span>
								<select class="limit_select sort_p wow animate_animated animate__fadeInRightBig" data-wow-duration="1.7s">
									<option <? if ($limit == 8){ echo 'selected'; } ?> value="&limit=8">8</option>
									<option <? if ($limit == 16){ echo 'selected'; } ?> value="&limit=16">16</option>
									<option <? if ($limit == 24){ echo 'selected'; } ?> value="&limit=24">24</option>
									<option <? if ($limit == 52){ echo 'selected'; } ?> value="&limit=52">52</option>
								</select>
							</div>
							<img class="sort_wait_img" src="img/load.gif" />
				
				<?
				
				
				$result = mysql_query($query);
				$nmr = 0;
				while ($row = mysql_fetch_array($result)){ 
					if ($nmr != 4) {
						$nmr = $nmr + 1;
					}
					else{
						$nmr = 1;
					}
				?>	
			
				<div class="product 
							product_ 
							wow 
							animate_animated 
							animate__fadeInUp"
							<? 
							if ($nmr == 1){	echo 'data-wow-duration="0.5s"';}
							if ($nmr == 2){	echo 'data-wow-duration="1s"';}
							if ($nmr == 3){	echo 'data-wow-duration="1.5s"';}
							if ($nmr == 4){	echo 'data-wow-duration="2s"';}
							
							?>  style="visibility: hidden;">
					<a href="<?php echo("product.php?id="."$row[id]");?>">
						<div class="img_rect img_rect_" <?php echo("id='$row[id]_'");?>><?php echo("<img alt='".$keywords."' title='".$title."' class='img_to_card' src=$row[img]?".mt_rand(10000, 9999999).">");?>
							<!--<div class="info info_">
								<p><?php echo("$row[opisanie]");?></p>
							</div>-->
						</div>
					</a>
					<a href="<?php echo("product.php?id="."$row[id]");?>">
						<p><?php echo("$row[name]");?></p>
					</a>
					<form class="form db" action="javascript:void(0);" method="post" name="f<?php echo("$row[id]");?>">
						<div class="price"><?
						
						if ($row['category'] == 'Фурнитура'){
							?><table>
								<tr><td>&ensp;&ensp;&ensp;&ensp;&ensp;</td><td></td></tr> 
								<tr><td>Цена:</td><td><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн");?></td></tr> 
								<tr><td></td></tr> 
							</table><?php
						} 
						
						if ($row['sub_category'] == 'Стеганая плащевка'){
							?><table>
								<tr><td>&ensp;&ensp;&ensp;&ensp;&ensp;</td><td></td></tr> 
								<tr><td>От 3 м:</td><td><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
								<tr><td></td></tr> 
							</table><?php
						}
						$holl = null;
						$holl = strripos($row['name'], 'Холлофайбер');
						if ($holl > -1){ $holl = -1;
							?><table>
								<tr><td>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</td><td></td></tr> 
								<tr><td>Упаковка 10 кг:</td><td><?php echo (round($row['cost_opt']*$curs, 1)."&nbsp;грн");?></td></tr> 
								<tr><td></td></tr> 
							</table><?php
						}
						
						if ( ($row['category']	 != 'Фурнитура') and ($row['sub_category'] != 'Стеганая плащевка') and ($holl != -1)){
							?><table <?echo "!!!!".$sub_category;?>>
								<tr <? if ($row['cost'] == 0){ echo 'style="display:none;"'; } ?> ><td>От 3 м:</td><td><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
								<tr <? if (($row['cost_opt_m'] == 0) OR ($row['cost_opt_m'] == $row['cost'])){ echo 'style="display:none;"'; } ?> ><td>От 10 м:</td><td><?php echo (round($row['cost_opt_m']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
								<tr <? if (($row['cost_opt'] == 0) OR ($row['cost_opt'] == $row['cost_opt_m'])){ echo 'style="display:none;"'; } ?> ><td>От <?php echo ("$row[roll]");?> м:</td><td><?php echo (round($row['cost_opt']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
							</table><?php
						}?></div>
						<input id="qt_<?php echo("$row[id]"); ?>" class="input" type="hidden" name="quantity" 
								value="<?php 
									$a = 1;
									if ($row['cost'] == 0){ $a = 10; }
									if ($row['cost_opt_m'] == 0){ $a = $row['roll']; }
									if ($row['category'] == 'Фурнитура'){$a = 1;}
									if ($row['sub_category'] == 'Стеганая плащевка'){$a = 1;}
									echo $a;
								?>"/>
						<button class="ggg" onclick="document.location='<?php echo("product.php?id="."$row[id]");?>'">подробнее</button>
						<button <?php echo("id='$row[id]'");?> class="button_add_to_card" onclick="sendform('<?php echo("$row[id]");?>','cart')">в корзину</button>
					</form>
				</div>
		
		<?php
		}
		?>
			</div>
		</div>
		
		<?php
		
	
		
	// формируем список страниц (делаем пагинацию)
	?>
		<div class="pagination_wrapper">
			<ul class="pagination wow animate_animated animate__fadeInLeftBig" data-wow-duration="1s">
	<?php
		$address = str_replace('&page='.$page, '', $address);
		if($cell > 1){
			for ($i = 1; $i <= $cell; $i++) {
				if ($page == $i){
					echo '<li class="active_pagination"><span>'.$page.'</span></li>';
				}
				else{
					echo '<li><a href="'.$address.'&page='.$i.'">'.$i.'</a></li>';
				}
			}

		}
	?>
			</ul>
		</div> 
	<?
	}
	
	?>

		<hr <? if (!$description_text){ echo 'style="display:none;"'; } ?> class="textso_hr">
		
		<?php echo '<p class="description_text">'.$description_text.'</p>'; ?>
		
		<hr class="textso_hr">
		<p class="textso">В нашем интернет-магазине "Интер Ткани" Вы можете купить ткани,утеплители, наполнители и фурнитуру лучшего качества в Украине для швейного, сумочного, обувного производства.</p>
</div>

<?php

echo $foot_bottom;

?>

</body>
</html>

