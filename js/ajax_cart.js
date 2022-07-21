		function sendform_dress (id,p){
			var razmer = $("#razmer option:selected").text();
			var id_new = id+'_'+razmer;
			sendform(id_new,p);
		}
		
		
		function sendform(id,p){
			//изменение колличества товара
			function funcCart_ord(data){
				
				var summ = 's_'+id;
				var quantity = document.forms['f1_'+id].elements[0].value;
				var rozn = document.forms['f1_'+id].elements[1].value;
				var opt_m = document.forms['f1_'+id].elements[2].value;
				var opt = document.forms['f1_'+id].elements[3].value;
				var cost = null;
				var stts = $('#stts_'+id).val();
				var roll = $('#roll_'+id).val(); 
				
				quantity = +quantity;
				
				
				if ( (stts == 'opt') && (quantity <= roll) ){
					quantity = roll;
				}
				
				if ( (stts == 'opt_i_m_opt') && (quantity <= 10) ){
					quantity = 10;
				}
				
				if ( (stts != 'opt_i_m_opt') && (stts != 'opt') && (stts != 'furn') && (quantity <= 3) ){
					quantity = 3; console.log('2');
				}
				
				if ((stts == 'furn') && (quantity <= 1)){
					quantity = 1; console.log('1');
				}
				
				if ((stts != 'furn') && (stts != 'sp')){
					if (quantity<10){ cost = rozn; }
					if ( (quantity>=10) && (quantity<roll) ){  cost = opt_m; }
					if (quantity>=roll){ cost = opt; }
				}
				else{
					cost = rozn;
				}
				
				
				var s = quantity * cost;
				cost = parseFloat(cost);
				cost = cost.toFixed(1);
				
				$('#v2_'+id).val(cost);
				$('#f2_'+id).text(cost);
				
				document.getElementById('fss_'+id).innerHTML = "<input type='hidden' value='"+s.toFixed(1)+"'>";
				document.getElementById(summ).innerHTML = '<p class="ord_hint_mob">Сумма</p>'+'<p>'+s.toFixed(1)+'</p>';
				$('.cartC').text(data);
				
				var s1 = 0;
				var s2 = 0;
				var n = document.forms['fields'].elements[0].value;
				n = +n;
				for (var i = 1; i < n+1; i++) {
					s1 = document.forms['fs_'+i].elements[0].value;
					s1 = +s1;  
					s2 = s2+s1; 					
				}
				document.getElementById("summ_ord").innerHTML="Сумма заказа: "+s2.toFixed(1)+" ГРН";
				$('#summ_ord_field').val(s2.toFixed(1));
			}
			
			if(p == 'cart_ord'){
					var quantity = document.forms['f1_'+id].elements[0].value;
					
					$.ajax({
							type: 'POST',
							url:  "cart.php",
							data: ({product_id: id, quantity: quantity, cart: 1}),
							dataType: "html",
							success: funcCart_ord
							});
			};
			
			//удаление товара
			var e = 'pr_'+id; 
			function funcDel(data){
				if(data > 0){
					document.getElementById(e).parentNode.removeChild(document.getElementById(e));
					document.forms['fss_'+id].elements[0].value = 0; 
					
					document.getElementById("cartC").innerHTML=data;
					s1 = 0;
					s2 = 0;
					var n = document.forms['fields'].elements[0].value;
					n = +n; 
					for (var i = 1; i < n+1; i++) {
						s1 = document.forms['fs_'+i].elements[0].value;
						s1 = +s1;  
						s2 = s2+s1; 				
					}
					
					document.getElementById("summ_ord").innerHTML="Сумма заказа: "+s2+" ГРН";
				}
				else{
					$('#summ_ord').css({'display' : 'none'}); 
					$('#cartC').text('0'); 
					document.getElementById("ord").parentNode.removeChild(document.getElementById("ord"));
					document.getElementById("summ_ord_rect").parentNode.removeChild(document.getElementById("summ_ord_rect"));
					
				}
			}
			if(p == 'del_pr'){
					$.ajax({
							type: 'POST',
							url:  "cart.php",
							data: ({product_id: id, del: 1}),
							dataType: "html",
							success: funcDel
							});
			};
			
			//очистка корзины
			function funcClear(){
				document.getElementById("cart_container").style.display="none";
			}
			
			$('#').bind('click', function(){
				$.ajax({
							type: 'POST',
							url:  "cart.php",
							data: ({clear: 1}),
							dataType: "html",
							success: funcClear
							});
			});
			
			//добавление в корзину
			function funcC(data){
				/*function cls(){
					document.getElementById("cart_mess_added").style.display="none";
				}
				setTimeout(cls, 1000);
				$("#cart_mess_added").stop().animate({ opacity: "1" }, 1000);
				$("#cart_mess_added").animate({ opacity: "0" }, 700);
				*/
				dataLayer.push({'event': 'add_to_cart'});
				$('.cartC').text(data);
			}
			
			if(p == 'cart'){
					var quantity_ = $('#qt_'+id).val();
					console.log('----'+quantity_+'----');
					$.ajax({
							type: 'POST',
							url:  "cart.php",
							data: ({product_id: id, quantity_: quantity_, cart: 1}),
							dataType: "html",
							success: funcC
							});					
			}
			
			if(p == 'cart_prdct'){
					var quantity = $('#quantity_field').val();
					$.ajax({
							type: 'POST',
							url:  "cart.php",
							data: ({product_id: id, quantity: quantity, cart: 2}),
							dataType: "html",
							success: funcC
							});					
			}	
			
			//проверка корзины
			function funcChek(data){
				if(data>0){
					$('.cartC').text(data);
					document.getElementById("cartC").innerHTML=data;
				}
				else{
					$('.cartC').text(0);
					document.getElementById("cartC").innerHTML=0;
				}
			}
			
			if(p == 'chek'){
					$.ajax({
							type: 'POST',
							url:  "cart.php",
							data: ({chek: 1}),
							dataType: "html",
							success: funcChek
							});
			}
		}
		
		
		function buy(test, s){
			function funcBuy(data){
				console.log(data);
				$('.loadWindow').fadeOut(400);	
				$('.spsWindow').slideToggle(400);	
			}
			
			function funcWait(){
				dataLayer.push({'event': 'buy'});
				$('.modalWinowConteiner').css({ 'display' : 'none' });
				$('.loadWindow').fadeIn(400);
			}
			
			if (test == 'ok' && s == 'callback'){
				var name = $('#c_name_cb').val();
				var phone = $('#c_phone_cb').val(); 
				var callback = 1;
				$.ajax({
					type: 'POST',
					url:  "buy.php",
					data: ({name: name, phone: phone, callback: callback, s: s}),
					dataType: "html",
					beforeSend: funcWait,
					success: funcBuy
				});
			}
			
			if (test == 'ok' && s == 'fast'){
				var name = $('#c_name').val();
				var phone = $('#c_phone').val(); 
				var mail = $('#c_mail').val(); 
				var comments = $('#c_comm').val(); 
				$.ajax({
					type: 'POST',
					url:  "buy.php",
					data: ({name: name, mail: mail, phone: phone, comments: comments, s: s}),
					dataType: "html",
					beforeSend: funcWait,
					success: funcBuy
				});
			}
			
			if (test == 'ok' && s == 'norm'){
				var name = $('#c_name_').val();
				var phone = $('#c_phone_').val(); 
				var mail = $('#c_mail_').val(); 
				var comments = $('#c_comm_').val(); 
				var area = $("#npAreas option:selected").text(); 
				var city = $("#npCity option:selected").text();
				var warehouse = $("#npWarehouses option:selected").text(); 
				var delivery = '';
				
				
				if ($('#rb1').prop("checked") == true){
					delivery = 'Новая Почта\n---Область: - '+area+'\n'+
												'---Город: - '+city+'\n'+
												'---Отделение: - '+warehouse;
				}
				else{
					delivery = 'Самовывоз';
				}
				
				
				
				$.ajax({
					type: 'POST',
					url:  "buy.php",
					data: ({
						name: name, 
						mail: mail, 
						phone: phone, 
						comments: comments,
						delivery: delivery, 
						s: s}),
					dataType: "html",
					beforeSend: funcWait,
					success: funcBuy
				});
			}
		}
		
		function admin(){
			
			function funcInend(admin){
				document.location.href = 'edit.php';
			}
			
			function funcIn(data){
				if (data == 'e_log'){
					document.forms['adm'].elements[0].style.border = "2px solid red";
				}
				if (data == 'e_pass'){
					document.forms['adm'].elements[1].style.border = "2px solid red";
				}
				if((data != 'e_log')&&(data != 'e_pass')){
					$.ajax({
							type: 'POST',
							url:  "in.php",
							data: ({login: data, step: 2}),
							dataType: "html",
							success: funcInend
							});
				}
			}
			
			var login = $('#c_name').val();
			var pass = $('#c_phone').val();;
			
			$.ajax({
					type: 'POST',
					url:  "in.php",
					data: ({login: login, pass: pass, step: 1}),
					dataType: "html",
					success: funcIn
					});
		}
		
		function logout(){
			
			function funcOut(){
				document.location.href = 'index.php';
			}
			
			$.ajax({
					type: 'POST',
					url:  "in.php",
					data: ({out: 'out'}),
					dataType: "html",
					success: funcOut
					});
		}