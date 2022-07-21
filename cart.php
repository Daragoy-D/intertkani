<?php
session_start();
//запрос на очистку корзины
if ($_POST["clear"] == 1){
	$_SESSION['cartArr'] = null;	
	$_POST["clear"] = null;
}




//запрос на удаление товара
if ($_POST["del"] == 1){
	$id = $_POST["product_id"];
	$tArr = $_SESSION['cartArr'];
	unset($tArr[$id]);
	$_SESSION['cartArr'] = $tArr;
	foreach ($_SESSION['cartArr'] as $key => $q){
		$n = $n+$q;
	}
	$_POST["del"] = null;
	echo ($n);
}




//запрос на обновление корзины
if($_POST["cart"] == 1){
	//получаем переменные из аякса
	$id = $_POST["product_id"];
	$quantity = $_POST["quantity"];
	$quantity_ = $_POST["quantity_"];
	//добавляем данные в массив сессии
	$tArr = $_SESSION['cartArr'];
	if ($tArr[$id]!=null){
		foreach ($_SESSION['cartArr'] as $key => $value){
			if ($key == $id){
				if ($quantity){
					$tArr[$id] = $quantity;
				}
				if ($quantity_){
					$tArr[$id] = $tArr[$id]+1;
				}
				
			}
		}
	}
	else{
		$tArr[$id] = $quantity_;
	}
	$_SESSION['cartArr'] = $tArr;
	$_POST["cart"] = null;
	//считаем количество товара в корзине
	foreach ($_SESSION['cartArr'] as $key => $q){
		$n = $n+$q;
	}
	//отдаем результат
	echo $n;
}

if($_POST['cart'] == 2){
	$id = $_POST['product_id'];
	$quantity = $_POST['quantity'];
	$tArr = $_SESSION['cartArr'];
	if ($tArr[$id]!=null){
		foreach ($_SESSION['cartArr'] as $key => $value){
			if ($key == $id){
				$tArr[$id] = $tArr[$id] + $quantity;
			}
		}
	}
	else{
		$t1 = (int)$quantity;
		$quantity = $t1;
		$tArr[$id] = $quantity;
	}
	$_SESSION['cartArr'] = $tArr;
	$_POST['cart'] = null;
	foreach ($_SESSION['cartArr'] as $key => $q){
		$n = $n+$q;
	}
	echo $n;
}

//запрос на проверку корзины
if ($_POST["chek"] == 1){
	//считаем количество товара в корзине
	$n = 0;
	foreach ($_SESSION['cartArr'] as $key => $q){
		$n = $n+$q;
	}
	//отдаем результат
	echo $n;
	$_POST["chek"] = null;
}

if ($_POST["chek"] == 2){
	$id = $_POST["id"];
	$tArr = $_SESSION['cartArr'];
	if ($tArr[$id]!=null){
		foreach ($_SESSION['cartArr'] as $key => $value){
			if ($key == $id){
				$value = $value+1;
			}
		}
	}
	
	echo $id;
	$_POST["chek"] = null;
}
	
	
?>