<!doctype html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <title>Gravadora web</title>

    <link rel="stylesheet" href="../includes/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../includes/css/roboto.min.css"/>
    <link rel="stylesheet" href="../includes/css/material-fullpalette.min.css"/>
    <link rel="stylesheet" href="../includes/css/material.min.css"/>
    <link rel="stylesheet" href="../includes/css/ripples.min.css"/>
    <link rel="stylesheet" href="../includes/css/style.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <script src="../includes/js/jquery-1.11.3.min.js"></script>
</head>
<body>
<!-- div de notificações -->
<div class="alert alert-success alert-dismissable notification">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    <strong></strong>
</div>
<!-- /div de notificações -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <img src="img/logo.png" alt="" width="200"/>
                        </div>
                        <div class="col-md-6">
                            <form id="loginForm" class="urlForm" data-url="controller/login.php">
                                <div class="row">
                                    <h3>Login</h3>
                                    <input type="text" class="form-control" name="name" placeholder="Login"/>
                                    <input type="password" class="form-control"  name="pass" placeholder="senha"/>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-success btn-raised">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#loginForm").on("submit",function(){
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
                    if(e === "false"){
                        notification.error('Senha ou senha invalidos');
                    }else{
                        window.location.href = e;
                    }
                },
                error: function(e){
                    notification.error("Error ao se conectar com o servidor");
                }
            });
        });
    </script>
<?php
include "../add-on/footer.php";
?>