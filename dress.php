<?php
include_once('dbcon.php');
require_once 'mobDetect.php';
require_once 'top_head.php';
$detect = new Mobile_Detect;
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
	<title>Одежда от производителя</title>

	<link rel="stylesheet" href="style.css?<?php echo(mt_rand(10000, 9999999))?>" type="text/css" />
	<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js?<?php echo(mt_rand(10000, 9999999))?>"></script>
	<script src="js/ajax_cart.js?<?php echo(mt_rand(10000, 9999999))?>" type="text/javascript"></script>
	<script src="js/main.js?<?php echo(mt_rand(10000, 9999999))?>" type="text/javascript"></script>
	<script src="js/fotorama.js"></script>
	
	
	<script type="text/javascript">
		window.onload = function(){
			sendform('0','chek');
			if(location.toString().indexOf('id') != -1) {
				preCalc_dress();
			}
			var n=0;
			$('.new_product').each(function() {
				n=n+1;
				if($(this).children().length == 0) {
					$(this).remove();
				}
			});
			console.log(n);
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
	
	<?php
	
	if ($_GET['id']){
		$id = $_GET['id'];
		$query = "SELECT * FROM dress WHERE id = '$id'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		$type = $row['type'];
		$gender = $row['gender'];
		$season = $row['season'];
		
		echo("<div style='margin-bottom: 60px;' class='navigate_panel'><p><a href='index.php'>Главная</a>
													 > <a href='catalog.php'>Каталог</a>
													 > <a href='dress.php'>Одежда</a> 
													 > <a href='dress.php?gender=".$gender."'>".$gender."</a> 
													 > <a href='dress.php?gender=".$gender."&type=".$type."&season=".$season."'>".$season."</a> 
													 > <span>".str_replace('<br>', ' ', $row['model'])."</span></p></div>");
		
		echo('<p class="t2">'.str_replace('<br>', ' ', $row['model']).'</p>');
		
		?>
		<div class="new_product new_product_I">
			<div class="product_rect_top">
				<div class="img_w img_to_card cursor_pointer" <?php echo("id='$row[id]_'");?>>
					<div class="fotorama"
						data-allowfullscreen="native"
						data-nav="thumbs"
						data-loop="true"
						data-clicktransition="dissolve"
						data-transition="slide"
						data-height="auto"
						data-maxheight="420"
						data-width="100%">
						<a href="<?php echo ($row['img_1']);?>"><img class="" data-src="<?php echo ($row['img_1']);?>"></a>
						<a href="<?php echo ($row['img_2']);?>"><img class="" data-src="<?php echo ($row['img_2']);?>"></a>
						<a href="<?php echo ($row['img_3']);?>"><img class="" data-src="<?php echo ($row['img_3']);?>"></a>
						<a href="<?php echo ($row['img_4']);?>"><img class="" data-src="<?php echo ($row['img_4']);?>"></a>
						<a href="<?php echo ($row['img_5']);?>"><img class="" data-src="<?php echo ($row['img_5']);?>"></a>
					</div>
				</div>
				
				<div class="order_rect">
				<p id="rozn_c" style="display: none"><?php echo $row['cost'];?></p>
					<p>Цена</p>
					<table>
						<tr><td>Цена:</td><td></td><td id="rozn"><?php echo ($row['cost']."&nbsp;грн");?></td></tr> 
						<tr><td>Размер:</td><td></td><td>
							<select id="razmer" style="width: 50px; margin-top: 2px; height: 25px;">
								<?php
									$bb = 40;
									for ($i = 1; $i <= 15; $i++) {
										if ($row['size_'.$bb] == 1){
											echo "<option value=".$row['size_'.$bb].">".$bb."</option>";
										}								
										$bb = $bb + 2;
									}
								?>
							</select>
						</td></tr> 
						<input id="order_summ" type="hidden" value="" />
					</table>
					
					
					<form class="form" action="javascript:void(0);" method="post" name="f<?php echo("$row[id]");?>">
						<div id="decrement_dress">-</div>
						<input id="quantity_field" 
								class="input" 
								type="text" 
								name="quantity" 
								value="1" 
								required="required" 
								placeholder="1"
								onChange="preCalc_dress()"/>
						<div id="increment_dress">+</div>
						<button <?php echo("id='$row[id]'");?> class="button_add_to_card" onclick="sendform_dress('<?php echo("$row[id]");?>','cart_prdct')">добавить в корзину</button>
					</form>
					<div id="summa"></div>
				</div>
			</div>
			<div id="description">
						<p>Описание</p>
						<p id="description_text"><?php echo ("$row[opisanie]");?></p>
					</div>
			<div class="specifications">
				<p>Характеристики</p>
				<table>
					<tr><td>Цвет:</td><td id="color" value="<?php echo ("$row[color]");?>"><?php echo ("$row[color]");?></td></tr> 
					<tr><td>Сезон:</td><td id="naznachenie"><?php echo ("$row[season]");?></td></tr> 
					<tr><td>Пол:</td><td id="sostav"><?php echo ("$row[gender]");?></td></tr> 
				</table>
			</div>
		</div>
		<?php
	}
	else{
		
		$type = $_GET['type'];
		$gender = $_GET['gender'];
		$season = $_GET['season'];
		
		

		$next_field = null;
		$link = null;
		$name = null;
		
		
			if (!$gender){
				$query = "SELECT * FROM dress";
				echo("<div class='navigate_panel'><p><a href='index.php'>Главная</a>
											 > <a href='catalog.php'>Каталог</a>
											 > <span>Одежда<span></p></div>");
				$name = '<p class="t2">Одежда</p>';
				$current_field = 'category';
				$next_field = 'gender';
				$link = 'dress.php?'.$next_field.'=';
				$link_ = '';
			}
			else{
				if (!$type){
					$query = "SELECT * FROM dress WHERE gender = '$gender'";
					echo("<div class='navigate_panel'><p><a href='index.php'>Главная</a>
												 > <a href='catalog.php'>Каталог</a>
												 > <a href='dress.php'>Одежда</a> 
												 > <span>".$gender."</span></p>
					</div>");
					$name = '<p class="t2">'.$gender.'</p>';
					$current_field = 'gender';
					$next_field = 'type';
					$link = 'dress.php?gender='.$gender.'&'.$next_field.'=';
					$link_ = 'gender='.$gender;
				}
				else{
					if (!$season){
						$query = "SELECT * FROM dress WHERE gender = '$gender' AND type = '$type'";
						echo("<div class='navigate_panel'><p><a href='index.php'>Главная</a>
													 > <a href='catalog.php'>Каталог</a>
													 > <a href='dress.php'>Одежда</a> 
													 > <a href='dress.php?gender=".$gender."'>".$gender."</a> 
													 > <span>".$type."</span></p>
						</div>");
						$name = '<p class="t2">'.$type.'</p>';
						$current_field = 'type';
						$next_field = 'season';
						$link = 'dress.php?gender='.$gender.'&type='.$type.'&'.$next_field.'=';
						$link_ = 'gender='.$gender.'&type='.$type;
					}
					else{
						$query = "SELECT * FROM dress WHERE gender = '$gender' AND type = '$type' AND season = '$season'";
						echo("<div class='navigate_panel'><p><a href='index.php'>Главная</a>
														 > <a href='catalog.php'>Каталог</a> > <a href='dress.php'>Одежда</a> 
														 > <a href='dress.php?gender=".$gender."'>".$gender."</a> 
														 > <a href='dress.php?gender=".$gender."&type=".$type."'>".$type."</a> 
														 > <span>".$season."</span></p>
						</div>");
						$name = '<p class="t2">'.$season.'</p>';
						$current_field = 'season';
						$next_field = 'fin';
						$link = 'dress.php?gender='.$gender.'&type='.$type.'&season='.$season.'&'.$next_field.'=';
						$link_ = 'gender='.$gender.'&type='.$type.'&season='.$season;
						
					
					}
				}
			}
		
		
		$result = mysql_query($query);
		$n = null;
		$prev_row = null;
		$row = mysql_fetch_array($result);
		if ( $detect->isMobile() ) { 
			$r = 2;
		}
		else{
			$r = 5;
		}
		
		if (($row[$next_field] == 'n/a') or ($next_field == 'fin')){
			//echo '/'.$query.'/';

			echo $name;

			$result = mysql_query($query);
			echo('<div class="new_product new_product_">');
			while ($row = mysql_fetch_array($result)){
				$n = $n + 1;
				if ($n != $r){
			?>
				<div class="product product_">
					<a href="<?php echo("dress.php?id="."$row[id]");?>">
						<div class="img_rect img_rect_" <?php echo("id='$row[id]_'");?>><?php echo("<img class='img_to_card' src=$row[img_1]?".mt_rand(10000, 9999999).">");?>
							
						</div>
					</a>
					<a href="<?php echo("dress.php?id="."$row[id]");?>">
						<p><?php echo("$row[model] $row[color]");?></p>
					</a>
					<form class="form db" action="javascript:void(0);" method="post" name="f<?php echo("$row[id]");?>">
						<div class="price">
							<table>
								
								<tr><td>Цена:</td><td><?php echo $row['cost']."&nbsp;грн";?></td></tr> 
								<tr><td></td></tr> 
							</table>
						</div>
						<input id="qt_<?php echo("$row[id]"); ?>" class="input" type="hidden" name="quantity" 
								value="<?php 
									$a = 1;									
									echo $a;
								?>"/>
						<button style="width: 85%;" class="ggg" onclick="document.location='<?php echo("dress.php?id="."$row[id]&".$link_);?>'">подробнее</button>				
					</form>
				</div>
			
			<?php }
				else{$n=1; echo('</div><div class="new_product new_product_">');?>
			
				<div class="product product_">
					<a href="<?php echo("dress.php?id="."$row[id]");?>">
						<div class="img_rect img_rect_" <?php echo("id='$row[id]_'");?>><?php echo("<img class='img_to_card' src=$row[img_1]?".mt_rand(10000, 9999999).">");?>
						
						</div>
					</a>
					<a href="<?php echo("dress.php?id="."$row[id]");?>">
						<p><?php echo("$row[model] $row[color]");?></p>
					</a>
					<form class="form db" action="javascript:void(0);" method="post" name="f<?php echo("$row[id]");?>">
						<div class="price">
							<table>
								
								<tr><td>Цена:</td><td><?php echo $row['cost']."&nbsp;грн";?></td></tr> 
								<tr><td></td></tr> 
							</table>
						</div>
						<input id="qt_<?php echo("$row[id]"); ?>" class="input" type="hidden" name="quantity" 
								value="<?php
									$a = 1;
									
									echo $a;
								?>"/>
						<button style="width: 85%;" class="ggg" onclick="document.location='<?php echo("dress.php?id="."$row[id]&".$link_);?>'">подробнее</button>
					</form>
				</div>
				<?php	}
			}
		}
		else{
			echo $name;
		
			$query = $query.' ORDER BY '.$next_field;
			$result = mysql_query($query);
			$current_value = '0';
			$n = 0;
			if ( $detect->isMobile() ) {
				$r = 2;
			}
			else{
				$r = 5;
			}
			echo('<div class="new_product">');
			while ($row = mysql_fetch_array($result)){
				$n = $n + 1;
				$prev_row = $row['id'];
				if ($n != $r){
					if ($current_value != $row[$next_field]){
						$current_value = $row[$next_field];
						?>
							<div class="product" onclick="document.location='<?php echo($link.$row[$next_field]);?>'">
								<div class="img_rect">
									<?php echo("<img src=$row[img_1]?".mt_rand(10000, 9999999).">");?>
									<div class="info">
										<p><?php echo("$row[$next_field]");?></p>
									</div>
								</div>
								<button onclick="document.location='<?php echo($link.$row[$next_field]);?>'">подробнее</button>
							</div>
						<?php 
					}
					else{
						$n = $n - 1;
					}
				}
				else{
					$n = 1; echo('</div><div class="new_product">');
					if ($current_value != $row[$next_field]){
						$current_value = $row[$next_field];
						?>
							<div class="product" onclick="document.location='<?php echo($link.$row[$next_field]);?>'">
								<div class="img_rect">
									<?php echo("<img src=$row[img_3]?".mt_rand(10000, 9999999).">");?>
									<div class="info">
										<p><?php echo("$row[$next_field]");?></p>
									</div>
								</div>
								<button onclick="document.location='<?php echo($link.$row[$next_field]);?>'">подробнее</button>
							</div>
						<?php
					}
					else{
						$n = $n - 1; 
					}
				}
			}
		}
		?>
		</div>
		</div>
		
	<?php
	}
	?>
	<?php echo '<p class="description_text">'.$description_text.'</p>'; ?>
		<hr class="textso_hr">
		<p class="textso">В нашем интернет-магазине "Интер Ткани" Вы можете купить ткани,утеплители, наполнители и фурнитуру лучшего качества в Украине для швейного, сумочного, обувного производства.</p>
</div>

<?php

echo $foot_bottom;

?>

</body>
</html>

