<?php
session_start();
if (!$_SESSION['cartArr']){
	header("Location: product.php");
	exit();
}
include_once('dbcon.php');
require_once 'top_head.php';

if (!is_array($_SESSION['cartArr'])){
	$_SESSION['cartArr'] = array();
}

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
	<title>Ткани фурнитура оптом и в розницу</title>

	<link rel="stylesheet" href="style.css?<?php echo(mt_rand(10000, 9999999))?>" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js?<?php echo(mt_rand(10000, 9999999))?>"></script>
	<script src="js/ajax_cart.js?<?php echo(mt_rand(10000, 9999999))?>" type="text/javascript"></script>
	<script src="js/main.js?<?php echo(mt_rand(10000, 9999999))?>" type="text/javascript"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<script src="js/wow.min.js"></script>
	
	<script type="text/javascript">
		window.onload = function(){
			sendform('0','chek');
			npLoadAreas();
			}
	</script>
	
<?php 
		$query = "SELECT * FROM product WHERE";
		$arr = $_SESSION['cartArr'];
		foreach ($arr as $key => $q){
			$query = $query."(`id`= ".$key.") OR";
		}
		$query = substr($query, 0, -3);
		$query = $query."ORDER BY type";
		$result = mysql_query($query);
		$n = 0;
		$summ_ord = 0;
		$summ = 0;
		while ($row = mysql_fetch_array($result)){
			foreach ($arr as $key => $q){
				if($key == $row['id']){
						$quant = $q;
				}
			}
			$n=$n+1;
			$rozn = $row['cost'];
			$opt = $row['cost_opt'];
			$opt_m = $row['cost_opt_m'];
			$roll = $row['roll'];
			
			if ($quant<10){
			$summ = $quant*$rozn;
			}
			if (($quant>=10) and ($quant<$roll)){
			$summ = $quant*$opt_m;
			}
			if ($quant>=$roll){
			$summ = $quant*$opt;
			}
			$summ_ord = $summ_ord+$summ;
		}
		
?>

</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MK8336L"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<script>
		new WOW().init();
	</script>

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
	<div class="buy_modal fb_form">
		<form action="javascript:void(0);" name="buy_form_fin" class="buy_form_fin"  method="post">
			<p>Оставьте ваши данные и мы свяжемся с вами</p>
			<p>Ваше имя</p>
			<input class="bf_input" onclick="clear_bord('buy_form_fin',0);" id="c_name" type="text" name="name" required="required" placeholder="Ваше имя"><br>
			<p>Контактный номер телефона</p>
			<input class="bf_input" onclick="clear_bord('buy_form_fin',1);" id="c_phone" type="text" name="phone" required="required" placeholder="Телефон"><br>
			<p>Ваш почтовый ящик</p>
			<input class="bf_input" onclick="clear_bord('buy_form_fin',2);" id="c_mail" type="mail" name="mail" placeholder="Эл. почта"><br>
			<p>Комментарий к заказу</p>
			<textarea class="bf_input" id="c_comm"  name="comments"></textarea><br>
			<button class="buy_btn butt_buy_fin"  onclick="test_form('buy_fast');">Отправить</button>
		</form>
	</div>
	<div class="buy_modal cb_form">
		<form action="javascript:void(0);" name="buy_form_fin" class="buy_form_fin"  method="post">
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
			<div style="display: none;" class="left_nav_wrapper wow animate_animated animate__fadeInLeft" data-wow-duration="0.5s">
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
	
	<div class="navigate_panel wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s" ><p><a href="index.php">Главная</a> > <a href="order.php">Корзина</a> > <span>Оформление заказа</span></p></div>
	<br>
	<p class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="1s" id="title_text">Оформление заказа</p>
	
	<form action="javascript:void(0);" name="buy_form_fin" class="buy_form_fin_" id="buy_form_fin_" method="post">
		<table id="tableInfo">
			<p class="chHeader wow animate_animated animate__fadeInRightBig" data-wow-duration="0.3s">Контактные данные</p>
			<tr class="wow animate_animated animate__fadeInRightBig" data-wow-duration="0.3s"><td><p>Ваше имя</p></td><td><input onclick="clear_bord('buy_form_fin',0);" id="c_name_" type="text" name="name" required="required" /></td></tr> 
			<tr class="wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s"><td><p>Телефон</p></td><td><input onclick="clear_bord('buy_form_fin',1);" id="c_phone_" type="text" name="phone" required="required" /></td></tr> 
			<tr class="wow animate_animated animate__fadeInRightBig" data-wow-duration="0.7s"><td><p>Email</p></td><td><input onclick="clear_bord('buy_form_fin',2);" id="c_mail_" type="mail" name="mail"></td></tr> 
			<tr class="wow animate_animated animate__fadeInRightBig" data-wow-duration="0.9s"><td><p>Комментарий</p></td><td><textarea id="c_comm_"  name="comments"></textarea></td></tr> 
		</table>
		
	</form>
	<div class="delivery">
		<p class="wow animate_animated animate__fadeInRightBig chHeader" data-wow-duration="0.9s">Доставка</p>
		<input class="wow animate_animated animate__fadeInRightBig" data-wow-duration="1s" value="1" type="radio" name="rb" id="rb1" checked><label for="rb1"> Доставка на отделение Новой Почты</label><br><br>
			<table id="npDelivery">
				<tr><td></td><td><select class="npSelect wow animate_animated animate__fadeInRightBig" data-wow-duration="0.7s"" id="npAreas"><option>---------------- Выберите область ----------------</option></select></td></tr> 
				<tr><td></td><td><select class="npSelect wow animate_animated animate__fadeInRightBig" data-wow-duration="0.9s"" id="npCity"></select><img class="npLoad" id="loadCity" src="img/load.svg" /></td></tr> 
				<tr><td></td><td><select class="npSelect wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s"" id="npWarehouses"></select><img class="npLoad" id="loadWarehouses" src="img/load.svg" /></td></tr> 
			</table>
		<input class="wow animate_animated animate__fadeInRightBig" data-wow-duration="0.9s" value="2" type="radio" name="rb" id="rb2"><label for="rb2"> Самовывоз со склада в Харькове</label><br><br>
	</div>
	
	<button class="buy_btn butt_buy_fin"  onclick="test_form('buy');">Оформить заказ</button>
</div>

<?php

echo $foot_bottom;

?>

</body>
</html>


