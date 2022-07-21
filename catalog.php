<?php
header("Location: product.php");
	exit();
include_once('dbcon.php');
require_once 'top_head.php';
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

<meta name="description" content="Каталог товаров интернет-магазина Интерткани. ✈ Доставка по Украине.">
<meta name="keywords" content=" ткани фурнитура опт доставка по украине">

	<title>Ткани фурнитура оптом и в розницу</title>

	<link rel="stylesheet" href="style.css" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js?<?php echo(mt_rand(10000, 9999999))?>"></script>
	<script src="js/ajax_cart.js?<?php echo(mt_rand(10000, 9999999))?>" type="text/javascript"></script>
	<script src="js/main.js?<?php echo(mt_rand(10000, 9999999))?>" type="text/javascript"></script>
	
	
	<script type="text/javascript">
		window.onload = function(){
			sendform('0','chek');
			}
	</script>
	
	

</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MK8336L"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

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
	<div class="navigate_panel"><p><a href="index.php">Главная</a> > <span>Каталог</span></p></div>
	<p class="t2" style="margin-top: 60px; margin-bottom: 55px;">Каталог</p>
	<table class="product_table_mob">
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Нетканые материалы&sub_category=Спанбонд'">
				<img src="img/spanbond.jpg" />
				<div class="product_nvg_pnl">
					<p>Спанбонд</p>
					<p>Медицинский, мебельный, для швейного производства, для обуви.</p>
					<button onclick="document.location='product.php?category=Нетканые материалы&sub_category=Спанбонд'">подробнее</button>
				</div>
			</td>
		</tr> 
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Спецткани'">
				<img src="img/spectkani.jpg" />
				<div class="product_nvg_pnl">
					<p>Спецткани</p>
					<p>Саржа, Габардин, Грета, Рип-стоп, Рубашечная, Оксфорд .</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Спецткани'">подробнее</button>
				</div>
			</td>
		</tr>
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Стеганая плащевка'">
				<img src="img/plash_steg.jpg" />
				<div class="product_nvg_pnl">
					<p>Стеганая плащевка</p>
					<p>Плащевая ткань, дублированная утеплителем. Стежка образует рельефный рисунок.</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Стеганая плащевка'">подробнее</button>
				</div>
			</td>
		</tr>
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Сетка'">
				<img src="img/setka.jpg" />
				<div class="product_nvg_pnl">
					<p>Сетка</p>
					<p>Сетка обувная, подкладочная, галантерейная.</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Сетка'">подробнее</button>
				</div>
			</td>
		</tr>
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Сумочные%20и%20палаточные'">
				<img src="img/sumial.jpg" />
				<div class="product_nvg_pnl">
					<p>Сумочные и палаточные</p>
					<p></p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Сумочные%20и%20палаточные'">подробнее</button>
				</div>
			</td>
		</tr> 
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Плащевка'">
				<img src="img/plash.jpg" />
				<div class="product_nvg_pnl">
					<p>Курточные ткани</p>
					<p>Плащевка Бостон, Канада, Лаке, Болонь, Президент, Дождик, Дюспо, Аризона, Бантики, Оксфорд одежный и другие.</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Плащевка'">подробнее</button>
				</div>
			</td>
		</tr>
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Подкладка'">
				<img src="img/podkladka.jpg" />
				<div class="product_nvg_pnl">
					<p>Подкладка</p>
					<p>Подкладочная ткань: Бязь (ГОСТ), нейлон, однотонная 170Т, 190Т,подкладка на синтепоне, подкладочная сетка.</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Подкладка'">подробнее</button>
				</div>
			</td>
		</tr> 
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Фурнитура'">
				<img src="img/furnitura.jpg" />
				<div class="product_nvg_pnl">
					<p>Фурнитура</p>
					<p>Тесьма, бейка, кант, этикетка, оборудование для швейного производства: ножницы, клеевые пистолеты, пробойники и прочее.</p>
					<button onclick="document.location='product.php?category=Фурнитура'">подробнее</button>
				</div>
			</td>
		</tr> 
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Мех'">
				<img src="img/mex.jpg" />
				<div class="product_nvg_pnl">
					<p>Мех</p>
					<p></p>
					<button onclick="document.location='product.php?category=Мех'">подробнее</button>
				</div>
			</td>
		</tr> 
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Утеплитель'">
				<img src="img/utepliteli.jpg" />
				<div class="product_nvg_pnl">
					<p>Утеплитель</p>
					<p></p>
					<button onclick="document.location='product.php?category=Мех'">подробнее</button>
				</div>
			</td>
		</tr> 
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Распродажа'">
				<img src="img/rasprodaja.jpg" />
				<div class="product_nvg_pnl">
					<p>Распродажа</p>
					<p></p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Распродажа'">подробнее</button>
				</div>
			</td>
		</tr>
		<tr>
			<td class="product_table_cell" onclick="document.location='dress.php">
				<img src="img/dress/min-2.jpg" />
				<div class="product_nvg_pnl">
					<p>Одежда</p>
					<p></p>
					<button onclick="document.location='dress.php'">подробнее</button>
				</div>
			</td>
		</tr>
	</table>
	<table class="product_table">
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Нетканые материалы&sub_category=Спанбонд'">
				<img src="img/spanbond.jpg" />
				<div class="product_nvg_pnl">
					<p>Спанбонд</p>
					<p>Медицинский, мебельный, для швейного производства, для обуви.</p> 
					<button onclick="document.location='product.php?category=Нетканые материалы&sub_category=Спанбонд'">подробнее</button>
				</div>
			</td>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Спецткани'">
				<img src="img/spectkani.jpg" />
				<div class="product_nvg_pnl">
					<p>Спецткани</p>
					<p>Саржа, Габардин, Грета, Рип-стоп, Рубашечная, Оксфорд .</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Спецткани'">подробнее</button>
				</div>
			</td>
		</tr> 
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Сетка'">
				<img src="img/setka.jpg" />
				<div class="product_nvg_pnl">
					<p>Сетка</p>
					<p>Сетка обувная, подкладочная, галантерейная.</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Сетка'">подробнее</button>
				</div>
			</td>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Сумочные%20и%20палаточные'">
				<img src="img/sumial.jpg" />
				<div class="product_nvg_pnl">
					<p>Сумочные и палаточные</p>
					<p></p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Сумочные%20и%20палаточные'">подробнее</button>
				</div>
			</td>
		</tr> 
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Плащевка'">
				<img src="img/plash.jpg" />
				<div class="product_nvg_pnl">
					<p>Курточные ткани</p>
					<p>Плащевка Бостон, Канада, Лаке, Болонь, Президент, Дождик, Дюспо, Аризона, Бантики, Оксфорд одежный и другие.</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Плащевка'">подробнее</button>
				</div>
			</td>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Стеганая плащевка'">
				<img src="img/plash_steg.jpg" />
				<div class="product_nvg_pnl">
					<p>Стеганая плащевка</p>
					<p>Плащевая ткань, дублированная утеплителем. Стежка образует рельефный рисунок.</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Стеганая плащевка'">подробнее</button>
				</div>
			</td>
		</tr> 
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Фурнитура'">
				<img src="img/furnitura.jpg" />
				<div class="product_nvg_pnl">
					<p>Фурнитура</p>
					<p>Тесьма, бейка, кант, этикетка, оборудование для швейного производства: ножницы, клеевые пистолеты, пробойники и прочее.</p>
					<button onclick="document.location='product.php?category=Фурнитура'">подробнее</button>
				</div>
			</td>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Подкладка'">
				<img src="img/podkladka.jpg" />
				<div class="product_nvg_pnl">
					<p>Подкладка</p>
					<p>Подкладочная ткань: Бязь (ГОСТ), нейлон, однотонная 170Т, 190Т,подкладка на синтепоне, подкладочная сетка.</p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Подкладка'">подробнее</button>
				</div>
			</td>
		</tr> 
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Мех'">
				<img src="img/mex.jpg" />
				<div class="product_nvg_pnl">
					<p>Мех</p>
					<p></p>
					<button onclick="document.location='product.php?category=Мех'">подробнее</button>
				</div>
			</td>
			<td class="product_table_cell" onclick="document.location='product.php?category=Ткани&sub_category=Распродажа'">
				<img src="img/rasprodaja.jpg" />
				<div class="product_nvg_pnl">
					<p>Распродажа</p>
					<p></p>
					<button onclick="document.location='product.php?category=Ткани&sub_category=Распродажа'">подробнее</button>
				</div>
			</td>
		</tr> 
		<tr>
			<td class="product_table_cell" onclick="document.location='product.php?category=Утеплитель'">
				<img src="img/utepliteli.jpg" />
				<div class="product_nvg_pnl">
					<p>Утеплитель</p>
					<p></p>
					<button onclick="document.location='dress.php'">подробнее</button>
				</div>
			</td>
			<td class="product_table_cell">
				<img src="img/dress/min-2.jpg" />
				<div class="product_nvg_pnl">
					<p>Одежда</p>
					<p></p>
					<button onclick="document.location='dress.php'">подробнее</button>
				</div>
			</td>
		</tr> 
		
	</table>
	
	<div class="product_panel"></div>
	
</div>

<?php

echo $foot_bottom;

?>

</body>
</html>

