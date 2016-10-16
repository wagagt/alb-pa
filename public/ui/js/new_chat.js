// Function get all messages by DocId
	function getAllChatsMessages() {
		var docId = $('#docto_id').val();
		var userId = $('#user_send').val();
		
		// setInterval(function() {
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
							var chatUserId  = this['user_recibe_id'];
							var userId      = this['user_send_id'];
							if (chatUserId == $('#activeChatId').val()) { // refrescar conversacion
								// ir atraer los mensajes de la conversacion activa
								ajaxRefreshChat(docId, chatUserId, userId);
								var chatActive = "chat_" + docId + "_" + chatUserId;
								$("#" + chatActive).click();
							}
							else { // crear marca con numero de mensajes sin leer
								var total = this['total'];
								var domId = 'mensajeNuevo_' + userId;
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
		// }, 10000);
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
				var newMessages = 0;
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
							newMessages++;
						}
					});
					$('#chats').html(fullHtml);
					// limpiar el aviso de mensajes sin leer
					var total = "";
					var domId = 'mensajeNuevo_' + userId;
					$('#' + domId).html(total);
					// si hay mensaje nuevo cambiar status ( de 1=enviado a 2=leido )
					//if (newMessages > 0) updateMessages(arrChangeStatusMessages);
					//updateMessages(arrChangeStatusMessages);
					updateActiveChat(chatUserId);
					$("#chats").scrollTop($("#chats").prop("scrollHeight") + 800); //scroll top max
				}
				else {
				// 	// update chatActiveId, Add chat-selected (RED), add user name on title.
				 	$('#chats').html("No existen mensajes");
				}
				$("#notificacion").html("Ok:chat activo >" + chatUserId);
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
	function updateActiveChat(chatUserId) {
		$('*[id^="chat_"]').removeClass('chat-selected');
		$('#chat_' + chatUserId).addClass('chat-selected');
		$('#activeChatId').val(chatUserId);
		var userName = $("#chat_" + $("#docto_id").val() + "_" + chatUserId).attr("title");
		$("#enviarA").html(userName);
	};