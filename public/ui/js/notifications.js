
function getUnReadMessages(){
	console.log('llego a funcion');
	var userId = $('#userid').val();
	console.log("userid="+userId);
	$.ajax({
		async: true,
		type: "GET",
		dataType: "html",
		contenType: "application/x-www-form-urlencoded",
		url: "/notifications/user/"+userId+"/unread_messages",
		data:{'userId':userId},
		success: function(data){
			if(!data) return false;
			var obj = $.parseJSON(data);
			if(obj.length>0){
				$('#unreadCount').html(obj.length);
				$('#unreadCountText').html("Tiene "+obj.length+" Mensajes");
				
				var links='';
				var link='';
					$.each(obj, function() {
						link='<li><a href="#"><div class="pull-left"></div>';
						var datec  	= this['created_at']; // cambia segun la via del mensaje.
						var docId   = this['documento_id'];
						var type	= this['mensaje_tipo'];
						var text	= this['texto'];
						var sender	= this['user_send_id'];
					
						link=link+'<h4> Documento' + docId + '<small><i class="fa fa-clock-o"></i>';
						link=link+datec+'</small></h4><p>'+text+'</p></a></li>';
						links=links+link;
					});
					$('#unreadLinks').html(links);
			};
		},
		error: function(response){
			return false;
		}
	});
};

getUnReadMessages();
