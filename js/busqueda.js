$(document).on("ready",function(){
	
});
$(document).on('submit','form.formulario', function(e) {
		e.preventDefault(); // prevent native submit
		var percent=$("#"+$(this).attr("rel"))
    	$(this).ajaxSubmit({
        	target: '#respuestaformulario',
			beforeSend: function() {
				//status.empty();
				var percentVal = '0%';
				//bar.width(percentVal)
				percent.html(percentVal+'<div class="progress"><div class="bar" style="width: '+percentVal+';"></div></div>');
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				//bar.width(percentVal)
				percent.html(percentVal+'<div class="progress"><div class="bar" style="width: '+percentVal+';"></div></div>');
			},
			complete: function(xhr) {
			//bar.width("100%");
			//percent.html("100%");
			$("#respuestaformulario").html(xhr.responseText);
			
			}
    	})
});
$(document).on("click",".eliminar",function(e){
	e.preventDefault();
	if(confirm("¿Desea Eliminar esta Venta?")){
		var codigo=$(this).attr("rel");
		$.post($(this).attr("href"),{"codigo":codigo},function(){
			$("form.formulario").submit();
		});
	}
});