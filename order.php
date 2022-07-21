<?php
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
			}
	</script>
	
	

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
	<div class="buy_modal fb_form">
		<form action="javascript:void(0);" name="buy_form_fin" class="buy_form_fin" id="buy_form_fin" method="post">
			<p>Оставьте ваши данные и мы свяжемся с вами</p>
			<p>Ваше имя</p>
			<input class="bf_input" onclick="clear_bord('buy_form_fin',0);" id="c_name" type="text" name="name" required="required" placeholder="Ваше имя"><br>
			<p>Контактный номер телефона</p>
			<input class="bf_input" onclick="clear_bord('buy_form_fin',1);" id="c_phone" type="text" name="phone" required="required" placeholder="Телефон"><br>
			<p>Ваш почтовый ящик</p>
			<input class="bf_input" onclick="clear_bord('buy_form_fin',2);" id="c_mail" type="mail" name="mail" placeholder="Эл. почта"><br>
			<p>Комментарий к заказу</p>
			<textarea class="bf_input" id="c_comm"  name="comments"></textarea><br>
			<button class="buy_btn butt_buy_fin" id="" onclick="test_form('buy_fast');">Отправить</button>
		</form>
	</div>
	<div class="buy_modal cb_form">
		<form action="javascript:void(0);" name="buy_form_fin" class="buy_form_fin" id="buy_form_fin" method="post">
			<p>Оставьте ваш номер телефона и мы свяжемся с вами</p>
			<p>Ваше имя</p>
			<input onclick="clear_bord('buy_form_fin',0);" id="c_name_cb" type="text" name="name" required="required" placeholder="Ваше имя"><br>
			<p>Контактный номер телефона</p>
			<input onclick="clear_bord('buy_form_fin',1);" id="c_phone_cb" type="text" name="phone" required="required" placeholder="Телефон"><br>	
			<button class="callback_send butt_buy_fin" id="">Отправить</button>
		</form>
	</div>
	<div class="buy_modal ab_form">
		<form action="javascript:void(0);" name="buy_form_fin" class="buy_form_fin" id="buy_form_fin" method="post">
			<p>Сумма заказа должна быть не меньше 300 грн</p>	
			<button class="close_icon callback_send butt_buy_fin" id="">Закрыть</button>
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
	
	<div class="navigate_panel wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s"><p><a href="index.php">Главная</a> > <span>Корзина</span></p></div>
	
	<?
	if (!$_SESSION['cartArr']){
		echo '<p class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s" id="title_text" style="margin-top: 0px; margin-bottom: -20px;">Корзина пуста</p>';
		echo '<a href="product.php" 
					class="t1 wow animate_animated animate__fadeInRightBig" data-wow-duration="1s"">Исправить >>></a>';
	}
	else{
		
	
	?>
	<p class="t2 wow animate_animated animate__fadeInRightBig" data-wow-duration="0.5s" id="title_text" style="margin-top: 0px; margin-bottom: -20px;">Корзина</p>
	<div class="order_fields" id="ord">
		<div class="order_text">
			<div class="order_photo"><span>Фото</span></div>
			<div class="order_name"><span>Товар</span></div>
			<div class="order_quant"><span>Кол-во</span></div>
			<div class="order_cost"><span>Цена</span></div>
			<div class="order_summ"><span>Сумма</span></div>
			<div class="order_del"><span>Убрать</span></div>
		</div>
		<?php
		$n = 0;
		foreach ($_SESSION['cartArr'] as $key => $q){
			$n = $n+$q;
		}
		if ($n > 0){
			$query = "SELECT * FROM admins WHERE id='3'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		$curs = $row['name'];
		$query = "SELECT * FROM product WHERE";
		$arr = $_SESSION['cartArr'];
		foreach ($arr as $key => $q){
			$explode_str = explode('_',$key);
			$key = $explode_str[0];
			$query = $query."(`id`= ".$key.") OR";
		}
		$query = substr($query, 0, -3);
		$query = $query."ORDER BY type";
		$result = mysql_query($query);
		$n = 0;
		$summ_ord = 0;
		while ($row = mysql_fetch_array($result)){
			foreach ($arr as $key => $q){
				$explode_str = explode('_',$key);
				$key = $explode_str[0];
				if($key == $row['id']){
					$quant = $q;
				}
			}
			$n=$n+1;
			$rozn = null;
			$opt = null;
			$opt_m = null;
			//echo $curs." * ".$row['cost']." = ".$curs*$row['cost'];
			$rozn = $row['cost']*$curs;
			$opt = $row['cost_opt']*$curs;
			$opt_m = $row['cost_opt_m']*$curs;
			$roll = $row['roll'];
			
			$category = $row['category'];
			$sub_category = $row['sub_category'];
			$type = $row['type'];
			$sub_type = $row['sub_type'];
			$vid = $row['vid'];
			$sub_vid = $row['sub_vid'];
			
			$name = str_replace('<br>', ' ', $row['name']);
			$product_linc = "product.php?id=".$row['id'];
			
			
		?>
		<div class="order_field wow animate_animated animate__fadeInRightBig" data-wow-duration="0.7s" id="pr_<?php echo("$row[id]");?>">
			<div class="order_photo"><a href="<?php echo($product_linc)?>"><?php echo("<img class='primg' src=$row[img]>");?></a></div>
			
			
			<div class="order_name"><a href="<?php echo($product_linc)?>"><?php echo("<p>$name</p>");?></a></div>
			
			
			<div class="order_quant">
				<p class="ord_hint_mob">Кол-во</p>
				<form action="javascript:void(0);" method="post" name="f1_<?php echo("$row[id]");?>">
					<div class="decrement_" id="<?php echo("$row[id]");?>_">-</div>
					<input class="cardFieldQuant" id="quantity_field_<?php echo("$row[id]");?>" type="text" value="<?php echo $quant; ?>" onChange="card_field_chek(<?php echo("$row[id]");?>)">
					<div class="increment_" id="<?php echo("$row[id]");?>">+</div>
					<input id="rozn_<?php echo("$row[id]");?>" type="hidden" value="<?php echo round($rozn, 1);?>" />
					<input id="opt_m_<?php echo("$row[id]");?>" type="hidden" value="<?php echo round($opt_m, 1);?>" />
					<input id="opt_<?php echo("$row[id]");?>" type="hidden" value="<?php echo round($opt, 1);?>" />
				</form>
			</div>
			<div class="order_cost">
				<p class="ord_hint_mob">Цена</p>
				<form  action="javascript:void(0);" method="post" name="f2_<?php echo("$row[id]");?>">
							<p id="f2_<?php echo("$row[id]");?>"><?php
										
										if ( ($category == 'Фурнитура') or ($sub_category == 'Стеганая плащевка') ){
											$rozn = round($rozn, 1);
											echo $rozn;
										}
										else{
											$a = null;
									
											if ($rozn == 0){
												$a = 10;
												if ($quant < 10){
													$quant = 10;
												}
											}
											
											if ($opt_m == 0){
												$a = $roll;
												if ($quant < $roll){
													$quant = $roll;
												}
											}
											
											if ($quant<10){
												$rozn = round($rozn, 1);
												echo $rozn;
											}
											
											if (($quant>=10) and ($quant<$roll)){
												$opt_m = round($opt_m, 1);
												echo $opt_m;
											}
											
											if ($quant>=$roll){
												$opt = round($opt, 1);
												echo $opt;
											}

										}
										?></p>
					<input id="v2_<?php echo("$row[id]");?>" type="hidden" 
						   value="<?php 
										if ( ($category == 'Фурнитура') or ($sub_category == 'Стеганая плащевка') ){
											$rozn = round($rozn, 1);
											echo $rozn;
										}
										else{
											$a = null;
									
											if ($rozn == 0){
												$a = 10;
												if ($quant < 10){
													$quant = 10;
												}
											}
											
											if ($opt_m == 0){
												$a = $roll;
												if ($quant < $roll){
													$quant = $roll;
												}
											}
											
											if ($quant<10){
												$rozn = round($rozn, 1);
												echo $rozn;
											}
											
											if (($quant>=10) and ($quant<$roll)){
												$opt_m = round($opt_m, 1);
												echo $opt_m;
											}
											
											if ($quant>=$roll){
												$opt = round($opt, 1);
												echo $opt;
											}

										}
										?>"> 
					<input id="stts_<?php echo("$row[id]");?>" type="hidden" 
							value="<?php 
										$a = null;
										if ($rozn == 0){
											$a = "opt_i_m_opt";
										}
										
										if ($opt_m == 0){
											$a = "opt";
										}
										
										if ($category == 'Фурнитура'){
											$a = "furn";
										}
										
										if ($sub_category == 'Стеганая плащевка'){
											$a = "sp";
										}
										
										echo $a;
							?>">
					<input id="roll_<?php echo("$row[id]");?>" type="hidden"
							value="<?php echo $roll; ?>">
				</form>
			</div>
			<div class="order_summ" id="s_<?php echo("$row[id]");?>">
				<p class="ord_hint_mob">Сумма</p>
				<?php 
					if ( ($category == 'Фурнитура') or ($sub_category == 'Стеганая плащевка') ){
						$summ = $quant*$rozn;
					}
					else{
						if ($quant<10){	$summ = $quant*$rozn; }
						if (($quant>=10) and ($quant<$roll)){ $summ = $quant*$opt_m; }
						if ($quant>=$roll){ $summ = $quant*$opt; }
					}
					
					$summ = round($summ, 1);
					echo("<p>$summ</p>");
					$summ_ord = $summ_ord+$summ;
				?>
			</div>
			<div class="order_del">
				<p class="ord_hint_mob">Удалить</p>
				<a href="javascript:void(0);" onclick="sendform('<?php echo("$row[id]");?>','del_pr')">
					<img src="img/del.png">
				</a>
			</div>
		</div>
		<form id="fss_<?php echo("$row[id]");?>" name="fs_<?php echo($n);?>">
			<input type="hidden" value="<?php echo($summ); ?>">
		</form>
		<?php }?>
		<form name="fields">
			<input type="hidden" value="<?php echo($n); ?>">
		</form>
		<?php
		
		
		$query = "SELECT * FROM dress WHERE";
		$arr = $_SESSION['cartArr'];
		foreach ($arr as $key => $q){
			$explode_str = explode('_',$key);
			$key = $explode_str[0];
			$query = $query."(`id`= ".$key.") OR";
		}
		$query = substr($query, 0, -3);
		$query = $query."ORDER BY type";
		$result = mysql_query($query);
		$n = 0;
		while ($row = mysql_fetch_array($result)){
			foreach ($arr as $key => $q){
				$explode_str = explode('_',$key);
				$key = $explode_str[0];
				if($key == $row['id']){
					$quant = $q;
				}
			}
			$n=$n+1;
			$rozn = null;
			$rozn = $row['cost'];
			
			
			$name = str_replace('<br>', ' ', $row['model']);
			$product_linc = "dress.php?id=".$row['id'];
			
			
		?>
		<div class="order_field" id="pr_<?php echo("$row[id]");?>">
			<div class="order_photo"><a href="<?php echo($product_linc)?>"><?php echo("<img class='primg' src=$row[img_1]>");?></a></div>
			<div class="order_name"><a href="<?php echo($product_linc)?>"><?php echo("<p>$name</p>");?></a></div>
			<div class="order_quant">
				<p class="ord_hint_mob">Кол-во</p>
				<form action="javascript:void(0);" method="post" name="f1_<?php echo("$row[id]");?>">
					<div class="decrement_dress_" id="<?php echo("$row[id]");?>_">-</div>
					<input class="cardFieldQuant" id="quantity_field_<?php echo("$row[id]");?>" type="text" value="<?php echo $quant; ?>" onChange="card_field_chek(<?php echo("$row[id]");?>)">
					<div class="increment_dress_" id="<?php echo("$row[id]");?>">+</div>
					<input id="rozn_<?php echo("$row[id]");?>" type="hidden" value="<?php echo round($rozn, 1);?>" />
					<input id="opt_m_<?php echo("$row[id]");?>" type="hidden" value="<?php echo round($opt_m, 1);?>" />
					<input id="opt_<?php echo("$row[id]");?>" type="hidden" value="<?php echo round($opt, 1);?>" />
				</form>
			</div>
			<div class="order_cost">
				<p class="ord_hint_mob">Цена</p>
				<form  action="javascript:void(0);" method="post" name="f2_<?php echo("$row[id]");?>">
					<p id="f2_<?php echo("$row[id]");?>"><?php echo $rozn; ?></p>
					<input id="v2_<?php echo("$row[id]");?>" type="hidden" value="<?php echo $rozn; ?>"> 
				</form>
			</div>
			<div class="order_summ" id="s_<?php echo("$row[id]");?>">
				<p class="ord_hint_mob">Сумма</p>
				<?php
					$summ = $quant*$rozn;					
					$summ = round($summ, 1);
					echo("<p>$summ</p>");
					$summ_ord = $summ_ord+$summ;
				?>
			</div>
			<div class="order_del">
				<p class="ord_hint_mob">Удалить</p>
				<a href="javascript:void(0);" onclick="sendform('<?php echo("$row[id]");?>','del_pr')">
					<img src="img/del.png">
				</a>
			</div>
		</div>
		<form id="fss_<?php echo("$row[id]");?>" name="fs_<?php echo($n);?>">
			<input type="hidden" value="<?php echo($summ); ?>">
		</form>
		<?php }?>
		<form name="fields">
			<input type="hidden" value="<?php echo($n); ?>">
		</form>
		<?php


		}
		else{
			?>
			<script>
				empty_cart();
			</script>
			<?php
		}
		?>
		
		
	</div>
	

	<div id="o_1"></div>
	
	<div class="summ_ord_rect" id="summ_ord_rect">
		<p id="summ_ord">Сумма заказа: <?php echo($summ_ord); ?> ГРН</p>
		<input type="hidden" id="summ_ord_field" value="<?php echo($summ_ord); ?>" />
		<br>
		<button class="buy_btn fast_buy">Быстрый заказ</button>
		<button class="buy_btn ofrmt">Оформить заказ</button>
	</div>
	<?
	}
	?>
</div>

<?php

echo $foot_bottom;

?>

</body>
</html>

