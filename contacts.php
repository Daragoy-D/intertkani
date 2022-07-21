<?php
require_once 'mobDetect.php';
$detect = new Mobile_Detect;
session_start();
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
<meta name="description" content="Ткани, фурнитура, одежда высокого качества в интернет-магазине Интерткани. ✈ Доставка по Украине.">
<meta name="viewport" content="width=device-width">
	<title>Ткани фурнитура оптом и в розницу</title>

	<link rel="stylesheet" href="style.css?<?php echo(mt_rand(10000, 9999999))?>" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js?<?php echo(mt_rand(10000, 9999999))?>"></script>
	<script src="js/ajax_cart.js?<?php echo(mt_rand(10000, 9999999))?>" type="text/javascript"></script>
	<script src="js/main.js?<?php echo(mt_rand(10000, 9999999))?>" type="text/javascript"></script>
	<link rel="stylesheet" href="css/sld.css">
	<script src="js/modernizr.js"></script>
	<script src="js/modernizr.custom.86080.js"></script>
	
	<script type="text/javascript">
		window.onload = function(){
			sendform('0','chek');
			}
	</script>
	
	
    <link rel="stylesheet" type="text/css" href="slider_css/style.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<script src="js/wow.min.js"></script>
	
	

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
	<button class="spsWindowCls" onclick="document.location='catalog.php'">закрыть</button>
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
		
		
			<div class="content" style="padding-bottom: 0;">
				<div class="navigate_panel wow animate_ animate__fadeInRightBig animated" data-wow-duration="0.5s" style="visibility: visible; animation-duration: 0.5s; animation-name: fadeInRightBig;">
				<p><a href="index.php">Главная</a> &gt; <span>Контакты<span></span></span></p></div>
				<h1 class="t2 wow animate_ animate__fadeInRightBig animated" data-wow-duration="0.7s" style="visibility: visible; animation-duration: 0.7s; animation-name: fadeInRightBig;">Контакты</h1>
				<div class="cntct_wrap">
					<img class="cntct" src="img/cntct.jpg" />
					<p class="cntct_text">
						<b>График работы:</b>
						<br><br>
						ПН-ПТ с 9:00 до 17:00<br>
						СБ-ВС с 9:00 до 14:00
						<br><br>
						Заказы через сайт принимаем круглосуточно и без выходных
						<br><br>
						Доставка по всей Украине.<br>
						Проспектная улица, ТЦ Барабашово, Площадка Ткани и фурнитура.<br>
					
					</p>
				</div>
				<br>
				<p class="cntct_text"><b>Карта проезда в магазин Интерткани, г. Харьков</b></p><br>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d906.6540722893267!2d36.29801277690462!3d50.003764347947026!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTDCsDAwJzEzLjYiTiAzNsKwMTcnNTIuMiJF!5e0!3m2!1sru!2sua!4v1611865183413!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				<p class="textso" style="text-align: left;">В нашем интернет-магазине "Интер Ткани" Вы можете купить ткани,утеплители, наполнители и фурнитуру лучшего качества в Украине для швейного, сумочного, обувного производства.</p>
			</div>
			
		</div>
		
	</div>
<?php

echo $foot_bottom;

?>


</body>
</html>

