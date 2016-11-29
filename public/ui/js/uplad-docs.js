Dropzone.options.myDropzone = {
    uploadMultiple: true,
    maxFilezise: 1024,
    maxFiles: 5,
    autoProcessQueue: false,
    parallelUploads: 5,
    previewsContainer: '#dropzonePreview',
    addRemoveLinks: true,
    dictRemoveFile: 'Remover selección',
    acceptedFiles: '.jpg, .jpeg, .png, .gif, .bmp, .pdf, .xlsx, .docx',



    init: function() {
        var submitBtn = document.querySelector("#submit");
        myDropzone = this;

        submitBtn.addEventListener('click', function(e){
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
        });
        this.on('addfile', function(file) {
            //alert("Archivo subido");
        });

        this.on('complete', function(file) {
            myDropzone.removeFile(file);
        });

        this.on('success', function(){
            myDropzone.processQueue.bind(myDropzone);
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                location.reload();
            }

        });
    }
};
