$(window).scroll(function(){
	if ( ($(window).scrollTop() >= 115) && ($(window).width() > 700) ){   
		$('#main_menu').css({'position' : 'fixed', 'background' : '#white', 'marginTop' : '-135px'});    
		//$('.prod_nav').css({'border-top' : 'none'});    
		$('.adm_menu').css({'marginTop' : '38px'});
		$('.adm_menu_butt').css({'backgroundColor' : '##ffad23'}); 
	}
	else{
		$('#main_menu').css({'position' : 'absolute', 'background' : '#white', 'marginTop' : '0'});  
		//$('.prod_nav').css({'border-top' : '1px solid black'});
		$('.adm_menu').css({'marginTop' : '0'}); 
		$('.adm_menu_butt').css({'backgroundColor' : '##ffad23'}); 
	}
});

function func_add_description(){
	function funcWait(){
		$('#img_w').css({'display' : 'block'});
	}
	
	function funcSortFin(data){
		$('#img_w').css({'display' : 'none'});
		console.log(data);
		if (data = 'ok'){
			$('.product_add_mess_ok').css({'display' : 'block'});
		}
		else{
			$('.product_add_mess_err').css({'display' : 'block'});
		}
	}
	
	var category = $("#category_select").val();
	var sub_category = $("#sub_category_select").val();
	var type = $("#type_select").val();
	var sub_type = $("#sub_type_select").val();
	var vid = $("#vid_select").val();
	var sub_vid = $("#sub_vid_select").val();
	var act = 'add_desc';
	var description = $("#description").val();
	var category_fiels = $("#category_fiels").val();
	var sub_category_fiels = $("#sub_category_fiels").val();
	var type_fiels = $("#type_fiels").val();
	var sub_type_fiels = $("#sub_type_fiels").val();
	var vid_fiels = $("#vid_fiels").val();
	var sub_vid_fiels = $("#sub_vid_fiels").val();
	var field = "";
	var field_data = "";
	
	
	if ((sub_vid != 'n/a') && (sub_vid_fiels != 0)){ console.log('#1');
		field = 'sub_vid';
		field_data = sub_vid;
	}
	else{
		if ((vid != 'n/a') && (vid_fiels != 0)){ console.log('#2');
			field = 'vid';
			field_data = vid;
		}
		else{
			if ((sub_type != 'n/a') && (sub_type_fiels != 0)){ console.log('#3');
				field = 'sub_type';
				field_data = sub_type;
			}
			else{
				if ((type != 'n/a') && (type_fiels != 0)){ console.log('#4');
					field = 'type';
					field_data = type;
				}
				else{
					if ((sub_category != 'n/a') && (sub_category_fiels != 0)){ console.log('#5');
						field = 'sub_category';
						field_data = sub_category;
					}
					else{
						if ((category != 'n/a') && (category_fiels != 0)){ console.log('#6');
							field = 'category';
							field_data = category;
						}
					}
				}
			}
		}
	}
	
	console.log(field);
	console.log(field_data);
	
	$.ajax({
			type: 'POST',
			url:  "upld.php",
			data: ({act: act, 
					description: description, 
					field: field, 
					field_data: field_data}),
			beforeSend: funcWait,
			success: funcSortFin
		});
}

$(document).ready(function(){
	
	
	$(".toggle").click(function(){
		var roditel_li = $(this).closest("li");
		var potomok_ul = $(roditel_li).find("ul")[0];
		var potomok_div = $(roditel_li).find("div")[0];
		$(potomok_ul).slideToggle();
			$(potomok_div).toggleClass("selected");
	});
	
	$("#category_select").change(function(){
		
		function funcWait(){
			$('#wait_sc').css({'display' : 'block'});
		}
		
		function funcSortFin(data){
			$('#sub_category_select').append(data);
			$('#wait_sc').css({'display' : 'none'});
			$('#sub_category_select').css({'display' : 'block'});
		}
		
		$('#sub_category_select').find('option').remove();
		$('#sub_category_select').css({'display' : 'none'});
		$('#type_select').find('option').remove();
		$('#type_select').css({'display' : 'none'});
		$('#sub_type_select').find('option').remove();
		$('#sub_type_select').css({'display' : 'none'});
		$('#vid_select').find('option').remove();
		$('#vid_select').css({'display' : 'none'});
		$('#sub_vid_select').find('option').remove();
		$('#sub_vid_select').css({'display' : 'none'});
		
		$('#sub_category_fiels').val(0);
		$('#type_fiels').val(0);
		$('#sub_type_fiels').val(0);
		$('#vid_fiels').val(0);
		$('#sub_vid_fiels').val(0);
		
		var act = "select_option";
		var field_data = $("#category_select").val();
		var field = "category"; 
		$('#category_fiels').val(1);
		
		$.ajax({
			type: 'POST',
			url:  "upld.php",
			data: ({act: act, field_data: field_data, field: field}),
			beforeSend: funcWait,
			success: funcSortFin
		});
	});
	
	$("#sub_category_select").change(function(){
		
		function funcWait(){
			$('#wait_t').css({'display' : 'block'});
		}
		
		function funcSortFin(data){
			$('#type_select').append(data);
			$('#wait_t').css({'display' : 'none'});
			$('#type_select').css({'display' : 'block'});
		}
		
		$('#type_select').find('option').remove();
		$('#type_select').css({'display' : 'none'});
		$('#sub_type_select').find('option').remove();
		$('#sub_type_select').css({'display' : 'none'});
		$('#vid_select').find('option').remove();
		$('#vid_select').css({'display' : 'none'});
		$('#sub_vid_select').find('option').remove();
		$('#sub_vid_select').css({'display' : 'none'});
		
		$('#type_fiels').val(0);
		$('#sub_type_fiels').val(0);
		$('#vid_fiels').val(0);
		$('#sub_vid_fiels').val(0);
		
		var act = "select_option";
		var field_data = $("#sub_category_select").val();
		var field = "sub_category";
		$('#sub_category_fiels').val(1);
		
		$.ajax({
			type: 'POST',
			url:  "upld.php",
			data: ({act: act, field_data: field_data, field: field}),
			beforeSend: funcWait,
			success: funcSortFin
		});
	});
	
	$("#type_select").change(function(){
		
		function funcWait(){
			$('#wait_st').css({'display' : 'block'});
		}
		
		function funcSortFin(data){
			$('#sub_type_select').append(data);
			$('#wait_st').css({'display' : 'none'});
			$('#sub_type_select').css({'display' : 'block'});
		}
		
		$('#sub_type_select').find('option').remove();
		$('#sub_type_select').css({'display' : 'none'});
		$('#vid_select').find('option').remove();
		$('#vid_select').css({'display' : 'none'});
		$('#sub_vid_select').find('option').remove();
		$('#sub_vid_select').css({'display' : 'none'});
		
		$('#type_fiels').val(0);
		$('#sub_type_fiels').val(0);
		$('#vid_fiels').val(0);
		$('#sub_vid_fiels').val(0);
		
		var act = "select_option";
		var field_data = $("#type_select").val();
		var field = "type";
		$('#type_fiels').val(1);
		
		$.ajax({
			type: 'POST',
			url:  "upld.php",
			data: ({act: act, field_data: field_data, field: field}),
			beforeSend: funcWait,
			success: funcSortFin
		});
	});
	
	$("#sub_type_select").change(function(){
		
		function funcWait(){
			$('#wait_v').css({'display' : 'block'});
		}
		
		function funcSortFin(data){
			$('#vid_select').append(data);
			$('#wait_v').css({'display' : 'none'});
			$('#vid_select').css({'display' : 'block'});
		}
		
		$('#vid_select').find('option').remove();
		$('#vid_select').css({'display' : 'none'});
		$('#sub_vid_select').find('option').remove();
		$('#sub_vid_select').css({'display' : 'none'});

		$('#sub_type_fiels').val(0);
		$('#vid_fiels').val(0);
		$('#sub_vid_fiels').val(0);
		
		var act = "select_option";
		var field_data = $("#sub_type_select").val();
		var field = "sub_type";
		$('#sub_type_fiels').val(1);
		
		$.ajax({
			type: 'POST',
			url:  "upld.php",
			data: ({act: act, field_data: field_data, field: field}),
			beforeSend: funcWait,
			success: funcSortFin
		});
	});
	
	$("#vid_select").change(function(){
		
		function funcWait(){
			$('#wait_sv').css({'display' : 'block'});
		}
		
		function funcSortFin(data){
			$('#sub_vid_select').append(data);
			$('#wait_sv').css({'display' : 'none'});
			$('#sub_vid_select').css({'display' : 'block'});
		}
		
		$('#sub_vid_select').find('option').remove();
		$('#sub_vid_select').css({'display' : 'none'});
	
		$('#sub_vid_fiels').val(0);
		
		var act = "select_option";
		var field_data = $("#vid_select").val();
		var field = "vid";
		$('#vid_fiels').val(1);
		
		$.ajax({
			type: 'POST',
			url:  "upld.php",
			data: ({act: act, field_data: field_data, field: field}),
			beforeSend: funcWait,
			success: funcSortFin
		});
	});
	
	
	$("#npAreas").change(function(){
		$("#loadCity").css({'visibility' : 'visible'});
		$('#npCity').find('option').remove();
		$('#npWarehouses').find('option').remove();
		var currentArea = "";
		var Areas = $("#npAreas").val();
		var settings = {
		"async": true,
		"crossDomain": true,
		"url": "https://api.novaposhta.ua/v2.0/json/",
		"method": "POST",
		"headers": {
			"content-type": "application/json",
		},
		"processData": true,
		"data": JSON.stringify({
		"apiKey":  '1d2da4eeb304a11095aa4b8132114825',
		 "modelName": "Address",
		 "calledMethod": "getCities"
		})
		};
		$.ajax(settings).done(function (jsondb) {
			var arrLength = jsondb.data.length;
			i = 0;
			$('#npCity').append('<option value="">------------------ Выберите город ------------------</option>');
			while(i < arrLength){
				if (jsondb.data[i].Area == Areas){
					$('#npCity').append('<option value="'+jsondb.data[i].Ref+'">'+jsondb.data[i].DescriptionRu+'</option>');
				}
			i++;
			}
			$("#loadCity").css({'visibility' : 'hidden'});
		}).fail(function () {
			alert('error');
		});
	});
	
	$("#npCity").change(function(){
		$("#loadWarehouses").css({'visibility' : 'visible'});
		$('#npWarehouses').find('option').remove();
		var currentArea = "";
		var City = $("#npCity").val();
		var settings = {
		"async": true,
		"crossDomain": true,
		"url": "https://api.novaposhta.ua/v2.0/json/",
		"method": "POST",
		"headers": {
			"content-type": "application/json",
		},
		"processData": true,
		"data": JSON.stringify({
		"apiKey":  '1d2da4eeb304a11095aa4b8132114825',
		 "modelName": "Address",
		 "calledMethod": "getWarehouses"
		})
		};
	$.ajax(settings).done(function (jsondb) {
			var arrLength = jsondb.data.length;
			i = 0;
			$('#npWarehouses').append('<option value="">--------------- Выберите отделение ---------------</option>');
			while(i < arrLength){
				if (jsondb.data[i].CityRef == City){
				$('#npWarehouses').append('<option value="'+jsondb.data[i].DescriptionRu+'">'+jsondb.data[i].DescriptionRu+'</option>');
				}
			i++;
			}
			$("#loadWarehouses").css({'visibility' : 'hidden'});
		}).fail(function () {
			alert('error');
		});
	});
	
	//анимация мобильного меню
	$(function() {
		var Accordion = function(el, multiple) {
			this.el = el || {};
			this.multiple = multiple || false;

			// Variables privadas
			var links = this.el.find('.link');
			// Evento
			links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
		}

		Accordion.prototype.dropdown = function(e) {
			var $el = e.data.el;
				$this = $(this),
				$next = $this.next();

			$next.slideToggle();
			$this.parent().toggleClass('open');

			if (!e.data.multiple) {
				$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
			};
		}	

		var accordion = new Accordion($('#accordion'), false);
	});

	
	$('input[type=radio][name=rb]').change(function(){ 
		if (this.value == '1'){
			$('#npDelivery').show(500);
		}
		if (this.value == '2'){
			$('#npDelivery').hide(500);
		}
	});
	
	//-------------------------
	
	$('.sort_select').change(function(){
		var val = $('.sort_select').val();
		var url = $('#current_URL').val();
		
		$('.sort_wait_img').css({'display' : 'block'});
		$('.sort_wait_img').nextAll().detach();
		$('#content').css({'height' : '100vh'});
		

		
		

		
		if (val != '0'){
			url = url.replace(new RegExp('&sorting=cost','g'),'');
			url = url.replace(new RegExp('&sorting=name','g'),'');
			url = url.replace(new RegExp('&sorting=color','g'),'');
			url = url.replace(new RegExp('&order_by=DESC','g'),'');
			url = url.replace(new RegExp('&order_by=ASC','g'),'');
			url = url+val;
			window.location.href = url;
		}
		
		/*
		$.ajax({
			type: 'POST',
			url:  "sort.php",
			data: ({val: val, product_query: product_query, current_field: current_field, search_query: search_query}),
			beforeSend: funcWait,
			success: funcSortFin
		});
		
		function funcWait(){
			$('.sort_wait_img').css({'display' : 'block'});
			$('.sort_wait_img').nextAll().detach();
			$('#content').css({'height' : '100vh'});
		}
		
		function funcSortFin(data){
			$('.sort_wait_img').after(data);
			$('.sort_wait_img').css({'display' : 'none'});
			$('#content').css({'height' : 'auto'});
		}*/
	});
	
	$('.limit_select').change(function(){
		var val = $('.limit_select').val();
		//var url = $('#current_URL').val();
		
		$('.sort_wait_img').css({'display' : 'block'});
		$('.sort_wait_img').nextAll().detach();
		$('#content').css({'height' : '100vh'});
		
		var link = $('#current_URL').val();

		var url = new URL(link);
		url.searchParams.delete('page');
		url = url+'';
		console.log(url);
		
		if (val != '0'){
			url = url.replace(new RegExp('&limit=8','g'),'');
			url = url.replace(new RegExp('&limit=16','g'),'');
			url = url.replace(new RegExp('&limit=24','g'),'');
			url = url.replace(new RegExp('&limit=52','g'),'');
			url = url+val;
			window.location.href = url;
		}
	});

	$('.curs_butt').click(function(){
		var curs = $('#curs_field').val();
		var act = 'curs';
		
		$.ajax({
			type: 'POST',
			url:  "upld.php",
			data: ({curs: curs, act: act}),
			success: funcCursFin
		});
		
		function funcCursFin(){
			$('#curs_ok').css({'display' : 'block'});
			
		}
	});
	
	
	
	$('.spsWindowCls').click(function(){
		$('.spsWindow').slideToggle(400);	
	});
	
	$('.callback_send').click(function(){
		test_form('callback');
	});
	
	$('.cls_pnl').click(function(){
		$('.mob_menu_list').slideToggle(700); 
	});
	
	$('.gamburger').click(function(){
		$('.left_nav_wrapper').slideToggle(700); 
	});
	
	$('.callback_btn').click(function(){ 
		$('.modalWinowConteiner').fadeIn(400); 
		$('.fb_form').css({'display' : 'none'});
		$('.modalWindow').css({'display' : 'none'});
		$('.cb_form').css({'display' : 'block'});
		document.body.style.overflow = "hidden";
	});
	
	$('#callback_f').click(function(){ 
		$('.modalWinowConteiner').fadeIn(400); 
		$('.fb_form').css({'display' : 'none'});
		$('.modalWindow').css({'display' : 'none'});
		$('.cb_form').css({'display' : 'block'});
		document.body.style.overflow = "hidden";
	});
	
	$('.fast_buy').click(function(){
		if ($('#summ_ord_field').val()<300){
			$('.modalWinowConteiner').fadeIn(400); 
			$('.ab_form').css({'display' : 'block'});
			$('.cb_form').css({'display' : 'none'});
			$('.fb_form').css({'display' : 'none'});
			document.body.style.overflow = "hidden";
		}		
		else{
			$('.modalWinowConteiner').fadeIn(400); 
			$('.fb_form').css({'display' : 'block'});
			$('.cb_form').css({'display' : 'none'});
			$('.ab_form').css({'display' : 'none'});
			document.body.style.overflow = "hidden";
		}
		
	});
	
	$('.ofrmt').click(function(){
		if ($('#summ_ord_field').val()<300){
			$('.modalWinowConteiner').fadeIn(400); 
			$('.ab_form').css({'display' : 'block'});
			$('.cb_form').css({'display' : 'none'});
			$('.fb_form').css({'display' : 'none'});
			document.body.style.overflow = "hidden";
		}		
		else{
			document.location='checkout.php';
		}
	});
	
	$('.product_image').click(function(){ 
		$('.modalWinowConteinerProd').fadeIn(400); 
		document.body.style.overflow = "hidden";
	});
	
	$('.modalWindow').click(function(){ 
		$('.modalWinowConteinerProd').fadeOut(400); 
		document.body.style.overflow = "auto";
	});
	
	$('.close_icon').click(function(){ 
		$('.fb_form').css({'display' : 'none'});
		$('.modalWindow').css({'display' : 'none'});
		$('.cb_form').css({'display' : 'none'});
		$('.modalWinowConteiner').fadeOut(400); 
		$('.modalWinowConteinerProd').fadeOut(400); 
		document.body.style.overflow = "auto";
	});	
	
	$('.modalWinowConteiner').click(function(){ 
		if (event.target.id == 'modalWinowConteiner'){
			$('.modalWinowConteiner').fadeOut(400); 
			document.body.style.overflow = "auto";
		}
	});
	
	$('.modalWinowConteinerProd').click(function(){ 
		if (event.target.id == 'modalWinowConteinerProd'){
			$('.modalWinowConteinerProd').fadeOut(400); 
			document.body.style.overflow = "auto";
		}
	});
	
	$('#c_name').click(function(){ 
		$('#c_name').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'})
	});
	
	$('#c_phone').click(function(){ 
		$('#c_phone').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'})
	});
	
	$('#decrement_dress').click(function(){
		var a = null;
		if ( $('#quantity_field').val() == 1 ){   
			$('#quantity_field').css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
			setTimeout(() => $('#quantity_field').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'}), 500);
		}
		else{
			a = $('#quantity_field').val();
			a = --a;
			$('#quantity_field').val(a);
		}
		preCalc_dress();
	});
	
	$('#decrement').click(function(){
		
		var a = null;
		//var fur_exist = $('.navigate_panel').text().indexOf('Фурнитура');
		
		//if (fur_exist != '-1'){
			if ( $('#quantity_field').val() == 1 ){   
				$('#quantity_field').css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
				setTimeout(() => $('#quantity_field').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'}), 500);
			}
			else{
				a = $('#quantity_field').val();
				a = --a;
				$('#quantity_field').val(a);
			//}
		}/*else{
			if ( $('#quantity_field').val() == 3 ){   
				$('#quantity_field').css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
				setTimeout(() => $('#quantity_field').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'}), 500);
			}
			else{
				a = $('#quantity_field').val();
				a = --a;
				$('#quantity_field').val(a);
			}
		}
		preCalc();*/
	});
	
	$('#increment').click(function(){
		var a = null;
		a = $('#quantity_field').val();
		a = ++a;
		$('#quantity_field').val(a);
		preCalc();
	});
	
	$('#increment_dress').click(function(){
		var a = null;
		a = $('#quantity_field').val();
		a = ++a;
		$('#quantity_field').val(a);
		preCalc_dress();
	});
	
	
	$('.increment_').click(function(){
		var a = null;
		var key = this.id;
		a = $('#quantity_field_'+key).val();
		
		a = ++a;
		$('#quantity_field_'+key).val(a);
		$('#quantity_field_'+key).trigger('change');
	});
	
	$('.decrement_').click(function(){
		var a = null;
		var b = 0;
		var key = this.id; 
		key = key.slice(0, -1); key = +key; 
		
		var roll = $('#roll_'+key).val(); 
		roll = +roll;
		
		if ( ($('#stts_'+key).val() == 'opt_i_m_opt') && ( $('#quantity_field_'+key).val() <= 10) ){
			$('#quantity_field_'+key).css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
			setTimeout(() => $('#quantity_field_'+key).css({'backgroundColor' : '#ffffff', 'borderColor' : 'initial'}), 500);
			b = 1;
			$('#quantity_field_'+key).val(10);
		}
		
		if ( ($('#stts_'+key).val() == 'opt') && ( $('#quantity_field_'+key).val() <= roll) ){
			$('#quantity_field_'+key).css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
			setTimeout(() => $('#quantity_field_'+key).css({'backgroundColor' : '#ffffff', 'borderColor' : 'initial'}), 500);
			b = 2;
			$('#quantity_field_'+key).val(roll);
		}
		
		if ( ($('#stts_'+key).val() != 'sp') && ($('#stts_'+key).val() != 'furn') && ($('#stts_'+key).val() != 'opt_i_m_opt') && ($('#stts_'+key).val() != 'opt') && ($('#quantity_field_'+key).val() <= 1) ){   
			$('#quantity_field_'+key).css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
			setTimeout(() => $('#quantity_field_'+key).css({'backgroundColor' : '#ffffff', 'borderColor' : 'initial'}), 500);
			b = 3;
			$('#quantity_field_'+key).val(1);
		}
		
		if ( ($('#stts_'+key).val() == 'furn') && ($('#quantity_field_'+key).val() <= 1)){
			$('#quantity_field_'+key).css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
			setTimeout(() => $('#quantity_field_'+key).css({'backgroundColor' : '#ffffff', 'borderColor' : 'initial'}), 500);
			b = 4;
			$('#quantity_field_'+key).val(1);
		}
		
		if ( ($('#stts_'+key).val() == 'sp') && ($('#quantity_field_'+key).val() <= 1)){
			$('#quantity_field_'+key).css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
			setTimeout(() => $('#quantity_field_'+key).css({'backgroundColor' : '#ffffff', 'borderColor' : 'initial'}), 500);
			b = 4;
			$('#quantity_field_'+key).val(1);
		}
		
		if (b == 0){
			a = $('#quantity_field_'+key).val();
			a = --a;
			$('#quantity_field_'+key).val(a);
		}
		
		$('#quantity_field_'+key).trigger('change');
	});	
	
	$('.button_add_to_card').click(function(){
		var element_id = '#'+this.id+'_';
		var element_id_top = $(element_id).offset()['top'];
		var element_id_left = $(element_id).offset()['left'];
		var card_top = $(".cart_container").offset()['top'];
		var card_left = $(".cart_container").offset()['left'];
		var animate_width = null;
		if ( $(window).width() < 750 ){
			card_top = $(".cart_mob").offset()['top'];
			card_left = $(".cart_mob").offset()['left'];
		}
		
		if ($("div").is(".product_rect_top")){
			animate_width = '500px';
		}
		else{
			animate_width = '200px';
		}
		
		$(element_id).clone()  
		   .css({'position' : 'absolute', 
					'z-index' : '9999', 
					'top' : element_id_top+'px', 
					'left' : element_id_left+'px', 
					'width' : animate_width})  
			   .appendTo(element_id).animate({
			top: card_top,
			left: card_left,
			opacity: 0,
			height: 50,
			width: 50
		},1000, function(){
			$(this).remove();
			$('.product_add_info').show().animate({ top: 200, opacity: 1 });
		setTimeout(function(){
			$('.product_add_info').fadeOut(500)
		}, 1000);
	});
	});			
	

});

/*$(window).load(function(){
	if ($(window).width() < 700){
		let winWidth = $(window).width();
		let imgWidth = $('.img_rect').width();
		imgWidth = +imgWidth;
		imgWidth = imgWidth-30;
		winWidth = winWidth-50;
		$('.img_w').css({'width' : winWidth+'px'});
		$('.info').width(imgWidth);
	}
});*/

function edit_field_changed(id){
	$('#'+id).css({'border' : '1px solid blue'})
}

function edit_check_visible(id){
	if ($('#'+id).prop('checked')){
		$('#'+id).val(1);
	}
	else{
		$('#'+id).val(0);
	}
}

function empty_cart(){
}

function npLoadAreas(){
	var params = {
		'apiKey': '1d2da4eeb304a11095aa4b8132114825',
		'modelName': 'Address',
		'calledMethod': 'getAreas'
	};
	$.ajax({
		url: 'https://api.novaposhta.ua/v2.0/json/?' + $.param(params),
		beforeSend: function (xhrObj) {
			xhrObj.setRequestHeader('Content-Type', 'application/json');
		},
		type: 'POST',
		dataType: 'jsonp',
		data: '{body}'
		}).done(function (jsondb) {
			console.log(jsondb);
			var arrLength = jsondb.data.length;
			i = 1;
			while(i < arrLength){
				$('#npAreas').append('<option value="'+jsondb.data[i].Ref+'">'+jsondb.data[i].DescriptionRu+'</option>');
				i++;
			}
			
		}).fail(function (){
			alert('error');
		});
}

function card_field_chek(id){
	var b = 0;
	var roll = $('#roll_'+id).val(); 
	roll = +roll;

		
	if ( ($('#stts_'+id).val() != 'furn') && ($('#stts_'+id).val() != 'sp') && ($('#stts_'+id).val() == 'opt_i_m_opt') && ( $('#quantity_field_'+id).val() <= 10) ){
		$('#quantity_field_'+id).css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
		setTimeout(() => $('#quantity_field_'+id).css({'backgroundColor' : '#ffffff', 'borderColor' : 'initial'}), 500);
		b = 1;
		$('#quantity_field_'+id).val(10);
	}
		
	if ( ($('#stts_'+id).val() != 'furn') && ($('#stts_'+id).val() != 'sp') && ($('#stts_'+id).val() == 'opt') && ( $('#quantity_field_'+id).val() <= roll) ){
		$('#quantity_field_'+id).css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
		setTimeout(() => $('#quantity_field_'+id).css({'backgroundColor' : '#ffffff', 'borderColor' : 'initial'}), 500);
		b = 2;
		$('#quantity_field_'+id).val(roll);
	}
		
	if ( ($('#stts_'+id).val() != 'furn') && ($('#stts_'+id).val() != 'opt_i_m_opt') && ($('#stts_'+id).val() != 'opt') && ($('#quantity_field_'+id).val() <= 1) ){   
		$('#quantity_field_'+id).css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
		setTimeout(() => $('#quantity_field_'+id).css({'backgroundColor' : '#ffffff', 'borderColor' : 'initial'}), 500);
		b = 3;
		$('#quantity_field_'+id).val(1);
	}
	
	
	if ( ($('#stts_'+id).val() == 'furn') && ($('#quantity_field_'+id).val() <= 1)){
		$('#quantity_field_'+id).css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
		setTimeout(() => $('#quantity_field_'+id).css({'backgroundColor' : '#ffffff', 'borderColor' : 'initial'}), 500);
		b = 4;
		$('#quantity_field_'+id).val(1);
	}
	sendform(id,'cart_ord');
}
	
//подсчет стоимости на странице товара	
function preCalcCard(){
	var a = null;
	var key = '';
	$('.cardFieldQuant').each(function (index, value){
		key = $(this).attr('id');
		if ($('#'+key).val() < 3){
			$('#'+key).val(3);
			$('#'+key).trigger('change');
		}
	});
}

function preCalc(){
	var rozn = $('#rozn_c').text();
	var opt_m = $('#opt_m_c').text();
	var opt = $('#opt_c').text();
	var quant = $('#quantity_field').val();
	var roll = $('#roll').val();
	roll = +roll;
	
	var fur_exist = $('.navigate_panel').text().indexOf('Фурнитура');
	var sp_exist = $('.navigate_panel').text().indexOf('Стеганая плащевка');
	var hf_exist = $('.navigate_panel').text().indexOf('Холлофайбер');
	//var dress_exist = $('.navigate_panel').text().indexOf('Холлофайбер');
	
	var a = 'norm';
	
	if (rozn == 0){
		a = 'optm + opt';
	}
	
	if (opt_m == 0){
		a = 'tolko opt';
	}
	
	if (sp_exist != '-1'){
		a = 'sp';
	}
	
	if (hf_exist != '-1'){
		a = 'hf';
	}
	
	if ((opt_m == 0) && (opt == 0)){
		a = 'tolko rozn';
	}
	
	
	if ((a == 'optm + opt') && (fur_exist == '-1') && (sp_exist == '-1')){
		if ( $('#quantity_field').val() < 10 ){
			$('#quantity_field').css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
			setTimeout(() => $('#quantity_field').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'}), 500);
			$('#quantity_field').val(10);
			quant = $('#quantity_field').val();
		}
	}
	
	if ((a == 'tolko opt') && (fur_exist == '-1') && (sp_exist == '-1')){
		if ( $('#quantity_field').val() < roll ){
			$('#quantity_field').css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
			setTimeout(() => $('#quantity_field').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'}), 500);
			$('#quantity_field').val(roll);
			quant = $('#quantity_field').val();
		}
	}
	
	if ((a == 'norm') && (fur_exist == '-1') && (sp_exist == '-1')){
		if ( $('#quantity_field').val() < 1 ){
			$('#quantity_field').css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
			setTimeout(() => $('#quantity_field').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'}), 500);
			$('#quantity_field').val(1);
			quant = $('#quantity_field').val();
		}
	}
	
	if ((a == 'hf')){
		if ( $('#quantity_field').val() < 10 ){
			$('#quantity_field').css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
			setTimeout(() => $('#quantity_field').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'}), 500);
			$('#quantity_field').val(10);
			quant = $('#quantity_field').val();
		}
	}
	
	if ((a == 'tolko rozn')){
		if ( $('#quantity_field').val() < 1 ){
			$('#quantity_field').css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
			setTimeout(() => $('#quantity_field').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'}), 500);
			$('#quantity_field').val(1);
			quant = $('#quantity_field').val();
		}
	}

	
	var cost = null;
	var x = null;
	
	if ((fur_exist != '-1') || (sp_exist != '-1') || (hf_exist != '-1') || (a == 'tolko rozn')){
		quant = $('#quantity_field').val();
		cost = quant*rozn;
		x = cost * (cost%1);
		if (x != 0){
			cost = cost.toFixed(1);
		}
		$('#summa').text('Сумма заказа: '+cost+' грн');
	}
	else{
		if (quant < 10){
			cost = quant*rozn;
			x = cost * (cost%1);
			if (x != 0){
				cost = cost.toFixed(1);
			}
			$('#summa').text('Сумма заказа: '+cost+' грн');
		}
		if (quant >= 10 && quant < roll){ 
			cost = quant*opt_m;
			x = cost * (cost%1);
			if (x != 0){
				cost = cost.toFixed(1);
			}
			$('#summa').text('Сумма заказа: '+(quant * opt_m).toFixed(1)+' грн');
		}
		if (quant >= roll){
			cost = quant*opt;
			x = cost * (cost%1);
			if (x != 0){
				cost = cost.toFixed(1);
			}
			$('#summa').text('Сумма заказа: '+(quant * opt).toFixed(1)+' грн');
		}
	}
}

function preCalc_dress(){
	var rozn = $('#rozn_c').text();
	var quant = $('#quantity_field').val();
	
	if ( $('#quantity_field').val() < 1 ){
		$('#quantity_field').css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
		setTimeout(() => $('#quantity_field').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'}), 500);
		$('#quantity_field').val(1);
		quant = $('#quantity_field').val();
	}
	
	$('#summa').text('Сумма заказа: '+(quant * rozn)+' грн');
}

//открывалка формы заказа
function client_data(a){
	if(a=='show'){
		document.getElementById('box_shadow').style.visibility = "visible";
		document.body.style.overflow = "hidden";
	}
	if(a=='hide'){
		document.getElementById('box_shadow').style.visibility = "hidden";
		document.body.style.overflow = "auto";
	}
}

//проверка адекватности данных
function test_form(f){
	if(f == 'callback'){
		var test = 'ok';
		var name = $('#c_name_cb').val();
		var phone = $('#c_phone_cb').val(); 
		if(name == ''){
			document.forms['buy_form_fin'].elements[0].style.border = "2px solid red";
			test = 'error';
		}
		if(phone == ''){
			document.forms['buy_form_fin'].elements[1].style.border = "2px solid red";
			test = 'error';
		}
		if (test == 'ok'){buy(test, 'callback');}
	}
	
	if(f == 'buy_fast'){
		var test = 'ok';
		var name = $('#c_name').val();
		var phone = $('#c_phone').val(); 
		var mail = $('#c_mail').val(); 
		if(name == ''){
			document.forms['buy_form_fin'].elements[0].style.border = "2px solid red";
			test = 'error';
		}
		if(phone == ''){
			document.forms['buy_form_fin'].elements[1].style.border = "2px solid red";
			test = 'error';
		}
		console.log(name+'-'+phone+'-'+mail);
		if (test == 'ok'){buy(test, 'fast');}
	}
	
	if(f == 'buy'){
		var test = 'ok';
		var name = $('#c_name_').val();
		var phone = $('#c_phone_').val(); 
		var area = $('#npAreas').val(); 
		var city = $('#npCity').val(); 
		var warehouse = $('#npWarehouses').val(); 
		
		if ($('#rb1').prop("checked") == true){
			if ((area == '---------------- Выберите область ----------------') || (area == '')){
				$('#npAreas').css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
				setTimeout(() => $('#npAreas').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'}), 2000);
				test = 'error';
			}
			else{
				if ((city == '------------------ Выберите город ------------------') || (city == '')){
					$('#npCity').css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
					setTimeout(() => $('#npCity').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'}), 2000);
					test = 'error';
				}
				else{
					if ((warehouse == '--------------- Выберите отделение ---------------') || (warehouse == '')){
						$('#npWarehouses').css({'backgroundColor' : '#ff8686', 'borderColor' : 'red'})
						setTimeout(() => $('#npWarehouses').css({'backgroundColor' : '#ffffff', 'borderColor' : '#421b3c'}), 2000);
						test = 'error';
					}
				}
			}
		}
		
		if(name == ''){
			document.forms['buy_form_fin'].elements[0].style.border = "2px solid red";
			test = 'error';
		}
		if(phone == ''){
			document.forms['buy_form_fin'].elements[1].style.border = "2px solid red";
			test = 'error';
		}
		
		if (test == 'ok'){buy(test, 'norm');}
	}
	
	if(f == 'adm'){
		var test = 'ok';
		var login = document.forms['adm'].elements[0].value;
		var pass = document.forms['adm'].elements[1].value;
		console.log(login);
		console.log(pass);
		if(login == ''){
			document.forms['adm'].elements[0].style.border = "2px solid red";
			test = 'error';
		}
		if(pass == ''){
			document.forms['adm'].elements[1].style.border = "2px solid red";
			test = 'error';
		}
		if (test == 'ok'){admin();}
	}
}

//сброс стиля инпутов
function clear_bord(f_n,a){
	document.forms[f_n].elements[a].style.border = "1px solid #8080804f";	
}

//добавление товара в базу
function func_add(){
	function funcUpld(data){
		document.getElementById("img_w").style.display = 'none';
		$('.product_add_mess_ok').css({'display' : 'block'})
			setTimeout(() => $('.product_add_mess_ok').css({'display' : 'none'}), 2000);
			 console.log(data); 
	}

	function funcWait(){
		document.getElementById("img_w").style.display = 'block';
	}
	
	$('.input').click(function(){
		id = $(this).attr('id');
		$('#'+id).css({'borderColor' : '#0000004f'});
	});
	
	$('#up_file').click(function(){
		$('#up_file').css({'border' : 'none'});
	});
	
	var file = document.forms['add'].elements[17].files[0];
	
	
	if ( ($('#category').val() == '') || 
			($('#name').val() == '') ||
			($('#rozn').val() == '') ||
			($('#opt_m').val() == '') ||
			($('#opt').val() == '') ||
			($('#roll').val() == '') ||
			($('#color').val() == '') ||
			(!file)
		){
		$('.product_add_mess_err').text('Заполни поля!');
		if ( $('#name').val() == '' ){ $('#name').css({'borderColor' : 'red'}); }
		if ( $('#rozn').val() == '' ){ $('#rozn').css({'borderColor' : 'red'}); }
		if ( $('#opt_m').val() == '' ){ $('#opt_m').css({'borderColor' : 'red'}); }
		if ( $('#opt').val() == '' ){ $('#opt').css({'borderColor' : 'red'}); }
		if ( $('#roll').val() == '' ){ $('#roll').css({'borderColor' : 'red'}); }
		if ( $('#category').val() == '' ){ $('#category').css({'borderColor' : 'red'}); }
		if ( $('#color').val() == '' ){ $('#color').css({'borderColor' : 'red'}); }
		if ( !file)  { $('#up_file').css({'border' : '1px solid red'}); }
		$('.product_add_mess_err').css({'display' : 'block'})
			setTimeout(() => $('.product_add_mess_err').css({'display' : 'none'}), 2000);
	}
	else{
		var edit_f = "add"; 
		var form_i = document.forms.namedItem(edit_f);
		var form_data = new FormData(form_i);
		form_data.append("act", 'add');
		
		for(var pair of form_data.entries()) {
		  console.log(pair[0]+ ', '+ pair[1]); 
		}
		
		$.ajax({
				type: 'POST',
				url:  "upld.php",
				data: form_data,
				processData: false,
				contentType: false,
				beforeSend: funcWait,
				success: funcUpld
		});
	}
	
}

//изменение товара
function func_edit(id){
	
	var edit_f = "f"+id; 
	var form_i = document.forms.namedItem(edit_f);
	var form_data = new FormData(form_i);
	form_data.append("act", 'edit');
	form_data.append("id", id);
	
	for(var pair of form_data.entries()) {
	   console.log(pair[0]+ ', '+ pair[1]); 
	}
	
	$.ajax({
			type: 'POST',
			url:  "upld.php",
			data: form_data,
			processData: false,
			contentType: false,
			beforeSend: funcWait,
			success: funcEditFin
	});
	    
	function funcEditFin(data){
		document.getElementById("img_w"+id).style.display = 'none';
		document.getElementById("img_o"+id).style.display = 'block';
		console.log(data);
		if(data != 0){
			document.getElementById("img_"+id).src = data+'?32423';
		}
	}
	
	function funcWait(){
		document.getElementById("img_w"+id).style.display = 'block';
	}
	
}

//предпросмотр фото
function prev_img(id){
	if(id == "add"){
		var edit_f = "add"; 
		var preview = document.getElementById("img_add");
		var file = document.forms[edit_f].elements[17].files[0];
	}
	else{
		var edit_f = "f"+id; 
		var preview = document.getElementById("img_"+id);
		var file = document.forms[edit_f].elements[0].files[0];
	}
	
	var form_i = document.forms.namedItem(edit_f);
	var reader  = new FileReader();
	reader.onloadend = function () {
		preview.src = reader.result;
	}

	  if (file) {
		reader.readAsDataURL(file);
	  }
}

//удаление товара из базы
function del_prod (act, id){
	if(act == 'alert_open'){document.getElementById("del_alert_"+id).style.display="block";}
	if(act == 'alert_close'){document.getElementById("del_alert_"+id).style.display="none";}
	if(act == 'delete'){
		$.ajax({
			type: 'POST',
			url:  "upld.php",
			data: ({id: id, act: 'del'}),
			beforeSend: funcWaitDel(id),
			success: funcDelFin
		});
	}
	
	function funcWaitDel(){
		document.getElementById("del_alert_img_"+id).src="img/wait.gif";
	}
	
	function funcDelFin(data){
		document.getElementById("del_alert_"+id).style.display="none";
		document.getElementById("deleted_pr_"+id).style.display="block";
	}
}



//показываем форму обратного звонка
function call_back_form(){
	document.getElementById("cb_text").style.display="none";
	document.getElementById("cb_form").style.display="flex";
}

//обратный звонок 
function funcCBcls(){
	document.getElementById("cb_text").style.display="flex";
	document.getElementById("cb_form").style.display="none";
}

function funcCB(){
	document.getElementById("cb_text").style.display="flex";
	document.getElementById("cb_form").style.display="none";
	document.getElementById("b_shadow").style.display="block";
}

function call_back_form_send(){
	var tel = document.forms['cb_field'].elements[0].value;
	if(tel == ""){
		document.forms['cb_field'].elements[0].style.backgroundColor = "#ff9e9e";
	}
	else{
		$.ajax({
			type: 'POST',
			url:  "cb.php",
			data: ({tel: tel}),
			dataType: "html",
			success: funcCB
		});
	}
}










