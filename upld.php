<?php
session_start();
include_once('dbcon.php');

if($_POST['act'] == 'curs'){
	$curs = $_POST['curs'];
	$query = "UPDATE `admins` SET `name` = '".$curs."' WHERE `id` = 3";
	mysql_query($query);
}

//изменение товра
if($_POST['act'] == 'edit'){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$cost = $_POST['rozn'];
	$opt_m = $_POST['opt_m'];
	$opt = $_POST['opt'];
	$roll = $_POST['roll'];
	$opisanie = $_POST['desc'];
	$color = $_POST['color'];
	$naznachenie = $_POST['naznachenie'];
	$shirina = $_POST['shirina'];
	$sostav = $_POST['sostav'];
	$proizvoditel = $_POST['proizvoditel'];
	$category = $_POST['category'];
	$sub_category = $_POST['sub_category'];
	$type = $_POST['type'];
	$sub_type = $_POST['sub_type'];
	$vid = $_POST['vid'];
	$sub_vid = $_POST['sub_vid'];
	if ($_POST['visible']){
		$visible = 1;
	}
	else{
		$visible = 0;
	}
	
	
	if ($category == '') { $category = 'n/a'; } 
	if ($sub_category == '') { $sub_category = 'n/a'; } 
	if ($type == '') { $type = 'n/a'; } 
	if ($sub_type == '') { $sub_type = 'n/a'; } 
	if ($vid == '') { $vid = 'n/a'; } 
	if ($sub_vid == '') { $sub_vid = 'n/a'; } 
	
	
	$search_name = str_replace('<br>', ' ', $name);
	if (($category <> '') AND ($category <> 'n/a')){ $search_name = $search_name.' '.$category; }
	if (($sub_category <> '') AND ($sub_category <> 'n/a')){ $search_name = $search_name.' '.$sub_category; }
	if (($type <> '') AND ($type <> 'n/a')){ $search_name = $search_name.' '.$type; }
	if (($sub_type <> '') AND ($sub_type <> 'n/a')){ $search_name = $search_name.' '.$sub_type; }
	if (($vid <> '') AND ($vid <> 'n/a')){ $search_name = $search_name.' '.$vid; }
	if (($sub_vid <> '') AND ($sub_vid <> 'n/a')){ $search_name = $search_name.' '.$sub_vid; }
	$search_name = $search_name.' '.$sostav;
	$search_name = $search_name.' '.$proizvoditel;
	$search_name = $search_name.' '.$naznachenie;
	$search_name = str_replace(' для ', ' ', $search_name);
	$search_name = str_replace(' Для ', ' ', $search_name);
	$search_name = str_replace('Для ', ' ', $search_name);
	$search_name = str_replace(' для ', ' ', $search_name);
	
	if($_FILES['img_product']['name']){
		$img = 'img/product/i_'.$id.'.jpg';
		$uploadfile = './'.$img;
		move_uploaded_file($_FILES['img_product']['tmp_name'], $uploadfile);
		$query = "UPDATE `product` 
					SET name='$name', 
						cost='".$cost."', 
						cost_opt='".$opt."', 
						cost_opt_m='".$opt_m."', 
						roll='".$roll."', 
						img='$img', 
						opisanie='$opisanie', 
						color='$color', 
						naznachenie='$naznachenie', 
						shirina='$shirina', 
						sostav='$sostav', 
						proizvoditel='$proizvoditel', 
						category='$category', 
						sub_category='$sub_category', 
						type='$type', 
						sub_type='$sub_type', 
						search_name='$search_name', 
						vid='$vid', 
						sub_vid='$sub_vid', 
						visible='$visible' 
						WHERE id='$id'";
	}
	else{
		$img = 0;
		$query = "UPDATE `product` 
					SET name='$name', 
						cost='".$cost."', 
						cost_opt='".$opt."', 
						cost_opt_m='".$opt_m."',  
						roll='".$roll."', 
						opisanie='$opisanie', 
						color='$color', 
						naznachenie='$naznachenie', 
						shirina='$shirina', 
						sostav='$sostav', 
						proizvoditel='$proizvoditel', 
						category='$category', 
						sub_category='$sub_category', 
						type='$type', 
						sub_type='$sub_type', 
						search_name='$search_name', 
						vid='$vid', 
						sub_vid='$sub_vid', 
						visible='$visible' 
						WHERE id='$id'";
	}
	
	$result = mysql_query($query);
	
	if ($img != 0){
		$rand = mt_rand();
		echo $img."?".$rand;
	}
	else{
		echo (0);
	}
}


//добавление товара
if($_POST['act'] == 'add'){
	$st = "ошибка";
	$name = $_POST['name'];
	$cost = $_POST['rozn'];
	$opt_m = $_POST['opt_m'];
	$opt = $_POST['opt'];
	$roll = $_POST['roll'];
	$color = $_POST['color'];
	$opisanie = $_POST['opisanie'];
	$naznachenie = $_POST['naznachenie'];
	$shirina = $_POST['shirina'];
	$sostav = $_POST['sostav'];
	$proizvoditel = $_POST['proizvoditel'];
	$category = $_POST['category'];
	$sub_category = $_POST['sub_category'];
	$type = $_POST['type'];
	$sub_type = $_POST['sub_type'];
	$vid = $_POST['vid'];
	$sub_vid = $_POST['sub_vid'];
	
	if ($category == '') { $category = 'n/a'; } 
	if ($sub_category == '') { $sub_category = 'n/a'; } 
	if ($type == '') { $type = 'n/a'; } 
	if ($sub_type == '') { $sub_type = 'n/a'; } 
	if ($vid == '') { $vid = 'n/a'; } 
	if ($sub_vid == '') { $sub_vid = 'n/a'; } 
	
	$search_name = str_replace('<br>', ' ', $name);
	if (($category <> '') AND ($category <> 'n/a')){ $search_name = $search_name.' '.$category; }
	if (($sub_category <> '') AND ($sub_category <> 'n/a')){ $search_name = $search_name.' '.$sub_category; }
	if (($type <> '') AND ($type <> 'n/a')){ $search_name = $search_name.' '.$type; }
	if (($sub_type <> '') AND ($sub_type <> 'n/a')){ $search_name = $search_name.' '.$sub_type; }
	if (($vid <> '') AND ($vid <> 'n/a')){ $search_name = $search_name.' '.$vid; }
	if (($sub_vid <> '') AND ($sub_vid <> 'n/a')){ $search_name = $search_name.' '.$sub_vid; }
	$search_name = $search_name.' '.$sostav;
	$search_name = $search_name.' '.$proizvoditel;
	$search_name = $search_name.' '.$naznachenie;
	$search_name = str_replace(' для ', ' ', $search_name);
	$search_name = str_replace(' Для ', ' ', $search_name);
	$search_name = str_replace('Для ', ' ', $search_name);
	$search_name = str_replace(' для ', ' ', $search_name);
	
	if($_FILES['img_add']['name']){
		$st = "Готово";
		$query = "INSERT INTO `product` 
						(`name`, `cost`, `cost_opt`, `cost_opt_m`, `roll`, 
						`img` ,`category`, `sub_category`, `type`, `sub_type`, `vid`, `sub_vid`, 
						`opisanie`, `color`, `naznachenie`, `shirina`,`search_name`, `sostav`,  `proizvoditel`)
						
				  VALUES 
						('".$name."', '".$cost."', '".$opt."', '".$opt_m."', '".$roll."', 
						'img' ,'".$category."', '".$sub_category."', '".$type."', '".$sub_type."', 
						'".$vid."', '".$sub_vid."', '".$opisanie."', '".$color."', '".$naznachenie."', 
						'".$shirina."', '".$sostav."', '".$search_name."',  '".$proizvoditel."')";
		$result = mysql_query($query);
		
		$qqq = $result;
		
		$query = "SELECT * FROM product ORDER BY id DESC LIMIT 1";
		$result = mysql_query($query);
		while ($row = mysql_fetch_array($result)){
			$id = $row['id'];
		}
		
		$img = 'img/product/i_'.$id.'.jpg';
		$uploadfile = './'.$img;
		move_uploaded_file($_FILES['img_add']['tmp_name'], $uploadfile);
		$query = "UPDATE `product` SET img='$img' WHERE id='$id'";
		$result = mysql_query($query);
	}
	$qqq = $result;
	
	$st = $id;
	echo $qqq;
}

//удаление товара
if($_POST['act'] == 'del'){
	$id = $_POST['id'];
	$query = "DELETE FROM `product` WHERE  `id` ='$id'";
	$result = mysql_query($query);
	unlink('./img/product/i_'.$id.'.jpg');
	
	if($result){echo $id;}
else
	{
	echo ('error');
	}
}


//добавление описания категории
if($_POST['act'] == 'add_desc'){
	$description = $_POST['description'];
	$field = $_POST['field'];
	$field_data = $_POST['field_data'];
	$query = "UPDATE `product` 
			SET ".$field."_desc='$description' 
			WHERE $field='$field_data'";
	$result = mysql_query($query);
	if ($result){
		echo "ok";
	}
	else{
		echo "error";
	}
	echo $query;
}


//подстановка инпуов
if($_POST['act'] == 'select_option'){
	$field = $_POST['field'];
	$field_data = $_POST['field_data'];
	$data = ' <option value="">-------------</option>';
	
	if ($field == 'category'){
		$query = "SELECT * FROM product WHERE category='$field_data' ORDER BY sub_category ASC";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			$current_field = $row['sub_category'];
			$data = $data.' <option value="'.$row['sub_category'].'">'.$row['sub_category'].'</option>';
			while ($row = mysql_fetch_array($result)){
				if ($current_field != $row['sub_category']){
					$current_field = $row['sub_category'];
					$data = $data.' <option value="'.$row['sub_category'].'">'.$row['sub_category'].'</option>';
				}
			}
	}
	
	if ($field == 'sub_category'){
		$query = "SELECT * FROM product WHERE sub_category='$field_data' ORDER BY type ASC";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			$current_field = $row['type'];
			$data = $data.' <option value="'.$row['type'].'">'.$row['type'].'</option>';
			while ($row = mysql_fetch_array($result)){
				if ($current_field != $row['type']){
					$current_field = $row['type'];
					$data = $data.' <option value="'.$row['type'].'">'.$row['type'].'</option>';
				}
			}
	}
	
	if ($field == 'type'){
		$query = "SELECT * FROM product WHERE type='$field_data' ORDER BY sub_type ASC";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			$current_field = $row['sub_type'];
			$data = $data.' <option value="'.$row['sub_type'].'">'.$row['sub_type'].'</option>';
			while ($row = mysql_fetch_array($result)){
				if ($current_field != $row['sub_type']){
					$current_field = $row['sub_type'];
					$data = $data.' <option value="'.$row['sub_type'].'">'.$row['sub_type'].'</option>';
				}
			}
	}
	
	if ($field == 'sub_type'){
		$query = "SELECT * FROM product WHERE sub_type='$field_data' ORDER BY vid ASC";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			$current_field = $row['vid'];
			$data = $data.' <option value="'.$row['vid'].'">'.$row['vid'].'</option>';
			while ($row = mysql_fetch_array($result)){
				if ($current_field != $row['vid']){
					$current_field = $row['vid'];
					$data = $data.' <option value="'.$row['vid'].'">'.$row['vid'].'</option>';
				}
			}
	}
	
	if ($field == 'vid'){
		$query = "SELECT * FROM product WHERE vid='$field_data' ORDER BY sub_vid ASC";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			$current_field = $row['sub_vid'];
			$data = $data.' <option value="'.$row['sub_vid'].'">'.$row['sub_vid'].'</option>';
			while ($row = mysql_fetch_array($result)){
				if ($current_field != $row['sub_vid']){
					$current_field = $row['sub_vid'];
					$data = $data.' <option value="'.$row['sub_vid'].'">'.$row['sub_vid'].'</option>';
				}
			}
	}
	
	echo $data;
}










?>