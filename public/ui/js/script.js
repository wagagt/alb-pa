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
	 	 		if (obj.length>1){	
	 	 			$.each(obj, function(){
	 	 				var userSendId = this['user_send_id'];
	 	 				if (userSendId == $('#activeChatId').val() ){ // refrescar conversacion
	 	 					// ir atraer los mensajes de la conversacion activa
	 	 					ajaxRefreshChat (docId, userSendId);
	 	 					var chatActive ="chat_"+docId+"_"+userSendId;
	 	 					$("#"+chatActive).click();
	               		}else{ // crear marca con numero de mensajes sin leer
	                		var total = this['total'];
	                		var domId = 'mensajeNuevo_'+userSendId;
	                		$('#'+domId).html(total);
	                	}
					});
	 	 		};
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

	 	},10000);
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
                // console.log(obj.length);
                var arrChangeStatusMessages = new Array();
                var newMessages = 0;
                if (obj.length>1){
                	var avatar_send  = obj[obj.length-1].avatar_send[0].avatar;
                	var avatar_receive  = obj[obj.length-1].avatar_receive[0].avatar;
                	delete obj[obj.length-1];
                	
	                var txt = '<div class="direct-chat-msg {msg-side}">\
	                <div class="direct-chat-info clearfix">\
	                <span class="direct-chat-name pull-{msg-info-side}">{time}</span>\
	                <span class="direct-chat-timestamp pull-{msg-info-side}">{msgid}</span>\
	                </div>\
	                <img class="direct-chat-img" src="/uploads/avatars/{avatar}" alt="{username}">\
	                <div class="direct-chat-text">{text}</div>\
	                </div>';
	                $.each(obj, function(){
	                	 if (!this.texto==''){
		                	var newChat = '';
							var msgSide = (this['user_send_id'] != inquilinoId)? "right" : "left";
							var avatarSide = (this['user_send_id'] != inquilinoId)? avatar_send : avatar_receive;
							var msgInfoSide = (this['user_send_id'] != inquilinoId)? "right" : "left";
		                    newChat = txt.replace("{msg-side}", msgSide);
		                    newChat = newChat.replace("{msg-info-side}", msgInfoSide);
		                    newChat = newChat.replace("{time}", this['created_at']);
		                    newChat = newChat.replace("{text}", this['texto'] + ' '+this['user_recibe_id']+ ' '+this['user_send_id']+ ' '+inquilinoId);
		                    newChat = newChat.replace("{msgid}", '<small>(msgid:'+this['id']+')</small>');
		                    newChat = newChat.replace("{avatar}", avatarSide);
		                    fullHtml = fullHtml+newChat+"<hr>";
		                    arrChangeStatusMessages.push(this['id']);
		                    newMessages++;
	                	 }
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
		             	$("#chats").scrollTop($("#chats").prop("scrollHeight")+800); //scroll top max
                }else{
                	$('#chats').html("No existen mensajes");
                }
                $("#notificacion").html("Ok:chat activo >" + $("#activeChatId").val());
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
				//$("#notificacion").html("Mensaje nuevo recibido!");
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