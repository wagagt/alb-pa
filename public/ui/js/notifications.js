
function getUnReadMessages(){
	var userId = $('#userid').val();
	setInterval(function() {
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
						var datec  	= this['created_at']; // cambia segun la via del mensaje.
						var docId   = this['documento_id'];
						var type	= this['mensaje_tipo'];
						var text	= this['texto'];
						var sender	= this.user_send.name;
						var iconText = '';
						if (type=='message'){
							iconText='<i class="fa fa-commenting-o fa-2"></i>';
						}else{
							iconText='<i class="fa fa-picture-o fa-2"></i>';
						}
						link='<li><a href="/documento/'+docId+'/archivos_documento"><div class="pull-left">'+iconText+'</div>';
						link=link+'&nbsp;&nbsp;<small><i class="fa fa-clock-o"></i>'+datec;
						link=link+'</small><h6>'+sender+'</h6><p>'+text+'...</p></a></li>';
						links=links+link;
					});
					$('#unreadLinks').html(links);
			};
		},
		error: function(response){
			return false;
		}
	});
	return false;
	}, 3000);
};

getUnReadMessages();
