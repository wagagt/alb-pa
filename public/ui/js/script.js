$(document).ready(michat);

function michat(){
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
				var newChat = '';
                var obj = $.parseJSON(data);
                $.each(obj, function(){
					var orientacionColumn = '';
					if(this['user_send_id'] == inquilinoId) {
                        orientacionColumn = 'default col-md-5 text-left leftColor';
                    }else if(this['user_send_id'] !== inquilinoId){
                        orientacionColumn = 'default col-md-5 text-right rightColor';
                    }

                    newChat += '<div class="row box box-'+orientacionColumn+'">';
                    newChat += '<div  class="box-body col-xs-12 ">';
                    newChat +=  this['texto'] ;
                    newChat += '<br><span class="dateColor">hora: ' + this['created_at']+"</span>";
                    newChat += '</div>';
                    newChat += '</div>';
				});
                // inyectar en el contenedor de CHAT.
                $("#chats").html(newChat);
			},
            error: function(response) {
                var newChat = 'ERROR: Problemas para retornar la conversación.';
                $("#chats").html(newChat);
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