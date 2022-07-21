<?php

$tel = $_POST['tel'];
$from = "zbs_hookah@mail.ru";
$mail = "lena.dvigun@gmail.com";
$subject = "Обратный звонок с сайта";
$text = "Телефон: ".$tel."\n";

mail($mail, $subject, $text, $from);




















?>

