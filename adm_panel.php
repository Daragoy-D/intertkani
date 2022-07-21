<?php
session_start();
include_once('dbcon.php');

if (!is_array($_SESSION['cartArr'])){
	$_SESSION['cartArr'] = array();
}

$_SESSION['admin_step_1'] = null;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="html">
<head>


	<title>Качественные кальяны по выгодным ценам</title>

	<link rel="stylesheet" href="style.css" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="js/ajax_cart.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
	<script type="text/javascript">
		window.onscroll = function (){
			slider();
		};
	</script>
		
	<script type="text/javascript">
		window.onload = function(){
			if (window.innerWidth<window.innerHeight){
				document.body.style.width="1200px";
			}
			slider();
			sendform('0','chek');
			cont_height('pos');
		}
	</script>

</head>

<body>
<div id="head">
	<div id="head_t">
		<div id="soc_icon">
			<div class="soc_cells" id="inst"><img src="img/inst.png"></div>
			<div class="soc_cells" id="face"><img src="img/face.png"></div>
		</div>
		<div id="curs">
			<p class="t1_1">On-line прием заказов<br>+38&nbsp;(093)&nbsp;030-27-26</p>
						
							<div id="callback">
								<a style="display:flex; height:100%;" href="#">	
									<img src="img/callback.png" style="height:35px; padding-top:10px; padding-left:26px;">
									<p class="tcb t3">Заказать обратный звонок</p>
								</a>
							</div>
					
			<p class="t1_1"><br>Время работы: ПН-СБ | 10:00-20:00</p>
			
		</div>
		<div id="lang">
			<ul id="nav" style="margin-top:-4px; margin-left:6px;">
				<li style="background: none;">
					<a href="#"><img src="img/ru.png" style="height:30px; box-shadow: 0px 0px 12px rgba(0,0,0,1);" ></a>
					<ul>
						<li style="background: none;"><a href="#"><img src="img/sy.png" style="height:30px; box-shadow: 0px 0px 12px rgba(0,0,0,1);"></a></li>
						<li style="background: none;"><a href="#"><img src="img/eng.png" style="height:30px; box-shadow: 0px 0px 12px rgba(0,0,0,1);"></a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>


<div id="main_menu">
	<div style="margin:auto; width:1200px; height:50px; display:flex;">
		<ul id="nav">
			<li>
				<a href="index.php"><p class="t1" id="t_main_menu">главная</p></a>
			</li>
			<li>
				<a href="#"><p class="t1" id="t_main_menu">каталог</p></a>
				<ul>
					<li><a href="product.php?type=кальяны"><p class="t1" id="t_main_menu">кальяны</a></p></li>
					<li><a href="product.php?type=табак"><p class="t1" id="t_main_menu">табак</a></p></li>
					<li><a href="product.php?type=уголь"><p class="t1" id="t_main_menu">уголь</a></p></li>
					<li><a href="product.php?type=колбы"><p class="t1" id="t_main_menu">колбы</a></p></li>
					<li><a href="product.php?type=шланги"><p class="t1" id="t_main_menu">шланги</a></p></li>
				</ul>
			</li>
			<li>
				<a href="#"><p class="t1" id="t_main_menu">доставка</p></a>
			</li>
			<li>
				<a href="#"><p class="t1" id="t_main_menu">о нас</p></a>
			</li>
			<li>
				<a href="#"><p class="t1" id="t_main_menu">контакты</p></a>
			</li>
		</ul>
		
		<div class="search">
			<div class="form_search">
				<form action="search.php">
					<input class="input_search" type="" name="search_field" required="required" placeholder="Поиск..."/>
					<input class="butt_search" type="submit" value="ok">
				</form>
			</div>
			<div id="cart_container" style="display:flex;">
				<a href="order.php" id="cart" style="height:100%;">
					<img src="img/shop.png">
				</a>
				<div id="cartQuan">
					<p id="cartC">0</p>
				</div>
				<a href="javascript:void(0);" id="clear" style="height:100%;">
					<img src="img/clear.png" style="padding-left:4px;">
				</a>
			</div>
		</div>
	</div>
			
</div>

<div id="content" style="margin-top:0;">

<div id="adm_panel"><br><br>
	<div id="butt_buy_fin" onclick="">
		<a href="add.php">Добавить</a>
	</div>
	<br>
	<div id="butt_buy_fin" onclick="">
		<a href="del.php">Удалить</a>
	</div>
	<br>
	<div id="butt_buy_fin" onclick="">
		<a href="edit.php">Изменить</a>
	</div>
	<br>
	<div id="butt_buy_fin" onclick="">
		<a href="adm_orders.php">Заказы</a>
	</div>
	<br>
	<div id="butt_buy_fin" onclick="">
		<a href="admins.php">Администраторы</a>
	</div>
</div>
		
		
<div id="o_1"></div>
</div>


<div id="footer">
&#169; hookah 2017
</div>
</body>
</html>