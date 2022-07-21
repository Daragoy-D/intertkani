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
	<div class="is_overlay">
		<div class="glass">
		
		</div>
		<!--<video muted autoplay="autoplay" loop="loop" poster="">
			<source src="move.mp4" type="video/mp4" />
		</video>-->
	</div>	
</div>
				<div class="left_nav_wrapper wow animate_animated animate__fadeInLeft" data-wow-duration="0.5s" style="display: none;">
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

			<div class="wrapper">
                <div id="page">
					<div class="prm wow animate_animated animate__fadeIn" data-wow-duration="0.5s">
						<p class="wow animate_animated animate__fadeInLeft" data-wow-duration="1s">Магазин "Интер Ткани"</p>
						<ul>
						    <li class="wow animate_animated animate__fadeInRightBig" data-wow-duration="1.2s">Широкий ассортимент товаров</li>
							<li class="wow animate_animated animate__fadeInRightBig" data-wow-duration="1.4s">Продажа оптом и в розницу</li>
							<li class="wow animate_animated animate__fadeInRightBig" data-wow-duration="1.6s">Быстрая доставка по всей Украине</li>
							<li class="wow animate_animated animate__fadeInRightBig" data-wow-duration="1.8s">Высокое качество товаров</li>
							<li class="wow animate_animated animate__fadeInRightBig" data-wow-duration="2s">Консультация по подбору тканей</li>
							
						</ul>
					</div>
					<ul class="cb-slideshow">
						<li><span></span><div><h3>Курточные ткани</h3></div></li>
						<li><span></span><div><h3>Стеганная плащевка</h3></div></li>
						<li><span></span><div><h3>Ткани для рабочей одежды</h3></div></li>
						<li><span></span><div><h3>Сумочные и палаточные ткани</h3></div></li>
						<li><span></span><div><h3>Утеплитель для курток и пальто</h3></div></li>
						<li><span></span><div><h3>Ткани для SPA-салонов и медицины</h3></div></li>
						<li><span></span><div><h3>Швейная, обувная, сумочная фурнитура</h3></div></li>
					</ul>
					
				</div>
			</div>

<div id="content" style="text-align: initial;">
	
		
	<div class="about">
		<div class="welcome">
			<button onclick="document.location='product.php'">каталог</button><br>
			<h2>Компания «Интер Ткани» на рынке с 1997 года!
				<br>Продажа оптом и в розницу.
			</h2>
			<hr class="delimiter"/>
			<p>В нашем интернет-магазине более 1000 современных видов тканей только лучшего качества, производства Кореи, Китая, Беларуси, Украины для пошива верхней одежды, спортивных костюмов, спецодежды, униформы, корпоративной одежды, а также производства сумок, рюкзаков, палаток и обуви: плащевая, принтованная, стеганая, подкладочная, спецткань, сетка, утеплитель (синтепон, силикон, холлофайбер, слимтекс), клеевые и нетканые материалы (спанбонд, флизелин, дублерин, паутинка) нитки, искусственный мех, швейная фурнитура и другие.
				<br><br>
				На сайте представлены исключительно качественные ткани и швейная фурнитура.<br>
				Удобный каталог поможет Вам выбрать именно то что нужно, по выгодной Вам цене с доставкой по Украине: Киев, Харьков, Винница, Житомир, Львов, Запорожье, Луцк, Ровно, Ивано-Франковск, Кропивницкий, Полтава, Сумы, Одесса, Черновцы, Черкассы, Чернигов, Днепр, Николаев и все районные центры Украины.
			</p>
			
			<p class="asddd">"Интер Ткани" - надежный партнер и поставщик тканей, утеплителей и фурнитуры для пошива верхней одежды, производства обуви и сумок.</p>
			<p>Компания "Интер Ткани" занимается стеганием тканей на утеплителе (синтепон, силикон, тинсулейт) любой сложности.
				<br><br>
				Мы более 20 лет на рынке Украины. С каждым годом ассортимент компании «Интер Ткани» совершенствуется и обновляется, растет количество довольных клиентов, которые работают с нами. Мы гордимся, что выводим на рынок продукты, которые помогают формировать брендам настоящее украинской легкой промышленности.
			</p>
		</div>
		<hr class="delimiter"/>
		<div class="top_orders">
			<div class="top_orders_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.5s" id="tp1">
				<img class="top_orders_img" src="img/plash.jpg?<?php echo(mt_rand(10000, 9999999))?>" />
				<div class="product_info" id="tp1_1">
					<p style="margin-bottom: 46px;">Плащевка</p>
					<hr>
					<p>Плащевка – надежная и водонепроницаемая ткань для пошива куртки, ветровки, плаща и других изделий.</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Плащевка'">подробнее</button>
				</div>
			</div>
			<div class="top_orders_cell wow animate_animated animate__fadeInRight" data-wow-duration="0.7s" id="tp2">
				<img class="top_orders_img" src="img/top_2.jpg?<?php echo(mt_rand(10000, 9999999))?>" />
				<div class="product_info" id="tp2_2">
					<p>Стёганая плащевка</p>
					<hr>
					<p>Классика среди плащевых тканей. Отличное качество по низкой цене.</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Стеганая%20плащевка'">подробнее</button>
				</div>
			</div>
			<div class="top_orders_cell wow animate_animated animate__fadeInRight" data-wow-duration="1s" id="tp3">
				<img class="top_orders_img" src="img/rabodejda.jpg?<?php echo(mt_rand(10000, 9999999))?>" />
				<div class="product_info" id="tp3_3">
					<p>Ткань для рабочей одежды</p>
					<hr>
					<p>100% хлопковые и смесовые ткани для спецодежды.</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Спецткани'">подробнее</button>
				</div>
			</div>
			<div class="top_orders_cell wow animate_animated animate__fadeInRight" data-wow-duration="1.2s" id="tp4">
				<img class="top_orders_img" src="img/sumial.jpg?<?php echo(mt_rand(10000, 9999999))?>" />
				<div class="product_info" id="tp4_4">
					<p>Сумочные и палаточные</p>
					<hr>
					<p>Легкая и сверхпрочная ткань Оксфорд.</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Сумочные%20и%20палаточные'">подробнее</button>
				</div>
			</div>
			<div class="top_orders_cell wow animate_animated animate__fadeInRightBig" data-wow-duration="1.4s" id="tp1">
				<img class="top_orders_img" src="img/spanbond.jpg?<?php echo(mt_rand(10000, 9999999))?>" />
				<div class="product_info" id="tp1_1">
					<p style="margin-bottom: 46px;">Спанбонд</p>
					<hr>
					<p>Экологичный нетканый материал для швейного, мебельного, обувного производства.</p>
					<button onclick="document.location='product.php?category=Нетканые%20материалы&sub_category=Спанбонд'">подробнее</button>
				</div>
			</div>
			<div class="top_orders_cell wow animate_animated animate__fadeInRightBig" data-wow-duration="1.6s" id="tp2">
				<img class="top_orders_img" src="img/utepliteli.jpg?<?php echo(mt_rand(10000, 9999999))?>" />
				<div class="product_info" id="tp2_2">
					<p style="margin-bottom: 46px;">Утеплитель</p>
					<hr>
					<p>Синтепон, силикон, слимтекс, холлофайбер.</p>
					<button onclick="document.location='product.php?category=Утеплитель'">подробнее</button>
				</div>
			</div>
			<div class="top_orders_cell wow animate_animated animate__fadeInRightBig" data-wow-duration="1.8s" id="tp3">
				<img class="top_orders_img" src="img/furnitura.jpg?<?php echo(mt_rand(10000, 9999999))?>" />
				<div class="product_info" id="tp3_3">
					<p style="margin-bottom: 46px;">Фурнитура</p>
					<hr>
					<p>Ножницы, станки, пистолеты, бирки, крепежи, тесьма, лента, резинка, карабины и др...</p>
					<button onclick="document.location='product.php?category=Фурнитура'">подробнее</button>
				</div>
			</div>
		</div>
		<div class="top_orders">
			
		</div>
	</div>
</div>

<?php

echo $foot_bottom;

?>


</body>
</html>

