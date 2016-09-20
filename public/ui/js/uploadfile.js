

    $('#subir').click(function(){
      
      var chatId =  $('#activeChatId').val(); 
      if(chatId == ""){
        alert('ALERTA: Elige un chat antes de enviar un archivo ');
        return false;
      }else{
      var charActive = $('#chatActive').attr('value', chatId);
      uploadFile();
      
      }
      
  });
  
  function uploadFile(){
    Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 1,

            init: function() {
                    var submitBtn = document.querySelector("#subir");
                    myDropzone = this;

                    submitBtn.addEventListener("click", function(e){
                            e.preventDefault();
                            e.stopPropagation();
                            myDropzone.processQueue();
                    });
                    this.on("addedfile", function(file) {
                            //alert("Archivo listo para enviar");
                    });

                    this.on("complete", function(file) {
                            myDropzone.removeFile(file);
                             
                    });

                    this.on("success",function(file){
                            myDropzone.processQueue.bind(myDropzone);
                            alert("Archivo enviado exitosamente");
                    });
            }
    };
  };
    
    
    


