$(document).ready(michat);
function michat(){
	 //escucha();
	 $('#compositor').keypress(function(event){
	 	 var keycode = (event.keycode ? event.keycode : event.which);
	 	 if(keycode == '13'){
	 	 	var chat = $('.compositor').val();
	 	 	var token = $('#token').val();
	 	 	var user_send = $('#user_send').val();
	 	 	var user_recibe = $('#user_recibe').val();
	 	 	var documento = $('#docto_id').val();
	 	 	$.ajax({
	 	 		async: true,
	 	 		headers:{'X-CSRF-TOKEN': token},
	 	 		type: "POST",
	 	 		dataType: "html",
	 	 		contenType: "application/x-www-form-urlencoded",
	 	 		url: "/escribir",
	 	 		data:{
	 	 			'chat' : chat,
	 	 			'user_send' : user_send,
	 	 			'user_recibe' : user_recibe,
	 	 			'docto_id' : documento,
	 	 			'status' : 2
	 	 			},	 	 		
	 	 		success: llegada,
	 	 		timeout: 10000,
	 	 		error: problemas
	 	 	});
	 	 		return false;
	 	 		function llegada(dato){
	 	 			$('.compositor').val('');
	 	 		}
	 	 		function problemas(){
	 	 			$("#chats").html('problemas... por favor actualiza el navegador');
	 	 		}
	 	 }
	 });


	  function escucha(){
	 	setInterval(function(){
	 		$.ajax({
	 	 		async: true,
	 	 		//headers:{'X-CSRF-TOKEN': token},
	 	 		type: "GET",
	 	 		dataType: "html",
	 	 		contenType: "application/x-www-form-urlencoded",
	 	 		url: "/llamando",
	 	 		success: llegada,
	 	 		timeout: 10000,
	 	 		error: problemas
	 	 	});
	 	 		return false;
	 	 		function llegada(dato){
	 	 			$("#chats").html(dato);
	 	 			var objDiv = document.getElementById('chats');
	 	 				objDiv.scrollTop = objDiv.scrollHeight;
	 	 		}
	 	 		function problemas(){
	 	 			$("#chats").html('problemas... por favor actualiza el navegador');
	 	 		}

	 	},1000);
	 }

	$('[id^=chat_]').click(function(event){
		var thisId = $(this).attr('id'); //chat_3_3
		var arrayParams = thisId.split('_');
		var docId = arrayParams[1];
		var inquilinoId = arrayParams[2];
		$.ajax({
			async: true,
			headers:{'X-CSRF-TOKEN': token},
			type: "GET",
			dataType: "html",
			contenType: "application/x-www-form-urlencoded",
			url: "/getchat",
			data:{
				'docId' : docId,
				'inquilinoId' : inquilinoId
			},
			success: function(data) {
				// armar html

				var newChat = '';

                var obj = $.parseJSON(data);
                $.each(obj, function(){
                    newChat +="<div style='align-left'> " + this['texto']+"</div>";
                    newChat+='<br>hora:'+this['created_at']+'<hr>';

                     //    //si el mensaje es del inquilino newChat=HtML align-left &*azul
                     //    //si el mensaje es del inquilino newChat=HtML align-right *verde

				});
                // inyectar en el contenedor de CHAT.
                $("#chats").html(newChat);
                //alert('exito');
			},
            error: function(response) {
                // armar mensaje de error html
                // inyectar al conteiner de 	CHAT.
            }
		});
		return false;
		function llegada(dato){
			$('.compositor').val('');
		}
		function problemas(){
			$("#chats").html('problemas... por favor actualiza el navegador');
		}



		});

}