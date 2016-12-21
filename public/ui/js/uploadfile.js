

    $('#subir').click(function(){

      var chatId =  $('#activeChatId').val();

      $('#chatActive').attr('value', chatId);

  });


    Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 1024,
            maxFiles: 1,
            previewsContainer: '#dz-Preview',
            addRemoveLinks: true,
            dictRemoveFile: 'Remove selection',

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
                            updateChatAfterUploadFile();
                    });
            }
    };
