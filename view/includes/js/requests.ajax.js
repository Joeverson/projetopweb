$(function(){


    //formulario de edição de usuario
    $("#formEditUser").on("submit",function(){
        event.preventDefault();
        var url = $(".urlForm").data('url');
        var redirect = $(".urlForm").data('redirect');
        console.log(url);
        $.ajax({
            url: url,
            type: 'post',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            datatype: 'html',
            beforeSend: function(){
                notification.loading("Trabalhando...");
            },
            success: function(e){
                console.log(e);
                notification.ok("Salvo com sucesso!!");
                if(redirect == undefined){
                    window.location.reload();
                }else{
                    window.location.href = redirect;
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    });

    //pedidos de modal generico - carregar conteudo no modal

    $(".fn").on("click", function(){
        var url = $(this).data('url');
        var title = $(this).data('title');
        var id = $(this).data('id');


        $.ajax({
            url: url,
            type: 'post',
            data: "id="+id,
            datatype: 'html',
            beforeSend: function(){
                //$('.progress-bar').show();
            },
            complete: function() {
                //$('.progress-bar').fadeOut();
            },
            success: function(e){
                $('.modal-title').html(title);
                $('.modal-body').html(e);
                $('#modalUses').modal('show');
            }
        });
    });

});