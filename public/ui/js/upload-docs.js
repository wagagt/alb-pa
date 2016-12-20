
Dropzone.options.filesDrop = {
            uploadMultiple: true,
            maxFilezise: 1024,
            maxFiles: 5,
            autoProcessQueue: false,
            parallelUploads: 5,
            previewsContainer: '#Preview',
            addRemoveLinks: true,
            dictRemoveFile: 'Remover selección',
            thumbnailWidth:       150,
            thumbnailHeight:      150,



            init: function() {
                var submitBtn = document.querySelector("#submit");
                filesDrop = this;

                submitBtn.addEventListener('click', function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    filesDrop.processQueue();
                });
                this.on('addfile', function(file) {
                    //alert("Archivo subido");
                });

                this.on('complete', function(file) {
                    filesDrop.removeFile(file);
                });

                this.on('success', function(){
                    filesDrop.processQueue.bind(filesDrop);
                    if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                        location.reload();
                    }

                });
            }
        };
