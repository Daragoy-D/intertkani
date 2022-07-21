<?php
session_start();
include_once('dbcon.php');




if (!is_array($_SESSION['cartArr'])){
	$_SESSION['cartArr'] = array();
}

$status = $_POST['s'];
$query = "SELECT * FROM admins WHERE id='3'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$curs = $row['name'];

if ($_POST['callback']){
	$callback = $_POST['callback'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$from = "intertkani@gmail.com";
	$subject = "Обратный звонок с сайта ".date('s').rand(10, 99)."-".date('h').rand(10, 99)."-".date('m').rand(10, 99);
	$order_text = "Имя: ".$name."\n"
				 ."Телефон: ".$phone."\n";
				 
	$header="Date: ".date("D, j M Y G:i:s")." +0700\r\n";
	$header.="From: =?utf-8?Q?".str_replace("+","_",str_replace("%","=",urlencode('')))."?= <intertkani@gmail.com>\r\n";
	$header.="X-Mailer: The Bat! (v3.99.3) Professional\r\n";
	$header.="Reply-To: =?utf-81?Q?".str_replace("+","_",str_replace("%","=",urlencode('')))."?= <intertkani@gmail.com>\r\n";
	$header.="X-Priority: 3 (Normal)\r\n";
	$header.="To: =?utf-8?Q?".str_replace("+","_",str_replace("%","=",urlencode('')))."?= <olegxarkov51@gmail.com>\r\n";
	$header.="Subject: =?utf-8?Q?".str_replace("+","_",str_replace("%","=",urlencode($subject)))."?=\r\n";
	$header.="MIME-Version: 1.0\r\n";
	$header.="Content-Type: text/plain; charset=utf-8\r\n";
	$header.="Content-Transfer-Encoding: 8bit\r\n";

	$mail = "olegxarkov51@gmail.com";
	mail($mail, $subject, $order_text, $header);
}else{
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

	$order_numb = date('s').rand(10, 99)."-".date('h').rand(10, 99)."-".date('m').rand(10, 99);

	$order_text = "";	
	$summ = 0;
	while ($row = mysql_fetch_array($result)){
		foreach ($arr as $key => $q){
			$explode_str = explode('_',$key);
			$key = $explode_str[0];
			if($key == $row['id']){
				$quant = $q;
			}
		}
		
		$rozn = round($row['cost']*$curs, 1);
		$opt = round($row['cost_opt']*$curs, 1);
		$opt_m = round($row['cost_opt_m']*$curs, 1);
		$roll = $row['roll'];
		$cost = '';
		
		if ($row['category'] == 'Фурнитура'){
			$summ = $quant*$rozn;
			$cost = $rozn." грн";
			$order_text = $order_text.$row['name']." ||| -> ";
			$order_text = $order_text."цена: ".$cost." ||| -> ";
			$order_text = $order_text."к-во: ".$quant." единиц ||| ";
			$order_text = $order_text."сумма: ".$summ;
			$order_text = $order_text."\n-------------------------------------\n";
			$summa = $summa + $summ;
		}
		if ($row['sub_category'] == 'Стеганая плащевка'){
			$summ = $quant*$rozn;
			$cost = $rozn." грн";
			$order_text = $order_text.$row['name']." ||| -> ";
			$order_text = $order_text."цена: ".$cost." ||| -> ";
			$order_text = $order_text."к-во: ".$quant." метров(а) ||| ";
			$order_text = $order_text."сумма: ".$summ;
			$order_text = $order_text."\n-------------------------------------\n";
			$summa = $summa + $summ;
		}
		if ( ($row['sub_category'] != 'Стеганая плащевка') and ($row['category'] != 'Фурнитура')){
			if ($quant<10){
				$summ = $quant*$rozn;
				$cost = $rozn." грн";
			}
			if (($quant>9) and ($quant<$roll)){
				$summ = $quant*$opt_m;
				$cost = $opt_m." грн";
			}
			if ($quant>=$roll){
				$summ = $quant*$opt;
				$cost = $opt." грн";
			}
			
			$order_text = $order_text.$row['name']." ||| -> ";
			$order_text = $order_text."цена: ".$cost." ||| -> ";
			$order_text = $order_text."к-во: ".$quant." метров(а) ||| ";
			$order_text = $order_text."сумма: ".$summ;
			$order_text = $order_text."\n-------------------------------------\n";
			$summa = $summa + $summ;
		}
	}
	
	
	
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

	while ($row = mysql_fetch_array($result)){
		foreach ($arr as $key => $q){
			$explode_str = explode('_',$key);
			$key = $explode_str[0];
			$razmer = $explode_str[1];
			if($key == $row['id']){
				$quant = $q;
			}
		}
		
		$rozn = $row['cost'];
		$summ = $quant*$rozn;
		$cost = $rozn." грн";
			
		$order_text = $order_text.$row['model']." ||| -> ";
		$order_text = $order_text."размер: ".$razmer." ||| -> ";
		$order_text = $order_text."цена: ".$cost." ||| -> ";
		$order_text = $order_text."к-во: ".$quant." штук ||| ";
		$order_text = $order_text."сумма: ".$summ;
		$order_text = $order_text."\n-------------------------------------\n";
		$summa = $summa + $summ;
	}
	
	
	

	$order_text = $order_text."\n\nСумма заказа: ".$summa;
				
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$mail = $_POST['mail'];
	$comments = $_POST['comments'];
	$delivery = $_POST['delivery'];

	$query = "INSERT INTO `orders` (`name`, `phone`, `mail`, `comments`, `delivery`, `order`, `order_number`)
				VALUES
				('$name', '$phone', '$mail', '$comments', '$delivery', '$order_text', '$order_numb')";
	$result = mysql_query($query);

	$from = "intertkani@gmail.com";
	$subject = "Заказ с сайта № ".$order_numb;
	$order_text = "Имя заказчика: ".$name."\n"
				 ."Телефон заказчика: ".$phone."\n"
				 ."Почта заказчика: ".$mail."\n"
				 ."Комментарий: ".$comments."\n"
				 ."Номер заказа: ".$order_numb."\n"
				 ."Доставка: ".$delivery."\n"
				 ."\n\nЗаказ:\n"
				 .$order_text;
	$header="Date: ".date("D, j M Y G:i:s")." +0700\r\n";
	$header.="From: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode('')))."?= <intertkani@gmail.com>\r\n";
	$header.="X-Mailer: The Bat! (v3.99.3) Professional\r\n";
	$header.="Reply-To: =?utf-8?Q?".str_replace("+","_",str_replace("%","=",urlencode('')))."?= <intertkani@gmail.com>\r\n";
	$header.="X-Priority: 3 (Normal)\r\n";
	$header.="To: =?utf-8?Q?".str_replace("+","_",str_replace("%","=",urlencode('')))."?= <olegxarkov51@gmail.com>\r\n";
	$header.="Subject: =?utf-8?Q?".str_replace("+","_",str_replace("%","=",urlencode($subject)))."?=\r\n";
	$header.="MIME-Version: 1.0\r\n";
	$header.="Content-Type: text/plain; charset=utf-8\r\n";
	$header.="Content-Transfer-Encoding: 8bit\r\n";
	
	$mail = "olegxarkov51@gmail.com";
	mail($mail, $subject, $order_text, $header);


	echo $status;

	$_SESSION['cartArr'] = null;
	session_write_close();	
}


?>

