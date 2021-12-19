

    document.addEventListener('DOMContentLoaded',function(){
        if (document.querySelectorAll('#drophere').length>0){
            console.log('ciao a tutti');
            let csrfToken= $('meta[name="csrf-token"]').attr('content');
            let unique_secret= $('input[name="unique_secret"]').attr('value');
    
            let myDropzone= new Dropzone('#drophere', {
                url: '/adv/images/upload',
    
                params: {
                    _token: csrfToken,
                    unique_secret: unique_secret
                },

                addRemoveLinks: true,

                init: function(){
                    $.ajax({
                        type: 'GET',
                        url: '/adv/images',
                        data: {
                            unique_secret: unique_secret
                        },
                        dataType: 'json'
                    }).done(function(data){
                        $.each(data, function(key, value){
                            let file= {
                                serverId: value.id
                            };

                            myDropzone.options.addedfile.call(myDropzone, file);
                            myDropzone.options.thumbnail.call(myDropzone, file, value.src);
                        });
                    });
                }
            });

                myDropzone.on("success", function(file, response){
                    file.serverId= response.id;
                });

                myDropzone.on("removedfile", function(file){
                    $.ajax({
                       type: 'DELETE',
                       url: '/adv/images/remove',
                       data: {
                           _token: csrfToken,
                           id: file.serverId,
                           unique_secret: unique_secret
                       },
                       dataType: 'json'
                    });
                });
        }
    })
