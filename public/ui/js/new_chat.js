	// Event Send message to post on chat
	$('#sendMessage').click(function(event) {
		var chat = $('.compositor').val();
		var token = $('#token').val();
		var userId = $('#user_send').val();
		var chatUserId = $('#activeChatId').val();
		var docId = $('#docto_id').val();
		if (!validateMessage(chatUserId, chat)) return false;
		$.ajax({
			async: true,
			headers: {
				'X-CSRF-TOKEN': token
			},
			type: "POST",
			dataType: "html",
			contenType: "application/x-www-form-urlencoded",
			url: "/sendMessage",
			data: {
				'chat': chat,
				'user_send': userId,
				'user_recibe': chatUserId,
				'docto_id': docId,
				'status': 1
			},
			success: function(data) {
				$('.compositor').val('');
				$('#userChatIcon_' + chatUserId).html('<i class="fa fa-user fa-1" aria-hidden="true"><i class="fa fa-comment-o" aria-hidden="true"></i></i>');
				ajaxRefreshChat(docId, chatUserId, userId);
				return true;
			},
			error: function() {
				$("#chats").html('problemas... para enviar el mensaje!');
			},
			timeout: 10000,
		});
		return false;
	});
	
// Function validate message to post. ( not null && .len > 6 )
	function validateMessage(chatUserId, chat) {
		if (chatUserId == "") {
			alert('ALERTA: Elige un chat antes de enviar mensaje.');
			return false;
		};
		if (chat.length < 6) {
			alert('ALERTA: El mensaje debe tener mas de 5 caracteres.');
			return false;
		};
		return true;
	};
	
	// Function get all messages by DocId
	function getAllChatsMessages() {
		var docId = $('#docto_id').val();
		var userId = $('#user_send').val();
		
		setInterval(function() {
			$.ajax({
				async: true,
				type: "GET",
				dataType: "html",
				contenType: "application/x-www-form-urlencoded",
				url: "/getNewMessages",
				data: {
					'docId': docId,
					'userId': userId
				},
				success: function(data) {
					if(!data) return false;
					var obj = $.parseJSON(data);
					if (obj.length > 0) {
						$.each(obj, function() {
							var chatUserId  	= this['user_recibe_id']; // cambia segun la via del mensaje.
							var userSendId      = this['user_send_id'];
							var activeChatId	= $('#activeChatId').val();
							if (chatUserId == activeChatId || userSendId == activeChatId) { // si un mensaje viene del usuario con el mismo chatActivo
								// este codigo deberia optimizarse para no 
								// refrescar el chat, en cada mensaje que cumpla la condicion
								// deberia verificar si 1 mensaje cumple, al final llamar la funcion 
								// ajaxRefreshChat (xxx) 1 sola vez. 
								// OJO: this['user_recibe_id'] y this['user_sed_id'] varian los ids segun la direccion del mensaje en c/iteracion.
								ajaxRefreshChat(docId, activeChatId, userId); // DEBE ASEGURARSE DE ENVIAR SIEMPRE EL CHATUSERID CORRECTO PARA ADMIN & PROPIETARIO
								// var chatActive = "chat_" + docId + "_" + chatUserId;
								 //$("#" + chatActive).click();
							}
							else { // crear marca con numero de mensajes sin leer
								$('#' + 'mensajeNuevo_' + userSendId).html(this['total']);
								// subir el row de este mensaje hasta arriba. (x prioridad)
								$('#row-'+userSendId).insertAfter('#row-0');
							}
						});
						//aca preguntar si Hay que refreschar el chat
						// ajaxRefreshChat(docId, chatUserId, userId);
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
		}, 10000);
		$("#notificacion").html("chat activo >" + $("#activeChatId").val());
	};
	
	// Event on click over user icon
	$('[id^=chat_]').click(function(event) {
		var thisId = $(this).attr('id'); //chat_3_3
		var arrayParams = thisId.split('_');
		var docId = arrayParams[1];
		var chatUserId = arrayParams[2];
		var userId = arrayParams[3];
		$("#activeChatId").val(chatUserId);
		$('#file-box').show();
    	$('#file-box-message').hide();
		ajaxRefreshChat(docId, chatUserId, userId);
	});
	
		// Function refresh html to show chat conversation
	function ajaxRefreshChat(docId, chatUserId, userId) {
		$.ajax({
			async: true,
			headers: {
				'X-CSRF-TOKEN': token
			},
			type: "GET",
			dataType: "html",
			contenType: "application/x-www-form-urlencoded",
			url: "/getchat",
			data: {
				'docId': docId,
				'userId': userId,
				'chatUserId': chatUserId
			},
			success: function(data) {
				var fullHtml = "";
				var obj = $.parseJSON(data);
				console.log(obj.length);
				var arrChangeStatusMessages = new Array();
				if (obj.length > 1) {
					var arrAvatars = obj[obj.length-1]['avatars'];
					delete obj[obj.length - 1];
					var txt = '<div class="direct-chat-msg {msg-side}">\
	                <div class="direct-chat-info clearfix">\
	                <span class="direct-chat-name pull-{msg-info-side}">{time}</span>\
	                <span class="direct-chat-timestamp pull-{msg-info-side}">-{msgid}-</span>\
	                </div>\
	                <img class="direct-chat-img" src="/uploads/avatars/{avatar}" alt="{username}">\
	                <div class="direct-chat-text">{text}</div>\
	                </div>';
	                msgCount=0;
					$.each(obj, function() {
						if (!this.texto == '') {
							var newChat = '';
							var msgSide = (this['user_send_id'] == userId) ? "right" : "left";
							newChat = txt.replace("{msg-side}", msgSide);
							newChat = newChat.replace(/{msg-info-side}/g, msgSide);
							newChat = newChat.replace("{time}", this['created_at']);
							newChat = newChat.replace("{text}", this['texto']); //  + ' '+ this['user_recibe_id'] + ' ' + this['user_send_id'] + ' ' + userId);
							newChat = newChat.replace("{msgid}", '<small>(msgid:' + this['id'] + ')</small>');
							newChat = newChat.replace("{avatar}", arrAvatars['avatar_'+this['user_send_id']]);
							fullHtml = fullHtml + newChat + "<hr>";
							if (this['user_send_id'] != userId) { // actualizar solo mensajes NO MIOS
								arrChangeStatusMessages.push(this['id']);
							}
						}
					    msgCount++;
					});
					$('#chats').html(fullHtml);
					$('#messagesCount').html('<h5>Mensajes = ( '+msgCount+' )</h5>');
					// si hay mensaje nuevo cambiar status ( de 1=enviado a 2=leido )
					if ( arrChangeStatusMessages.length > 0 ) updateMessages(arrChangeStatusMessages);
					$("#chats").scrollTop($("#chats").prop("scrollHeight") + 800); //scroll top max
				}
				else {
				// 	// update chatActiveId, Add chat-selected (RED), add user name on title.
				 	$('#chats').html("No existen mensajes");
				 	$('#messagesCount').html('<h5>Mensajes</h5>');
				}
				updateActiveChat(docId, chatUserId, userId) ;
				$("#notificacion").html("Ok:chat activo >" + chatUserId);
			},
			error: function(response) {
				var newChat = 'ERROR: Problemas para retornar la conversación.';
				$("#chats").html(newChat);
			}
		});
		$("html, body").animate({
			scrollTop: $(document).height()
		}, 10000);
	};
	
	// Function update ActiveChat, Name on User, clear message textbox
	function updateActiveChat(docId, chatUserId, userId)  {
	    // limpiar el aviso de mensajes sin leer
		$('#' + 'mensajeNuevo_' + chatUserId).html('');
		// set class chat-selected to active chat
		//$('*[id^="chat_"]').removeClass('chat-selected');
		$('[class^="alb-row"]').removeClass('chat-selected');
		$('#chat_'+docId+'_'+chatUserId+'_'+userId).addClass('chat-selected');
		//$('#chat_' + chatUserId).addClass('chat-selected');
		//$('#activeChatId').val(chatUserId);
		var userName = $("#chat_" + $("#docto_id").val() + "_" + chatUserId).attr("title");
		$("#enviarA").html(userName);
	};
	
	// Function to Update Messages
	function updateMessages(arrMessages) {
		$.ajax({
			async: true,
			headers: {
				'X-CSRF-TOKEN': token
			},
			type: "GET",
			dataType: "html",
			contenType: "application/x-www-form-urlencoded",
			url: "/updateMessages",
			data: {
				'data': arrMessages
			},
			success: function(data) {
				return;
			},
			error: function(response) {
				$("#notificacion").html('ERROR: Problemas para cambiar estado a los mensajes mostrados.');
			}
		});
	};
	
	// Refresh chat after upload file
	function updateChatAfterUploadFile(){
		docId = $('#documento_id').val();
		chatUserId = $('#activeChatId').val();
		userId = $('#user_send').val();
		ajaxRefreshChat(docId, chatUserId, userId)	
	}
	
	getAllChatsMessages();