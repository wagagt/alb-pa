	// Event Send message to post on chat
	$('#sendMessage').click(function(event) {
		var chat = $('.compositor').val();
		var token = $('#token').val();
		var userSendId = $('#user_send').val();
		var userReceiveId = $('#activeChatId').val();
		var docId = $('#docto_id').val();
		if (!validateMessage(userReceiveId, chat)) return false;
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
				'user_send': userSendId,
				'user_recibe': userReceiveId,
				'docto_id': docId,
				'status': 1
			},
			success: function(data) {
				$('.compositor').val('');
				$('#userChatIcon_' + userReceiveId).html('<i class="fa fa-user fa-1" aria-hidden="true"><i class="fa fa-comment-o" aria-hidden="true"></i></i>');
				ajaxRefreshChat(docId, userReceiveId);
				return true;
			},
			error: function() {
				$("#chats").html('problemas... para enviar el mensaje!');
			},
			timeout: 10000,
		});
		return false;
	});
	
	
	// Event on click over user icon
	$('[id^=chat_]').click(function(event) {
		var thisId = $(this).attr('id'); //chat_3_3
		var arrayParams = thisId.split('_');
		var docId = arrayParams[1];
		var userId = arrayParams[2];
		$("#activeChatId").val(userId);
		ajaxRefreshChat(docId, userId);
	});
	
	// Function refresh html to show chat conversation
	function ajaxRefreshChat(docId, userId) {
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
				'userId': userId
			},
			success: function(data) {
				//alert('llego...con user: ' + userId +' doc: ' + docId);
				var fullHtml = "";
				var obj = $.parseJSON(data);
				// console.log(obj.length);
				var arrChangeStatusMessages = new Array();
				var newMessages = 0;
				if (obj.length > 1) {
					var arrAvatars = obj[obj.length-1]['avatars'];
					delete obj[obj.length - 1];
					var txt = '<div class="direct-chat-msg {msg-side}">\
	                <div class="direct-chat-info clearfix">\
	                <span class="direct-chat-name pull-{msg-info-side}">{time}</span>\
	                <span class="direct-chat-timestamp pull-{msg-info-side}">{msgid}</span>\
	                </div>\
	                <img class="direct-chat-img" src="/uploads/avatars/{avatar}" alt="{username}">\
	                <div class="direct-chat-text">{text}</div>\
	                </div>';
					$.each(obj, function() {
						if (!this.texto == '') {
							var newChat = '';
							var msgSide = (this['user_send_id'] == userId) ? "right" : "left";
							var msgInfoSide = (this['user_send_id'] == userId) ? "right" : "left";
							newChat = txt.replace("{msg-side}", msgSide);
							newChat = newChat.replace("{msg-info-side}", msgInfoSide);
							newChat = newChat.replace("{time}", this['created_at']);
							newChat = newChat.replace("{text}", this['texto']); //  + ' '+ this['user_recibe_id'] + ' ' + this['user_send_id'] + ' ' + userId);
							newChat = newChat.replace("{msgid}", '<small>(msgid:' + this['id'] + ')</small>');
							newChat = newChat.replace("{avatar}", arrAvatars['avatar_'+this['user_send_id']]);
							fullHtml = fullHtml + newChat + "<hr>";
							arrChangeStatusMessages.push(this['id']);
							newMessages++;
						}
					});
					updateActiveChat(userId);
					$('#chats').html(fullHtml);
					// limpiar el aviso de mensajes sin leer
					var total = "";
					var domId = 'mensajeNuevo_' + userId;
					$('#' + domId).html(total);
					// si hay mensaje nuevo cambiar status ( de 1=enviado a 2=leido )
					if (newMessages > 0) updateMessages(arrChangeStatusMessages);
					$("#chats").scrollTop($("#chats").prop("scrollHeight") + 800); //scroll top max
				}
				else {
					// update chatActiveId, Add chat-selected (RED), add user name on title.
					updateActiveChat(userId);
				}
				$("#notificacion").html("Ok:chat activo >" + $("#activeChatId").val());
			},
			error: function(response) {
				var newChat = 'ERROR: Problemas para retornar la conversación.';
				$("#chats").html(newChat);
			}
		});
		$("html, body").animate({
			scrollTop: $(document).height()
		}, 1000);
	};
	
	// Function update ActiveChat, Name on User, clear message textbox
	function updateActiveChat(inquilinoId) {
		$('.compositor').val('');
		$('#chats').html("No existen mensajes");
		$('*[id^="chat_"]').removeClass('chat-selected');
		$('#chat_' + inquilinoId).addClass('chat-selected');
		$('#activeChatId').val(inquilinoId);
		var userName = $("#chat_" + $("#docto_id").val() + "_" + inquilinoId).attr("title");
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
				//$("#notificacion").html("Mensaje nuevo recibido!");
			},
			error: function(response) {
				var newChat = 'ERROR: Problemas para cambiar estado a los mensajes mostrados.';
				$("#notificacion").html(newChat);
			}
		});
	};
	
	// Function validate message to post. ( not null && .len > 6 )
	function validateMessage(userReceiveId, chat) {
		if (userReceiveId == "") {
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
	function searchNewMessageByDoc() {
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
							var userSendId = this['user_send_id'];
							var userReceiveId = this['user_re_id'];
							if (userSendId == $('#activeChatId').val()) { // refrescar conversacion
								// ir atraer los mensajes de la conversacion activa
								ajaxRefreshChat(docId, userId);
								var chatActive = "chat_" + docId + "_" + userSendId;
								$("#" + chatActive).click();
							}
							else { // crear marca con numero de mensajes sin leer
								var total = this['total'];
								var domId = 'mensajeNuevo_' + userSendId;
								$('#' + domId).html(total);
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
		}, 10000);
		$("#notificacion").html("chat activo >" + $("#activeChatId").val());
	};

	// Accordion js
	$('#accordion2').collapse({
		toggle: false
	});

	searchNewMessageByDoc();
