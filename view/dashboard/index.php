<?php
include "../add-on/header.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">
                                    Gravadora de CD's
                                </a>
                            </div>
                            <div class="navbar-collapse collapse navbar-inverse-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="../cd/index.php">CD</a></li>
                                    <li><a href="../cantor/index.php">Cantor</a></li>
                                    <li><a href="../user/index.php">User</a></li>
                                    <li><a href="../login/logout.php">sair</a></li>
                                </ul>
                                <form class="navbar-form navbar-right">
                                    <input type="text" class="form-control col-lg-8 find" name="find" placeholder="Buscar">
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 results">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $(".find").on("keyup", function(){
                var data =  $(this).val();
                $.ajax({
                    url: "controller/find.php",
                    type: 'post',
                    data:  'find='+data,
                    datatype: 'html',
                    beforeSend: function(){
                        notification.loading('Buscando...');
                    },
                    success: function(e){
                        console.log(e);
                        var json = $.parseJSON(e);
                        var txt = "";

                        if(typeof json == "string"){
                            $('.results').html('<a href="#" class="list-group-item"><p class="list-group-item-text">'+ json +'</p></a>');
                        }else{
                            $.each(json, function( k, v ){
                                txt += '<a href="javascript:void(0)" class="list-group-item curso-matricula"><div class="row"><div class="col-md-8"><p class="list-group-item-text">Cantor: '+ v.name +'</p><blockquote>'+v.title+'<small>'+v.descricao+' - <cite title="Source Title">'+ v.date+'</cite></small></blockquote></div><div class="col-md-4 color-green text-center xmlBaixar"></div></div></a>';

                                $('.results').html(txt);
                            });
                        }
                    },
                    error: function(e){
                        notification.error("Error ao comunicar com o servidor");
                    }
                });
            });
        });
    </script>
<?php
include "../add-on/footer.php";
?>