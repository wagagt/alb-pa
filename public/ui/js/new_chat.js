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
							var userReceiveId = this['user_recibe_id'];
							var userSendId = this['user_send_id'];
							if (userReceiveId == $('#activeChatId').val()) { // refrescar conversacion
								// ir atraer los mensajes de la conversacion activa
								ajaxRefreshChat(docId, userReceiveId, userSendId);
								var chatActive = "chat_" + docId + "_" + userReceiveId;
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