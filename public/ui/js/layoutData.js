
function getTiposDocumento(){
		var userTorreId	= $('#userTorreId').val();
		$.ajax({
		async: true,
		type: "GET",
		dataType: "html",
		contenType: "application/x-www-form-urlencoded",
		url: "/user/propietario/tipo_documento",
		success: function(data){
			if(!data) return false;
			var obj = $.parseJSON(data);
			if(obj.length>0){
				
				var links='';
				var link='';
					$.each(obj, function() {
						var docId   = this['id'];
						var desc	= this['descripcion'];
						link='<li><a href="/propietario/torre/'+userTorreId+'/'+docId+'/documentos">'+desc+'</a></li>';
						links=links+link;
					});
					$('#tiposDocumento').html(links);
			};
		},
		error: function(response){
			return false;
		}
	});
};

getTiposDocumento();
