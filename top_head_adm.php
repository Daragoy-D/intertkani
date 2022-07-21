<?php
$head_top = '
<div class="mob_menu_list">
	<div class="link cls_pnl"><svg class="close_icon" width="23px" height="23px" viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd"> <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect> <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect> </g> </svg></div>
	<ul id="accordion" class="accordion">
		
		<li>
			<div class="link"><i class="fa fa-code"></i><a href="catalog.php">Каталог</a><i class="fa fa-chevron-down"></i></div>
		</li>
		<li>
			<div class="link"><i class="fa fa-database"></i>Ткани<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li><a href="edit.php?category=Ткани&sub_category=Плащевка">Плащевка</a></li>
				<li><a href="edit.php?category=Ткани&sub_category=Стеганая плащевка">Стеганая плащевка</a></li>
				<li><a href="edit.php?category=Ткани&sub_category=Спецткани">Спецткани</a></li>
				<li><a href="edit.php?category=Ткани&sub_category=Сумочные и палаточные">Сумочные и палаточные</a></li>
				<li><a href="edit.php?category=Ткани&sub_category=Сетка">Сетка</a></li>
				<li><a href="edit.php?category=Ткани&sub_category=Пленка галантерейная">Пленка галантерейная</a></li>
				<li><a href="edit.php?category=Ткани&sub_category=Распродажа">Распродажа</a></li>
			</ul>
		</li>
		<li>
			<div class="link"><i class="fa fa-globe"></i>Нетканые материалы<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li><a href="edit.php?category=Нетканые материалы&sub_category=Спанбонд">Спанбонд</a></li>
				<li><a href="edit.php?category=Нетканые материалы&sub_category=Флизелин клеевой">Флизелин клеевой</a></li>
				<li><a href="edit.php?category=Нетканые материалы&sub_category=Дублерин">Дублерин</a></li>
				<li><a href="edit.php?category=Нетканые материалы&sub_category=Паутинка">Паутинка</a></li>
				<li><a href="edit.php?category=Нетканые материалы&sub_category=Клей рулонный">Клей рулонный</a></li>
			</ul>
		</li>
		<li>
			<div class="link"><i class="fa fa-globe"></i>Мех<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li><a href="edit.php?category=Мех&sub_category=Искусственный">Искусственный</a></li>
				<li><a href="edit.php?category=Мех&sub_category=Натуральный">Натуральный</a></li>
			</ul>
		</li>
		<li>
			<div class="link"><i class="fa fa-globe"></i>Утеплитель<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li><a href="edit.php?category=Утеплитель&sub_category=Синтепон">Синтепон</a></li>
				<li><a href="edit.php?category=Утеплитель&sub_category=Силикон">Силикон</a></li>
				<li><a href="edit.php?category=Утеплитель&sub_category=Слимтекс">Слимтекс</a></li>
				<li><a href="edit.php?category=Утеплитель&sub_category=Холлофайбер">Холлофайбер</a></li>
			</ul>
		</li>
		<li>
			<div class="link"><i class="fa fa-globe"></i>Фурнитура<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li><a href="edit.php?category=Фурнитура&sub_category=Оборудование">Оборудование</a></li>
				<li><a href="edit.php?category=Фурнитура&sub_category=Резинка">Резинка</a></li>
				<li><a href="edit.php?category=Фурнитура&sub_category=Тесьма">Тесьма</a></li>
				<li><a href="edit.php?category=Фурнитура&sub_category=Бейка">Бейка</a></li>
				<li><a href="edit.php?category=Фурнитура&sub_category=Бирки и крепежи">Бирки и крепежи</a></li>
				<li><a href="edit.php?category=Фурнитура&sub_category=Для сумок">Для сумок</a></li>
			</ul>
		</li>
	</ul>
</div>
<div class="main_menu_mob">
	<div class="mmm_l">
		<div>
			<a href="index.php"><img src="img/logo_mob.png" /></a>
			<img class="gamburger" src="img/mob_menu.png" />
		</div>
	</div>
	<div class="mmm_r">
		<div class="form_search">
			<form action="search_adm.php">
				<input class="input_search" type="" name="search_field" autocomplete="off" required="required" placeholder="Поиск..."/>
				<input class="butt_search" type="submit" value="">
			</form>
		</div>
		<div style="float: right; height: 50px; width: 100%; margin-right: 20px;">
			<a href="tel:+380967765353"><img src="img/callback_m.png" /></a>
			<a class="cart_mob" href="order.php">
				<img src="img/shop.png" />
				<p class="cartC" id="cartC">0</p>
			</a>
		</div>
	</div>
</div>
<div id="main_menu">
	<div class="main_menu_wrapper">
		<div class="menu_top_rect">
			<div class="top_logo">
				<a href="index.php"><img src="img/logo.png" /></a>
			</div>
			<div class="top_menu">
				<div class="top_menu_list">
					<h1>Интернет-магазин<br>тканей и фурнитуры</h1>
					<div class="search">
						<div class="form_search">
							<form action="search_adm.php" style="position: relative;">
								<input class="input_search" type="text" name="search_field" autocomplete="off" required="required" placeholder="Поиск по сайту"/>
								<input class="butt_search" type="submit" value="">
							</form>
						</div>
					</div>
				</div>
				<div class="top_menu_callback">
					<div style="display: flex; margin-bottom: 15px; position: relative;">
						<img src="img/callback.png" />
						<a href="tel:+380967765353">+38 (096) 776-53-53</a>
					</div>
					<button class="callback_btn">оформить заказ</button>
					
				</div>
			</div>
		</div>
		
	</div>
	
	<div class="prod_nav">
	<a href="order.php" id="cart" style="display: none;">
		<img src="img/cart.png">
		<div class="cart_container" id="cart_container">
			<!--<p class="t_cart">Корзина</p>-->
			<div id="cartQuan">
				<p class="cartC" id="cartC">0</p>
			</div>			
		</div>
	</a>
		<ul id="nav">
			<li><a href="catalog.php">Каталог</a></li>
			<li><a href="edit.php?category=Ткани">Ткани</a>
				<ul style="width: 230px; top: 32px;">
					<li><a href="edit.php?category=Ткани&sub_category=Плащевка">Плащевка&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a>
						<ul style="width: 153px; top: 0px; left: 230px;">
							<li><a href="edit.php?category=Ткани&sub_category=Плащевка&type=Однотонная">Однотонная&ensp;&ensp;</a></li>
							<li><a href="edit.php?category=Ткани&sub_category=Плащевка&type=Принтованная">Принтованная</a></li>
							<li><a href="edit.php?category=Ткани&sub_category=Плащевка&type=С накаткой">С накаткой</a></li>
						</ul>
					</li>
					<li><a href="edit.php?category=Ткани&sub_category=Стеганая плащевка">Стеганая плащевка&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a></li>
					<li><a href="edit.php?category=Ткани&sub_category=Спецткани">Спецткани&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a></li>
					<li><a href="edit.php?category=Ткани&sub_category=Подкладка">Подкладка&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a></li>
					<li><a href="edit.php?category=Ткани&sub_category=Сумочные и палаточные">Сумочные и палаточные</a></li>
					<li><a href="edit.php?category=Ткани&sub_category=Сетка">Сетка&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a>
						<ul style="width: 150px; top: 0px; left: 230px;">
							<li><a href="edit.php?category=Ткани&sub_category=Сетка&type=Подкладочная">Подкладочная&ensp;&ensp;</a></li>
							<li><a href="edit.php?category=Ткани&sub_category=Сетка&type=Галантерейная">Галантерейная&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a></li>
							<li><a href="edit.php?category=Ткани&sub_category=Сетка&type=Обувная">Обувная&ensp;&ensp;</a></li>
						</ul>
					</li>
					<li><a href="edit.php?category=Ткани&sub_category=Пленка галантерейная">Пленка галантерейная</a></li>
					<li><a href="edit.php?category=Ткани&sub_category=Распродажа">Распродажа</a></li>
				 </ul>
			</li>
			<li><a href="edit.php?category=Нетканые материалы">Нетканые материалы</a>
				<ul style="width: 220px; top: 32px;">
					<li><a href="edit.php?category=Нетканые материалы&sub_category=Спанбонд">Спанбонд&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a>
						<ul style="width: 275px; top: 0px; left: 220px;">
							<li><a href="edit.php?category=Нетканые материалы&sub_category=Спанбонд&type=Медицинский">Медицинский&ensp;&ensp;</a></li>
							<li><a href="edit.php?category=Нетканые материалы&sub_category=Спанбонд&type=Для швейного производства">Для швейного производства&ensp;&ensp;</a></li>
							<li><a href="edit.php?category=Нетканые материалы&sub_category=Спанбонд&type=Для обуви">Для обуви&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a></li>
							<li><a href="edit.php?category=Нетканые материалы&sub_category=Спанбонд&type=Мебельный">Мебельный&ensp;&ensp;</a></li>
						</ul>
					</li>
					<li><a href="edit.php?category=Нетканые материалы&sub_category=Флизелин клеевой">Флизелин клеевой&ensp;&ensp;</a></li>
					<li><a href="edit.php?category=Нетканые материалы&sub_category=Дублерин">Дублерин&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a></li>
					<li><a href="edit.php?category=Нетканые материалы&sub_category=Паутинка">Паутинка&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a></li>
					<li><a href="edit.php?category=Нетканые материалы&sub_category=Клей рулонный">Клей рулонный&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a></li>
				</ul>
			</li>
			<li><a href="edit.php?category=Мех">Мех</a>
				<ul style="width: 153px; top: 32px;">
					<li><a href="edit.php?category=Мех&sub_category=Искусственный">Искусственный&ensp;&ensp;</a></li>
					<li><a href="edit.php?category=Мех&sub_category=Натуральный">Натуральный</a></li>
				</ul>
			</li>
			<li><a href="edit.php?category=Утеплитель">Утеплитель</a>
				<ul style="width: 153px; top: 32px;">
					<li><a href="edit.php?category=Утеплитель&sub_category=Синтепон">Синтепон&ensp;&ensp;</a></li>
					<li><a href="edit.php?category=Утеплитель&sub_category=Силикон">Силикон</a></li>
					<li><a href="edit.php?category=Утеплитель&sub_category=Слимтекс">Слимтекс</a></li>
					<li><a href="edit.php?category=Утеплитель&sub_category=Холлофайбер">Холлофайбер</a></li>
				</ul>
			</li>
			<li><a href="edit.php?category=Фурнитура">Фурнитура</a>
				<ul style="width: 165px; top: 32px;">
					<li><a href="edit.php?category=Фурнитура&sub_category=Оборудование">Оборудование&ensp;&ensp;</a></li>
					<li><a href="edit.php?category=Фурнитура&sub_category=Резинка">Резинка&ensp;&ensp;</a></li>
					<li><a href="edit.php?category=Фурнитура&sub_category=Тесьма">Тесьма&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a></li>
					<li><a href="edit.php?category=Фурнитура&sub_category=Бейка">Бейка&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</a></li>
					<li><a href="edit.php?category=Фурнитура&sub_category=Бирки и крепежи">Бирки и крепежи</a></li>
					<li><a href="edit.php?category=Фурнитура&sub_category=Для сумок">Для сумок</a></li>
				</ul>
			</li>
			<li><a href="index.php">о нас</a></li>
		</ul>
	</div>
</div>';


$foot_bottom = '<footer class="footer wow fadeInUp">
	<div class="container">
		<div class="footer_wrap">
			<div class="left_f">
				<img src="img/logo.png" id="logo_bottom">
			</div>
			<div class="center_f" style="text-align: center;">
				
				<a href="javascript:void(0);" class="knopka" id="callback_f">оформить заказ</a><br>
				<a href="tel:+380967765353" class="tel_f">+38 (096) 776-53-53</a><br><br>
			</div>
			<div class="right_f">
				<div class="links">
					<a href="https://www.instagram.com/intertkani/?igshid=79v0cu30vcn8" target="blank" style="filter: invert(1)"><img src="img/inst.png"></a>
					<a href="https://t.me/380967765353" target="blank" style="margin-left:14px;"><img src="img/teleg.png"></a>
					<a href="viber://add?number=380967765353" style="margin-left:14px;"><img src="img/viber.png"></a>
				</div>
			
			</div>
		</div>
	</div>
</footer>';


?>