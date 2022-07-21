<?php
session_start();
include_once('dbcon.php');
require_once 'mobDetect.php';
$detect = new Mobile_Detect;
$query = "SELECT * FROM admins WHERE id='3'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$curs = $row['name'];

$val = $_POST['val'];
$search_query = $_POST['search_query'];
$product_query = $_POST['product_query'];
$current_field = $_POST['current_field'];
$res = null;
$query = null;

if ($search_query){
	$query = "SELECT *
				FROM product
				WHERE LOWER(name) LIKE LOWER('%$search_query%')
				OR LOWER(category) LIKE LOWER('%$search_query%')
				OR LOWER(sub_category) LIKE LOWER('%$search_query%')
				OR LOWER(TYPE) LIKE LOWER('%$search_query%')
				OR LOWER(sub_type) LIKE LOWER('%$search_query%')";
				
	if ($val == 1){ $query = $query." ORDER BY cost DESC"; }
	if ($val == 2){ $query = $query." ORDER BY cost ASC"; }
	if ($val == 3){ $query = $query." ORDER BY color ASC"; }
	if ($val == 4){ $query = $query." ORDER BY name DESC"; }
	if ($val == 5){ $query = $query." ORDER BY name ASC"; }
	if ($val == 6){ $query = $query." ORDER BY rating DESC"; }
	$result = mysql_query($query);	
	$res = mysql_query($query);
	if(mysql_fetch_row($res))
	{
		echo('<p class="t2">Результаты поиска</p>');
		$res=null;		
	}
	else{
		echo('<p class="t2">По вашему запросу ничего не найдено</p>');
		$res=null;
	}
}
else{
	
	$query = $product_query;
	$pos1 = strripos($query, "=");
	$pos2 = strripos($query, "'");
	$rest = substr($query, $pos1+3, $pos2);
	$pos2 = strripos($rest, "'");
	$rest = mb_substr($rest, 0, -1);
	$name = '<p class="t2">'.$rest.'</p>';
	if ($val == 1){ $query = $query." ORDER BY cost DESC"; }
	if ($val == 2){ $query = $query." ORDER BY cost ASC"; }
	if ($val == 3){ $query = $query." ORDER BY color ASC"; }
	if ($val == 4){ $query = $query." ORDER BY name DESC"; }
	if ($val == 5){ $query = $query." ORDER BY name ASC"; }
	if ($val == 6){ $query = $query." ORDER BY rating DESC"; }
	$result = mysql_query($query);	
	
	
	
}
	
	$row = null;
	$n = 0;
	if ( $detect->isMobile() ) { 
		$r = 2;
	}
	else{
		$r = 5;
	}
	echo $name;
	
	$description_text = '';
			
			if ($current_field == 'category'){
				$description_text = $row['category_desc'];
			}
			if ($current_field == 'sub_category'){
				$description_text = $row['sub_category_desc'];
			}
			if ($current_field == 'type'){
				$description_text = $row['type_desc'];
			}
			if ($current_field == 'sub_type'){
				$description_text = $row['sub_type_desc'];
			}
			if ($current_field == 'vid'){
				$description_text = $row['vid_desc'];
			}
			if ($current_field == 'sub_vid'){
				$description_text = $row['sub_vid_desc'];
			}
			
			echo '<input id="desc_field" type="hidden" value="'.$current_field.'"/>';
			
			
	
	$row = mysql_fetch_array($result);	
	echo('<div class="new_product new_product_">');
	while ($row){
		$category = $row['category'];
		$sub_category = $row['sub_category'];
		$n = $n+1;
		if ($n!=$r){
	?>
	
		<div class="product product_">
					<a href="<?php echo("product.php?id="."$row[id]&".$link_);?>">
						<div class="img_rect img_rect_" <?php echo("id='$row[id]_'");?>><?php echo("<img class='img_to_card' src=$row[img]?".mt_rand(10000, 9999999).">");?>
							<!--<div class="info info_">
								<p><?php echo("$row[opisanie]");?></p>
							</div>-->
						</div>
					</a>
					<a href="<?php echo("product.php?id="."$row[id]&".$link_);?>">
						<p><?php echo("$row[name]");?></p>
					</a>
					<form class="form db" action="javascript:void(0);" method="post" name="f<?php echo("$row[id]");?>">
						<div class="price"><?php 
						if ($category == 'Фурнитура'){
							?><table>
								<tr><td>&ensp;&ensp;&ensp;&ensp;&ensp;</td><td></td></tr> 
								<tr><td>Цена:</td><td><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн");?></td></tr> 
								<tr><td></td></tr> 
							</table><?php
						}
						
						if ($sub_category == 'Стеганая плащевка'){
							?><table>
								<tr><td>&ensp;&ensp;&ensp;&ensp;&ensp;</td><td></td></tr> 
								<tr><td>От 3 м:</td><td><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
								<tr><td></td></tr> 
							</table><?php
						}
						
						if ( ($category != 'Фурнитура') and ($sub_category != 'Стеганая плащевка')){
							?><table>
								<tr><td>От 3 м:</td><td><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
								<tr><td>От 10 м:</td><td><?php echo (round($row['cost_opt_m']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
								<tr><td>От <?php echo ("$row[roll]");?> м:</td><td><?php echo (round($row['cost_opt']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
							</table><?php
						}?></div>
						<input id="qt_<?php echo("$row[id]"); ?>" class="input" type="hidden" name="quantity" 
								value="<?php 
									$a = 3;
									if ($row['cost'] == 0){ $a = 10; }
									if ($row['cost_opt_m'] == 0){ $a = $row['roll']; }
									if ($row['category'] == 'Фурнитура'){$a = 1;}
									if ($row['sub_category'] == 'Стеганая плащевка'){$a = 3;}
									echo $a;
								?>"/>
						<button class="ggg" onclick="document.location='<?php echo("product.php?id="."$row[id]&".$link_);?>'">подробнее</button>
						<button <?php echo("id='$row[id]'");?> class="button_add_to_card" onclick="sendform('<?php echo("$row[id]");?>','cart')">в корзину</button>
					</form>
				</div>
	
	<?php }
		else{$n=1; echo('</div><div class="new_product new_product_">');?>
	
				<div class="product product_">
					<a href="<?php echo("product.php?id="."$row[id]&".$link_);?>">
						<div class="img_rect img_rect_" <?php echo("id='$row[id]_'");?>><?php echo("<img class='img_to_card' src=$row[img]?".mt_rand(10000, 9999999).">");?>
							<!--<div class="info info_">
								<p><?php echo("$row[opisanie]");?></p>
							</div>-->
						</div>
					</a>
					<a href="<?php echo("product.php?id="."$row[id]&".$link_);?>">
						<p><?php echo("$row[name]");?></p>
					</a>
					<form class="form db" action="javascript:void(0);" method="post" name="f<?php echo("$row[id]");?>">
						<div class="price"><?php 
						if ($category == 'Фурнитура'){
							?><table>
								<tr><td>&ensp;&ensp;&ensp;&ensp;&ensp;</td><td></td></tr> 
								<tr><td>Цена:</td><td><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн");?></td></tr> 
								<tr><td></td></tr> 
							</table><?php
						}
						
						if ($sub_category == 'Стеганая плащевка'){
							?><table>
								<tr><td>&ensp;&ensp;&ensp;&ensp;&ensp;</td><td></td></tr> 
								<tr><td>От 3 м:</td><td><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
								<tr><td></td></tr> 
							</table><?php
						}
						
						if ( ($category != 'Фурнитура') and ($sub_category != 'Стеганая плащевка')){
							?><table>
								<tr><td>От 3 м:</td><td><?php echo (round($row['cost']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
								<tr><td>От 10 м:</td><td><?php echo (round($row['cost_opt_m']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
								<tr><td>От <?php echo ("$row[roll]");?> м:</td><td><?php echo (round($row['cost_opt']*$curs, 1)."&nbsp;грн/м");?></td></tr> 
							</table><?php
						}?></div>
						<input id="qt_<?php echo("$row[id]"); ?>" class="input" type="hidden" name="quantity" 
								value="<?php 
									$a = 3;
									if ($row['cost'] == 0){ $a = 10; }
									if ($row['cost_opt_m'] == 0){ $a = $row['roll']; }
									if ($row['category'] == 'Фурнитура'){$a = 1;}
									if ($row['sub_category'] == 'Стеганая плащевка'){$a = 3;}
									echo $a;
								?>"/>
						<button class="ggg" onclick="document.location='<?php echo("product.php?id="."$row[id]&".$link_);?>'">подробнее</button>
						<button <?php echo("id='$row[id]'");?> class="button_add_to_card" onclick="sendform('<?php echo("$row[id]");?>','cart')">в корзину</button>
					</form>
				</div>
	
	<?php } 
	$row = mysql_fetch_array($result);}?>

	</div>
	<?echo '<p class="description_text">'.$description_text.'</p>';?>




