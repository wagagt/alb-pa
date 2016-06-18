$(document).ready(sendMessage);

function sendMessage(){
	 $('#sendMessage').click(function(event){
	 	 //var keycode = (event.keycode ? event.keycode : event.which);
	 	 //if(keycode == '13'){
	 	 	var chat = $('.compositor').val();
	 	 	var token = $('#token').val();
	 	 	var userSendId = $('#user_send').val();
	 	 	var userReceiveId = $('#user_recibe').val();
	 	 	var docId = $('#docto_id').val();
	 	 	if (userReceiveId=="") alert('ALERTA: Elige un chat antes de enviar mensaje.');
	 	 	$.ajax({
	 	 		async: true,
	 	 		headers:{'X-CSRF-TOKEN': token},
	 	 		type: "POST",
	 	 		dataType: "html",
	 	 		contenType: "application/x-www-form-urlencoded",
	 	 		url: "/escribir",
	 	 		data:{
	 	 			'chat' : chat,
	 	 			'user_send' : userSendId,
	 	 			'user_recibe' : userReceiveId,
	 	 			'docto_id' : docId,
	 	 			'status' : 1
	 	 			},	 	 		
	 	 		success: function(data){
	 	 				$('.compositor').val('');
	 	 				$('#userChatIcon_'+userReceiveId).html('<i class="fa fa-user fa-1" aria-hidden="true"><i class="fa fa-comment-o" aria-hidden="true"></i></i>');
	 	 				ajaxRefreshChat (docId, userReceiveId);
	 	 		},
	 	 		error: function (){
	 	 			$("#chats").html('problemas... para enviar el mensaje!');
	 	 		},
				timeout: 10000,
	 	 	});
	 	 		return false;
	 	// }
	 });

	  function searchNewMessageByDoc(){
	  	var docId = $('#docto_id').val();
	  	//alert(docId);
	 	setInterval(function(){
	 		$.ajax({
	 	 		async: true,
	 	 		//headers:{'X-CSRF-TOKEN': token},
	 	 		type: "GET",
	 	 		dataType: "html",
	 	 		contenType: "application/x-www-form-urlencoded",
	 	 		url: "/getNewMessages",
	 	 		data:{
				'docId' : docId
				},
	 	 		success: function(data) {
	 	 			var obj = $.parseJSON(data);
	 	 			$.each(obj, function(){
	 	 				var userRecibeId = this['user_recibe_id'];
	 	 				if (userRecibeId == $('#activeChatId').val() ){ // refrescar conversacion
	 	 					//ajaxRefreshChat (docId, userRecibeId);
	 	 					var chatActive ="chat_"+docId+"_"+userRecibeId;
	 	 					$("#"+chatActive).click();
	               		}else{ // crear marca con numero de mensajes sin leer
	                		var total = this['total'];
	                		var domId = 'mensajeNuevo_'+userRecibeId;
	                		$('#'+domId).html(total);
	                	}
					});
					$("#notificacion").html("Ok:chat activo >" + $("#activeChatId").val());
	 	 		},
            	error: function(response) {
            		$("#notificacion").html("Error:chat activo >" + $("#activeChatId").val());
	                var errorMessage = 'ERROR: Problemas para retornar los mensajes nuevos.';
	                $("#users").html(errorMessage);
            	},
	 	 		timeout: 10000
	 	 	});
	 	 		return false;
	 	 		// function llegada(dato){
	 	 		// 	$("#chats").html(dato);
	 	 		// 	var objDiv = document.getElementById('chats');
	 	 		// 		objDiv.scrollTop = objDiv.scrollHeight;
	 	 		// }
	 	 		// function problemas(){
	 	 		// 	$("#chats").html('problemas... por favor actualiza el navegador');
	 	 		// }

	 	},5000);
	 	$("#notificacion").html("chat activo >" + $("#activeChatId").val());
	 }

	$('[id^=chat_]').click(function(event){
		var thisId = $(this).attr('id'); //chat_3_3
		var arrayParams = thisId.split('_');
		var docId = arrayParams[1];
		var inquilinoId = arrayParams[2];
		$("#activeChatId").val(inquilinoId);
		  ajaxRefreshChat (docId, inquilinoId);
		});

function ajaxRefreshChat(docId, inquilinoId){
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
				var fullHtml ="";
                var obj = $.parseJSON(data);
                var arrChangeStatusMessages = new Array();
                var newMessages = 0;
                var txt = '<div class="direct-chat-msg {msg-side}">\
                <div class="direct-chat-info clearfix">\
                <span class="direct-chat-name pull-{msg-info-side}">{time}</span>\
                <span class="direct-chat-timestamp pull-{msg-info-side}">{msgid}</span>\
                </div>\
                <img class="direct-chat-img" src="/ui/images/avataruser.png" alt="message user image">\
                <div class="direct-chat-text">{text}</div>\
                </div>';
                $.each(obj, function(){
                	var newChat = '';
					var msgSide = (this['user_send_id'] == inquilinoId)? "" : "right";
					var msgInfoSide = (this['user_send_id'] != inquilinoId)? "left" : "right";
                    newChat = txt.replace("{msg-side}", msgSide);
                    newChat = newChat.replace("{msg-info-side}", msgInfoSide);
                    newChat = newChat.replace("{time}", this['created_at']);
                    newChat = newChat.replace("{text}", this['texto']);// + ' '+this['user_recibe_id']+ ' '+this['user_send_id']);
                    newChat = newChat.replace("{msgid}", '<small>(msgid:'+this['id']+')</small>');
                    fullHtml = fullHtml+newChat+"<hr>";
                    arrChangeStatusMessages.push(this['id']);
                    newMessages++;
				});
                // inyectar en el contenedor de CHAT.
                $('*[id^="chat_"]').removeClass('chat-selected');
                $('#chat_'+inquilinoId).addClass('chat-selected');
                $("#user_recibe").attr('value',inquilinoId);
                $('#chats').html(fullHtml);
                // limpiar el aviso de mensajes sin leer
                var total = "";
				var domId = 'mensajeNuevo_'+inquilinoId;
	            $('#'+domId).html(total);
	            // si hay mensaje nuevo cambiar status ( de 1=enviado a 2=leido )
	            if(newMessages>0) updateMessages(arrChangeStatusMessages);
			},
            error: function(response) {
                var newChat = 'ERROR: Problemas para retornar la conversación.';
                $("#chats").html(newChat);
            }
		});
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
};


function updateMessages(arrMessages){
	$.ajax({
			async: true,
			headers:{'X-CSRF-TOKEN': token},
			type: "GET",
			dataType: "html",
			contenType: "application/x-www-form-urlencoded",
			url: "/updateMessages",
			data:{
				'data' : arrMessages
			},
			success: function(data) {
				$("#notificacion").html("Mensaje nuevo recibido!");
			},
			error: function(response) {
                var newChat = 'ERROR: Problemas para cambiar estado a los mensajes mostrados.';
                $("#notificacion").html(newChat);
            }
	});
};


searchNewMessageByDoc();

$('#accordion2').collapse({
  toggle: false
})
}