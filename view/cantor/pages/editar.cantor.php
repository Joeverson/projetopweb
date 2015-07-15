<?php
require_once ("../../../controller/autoload.inc");

$db = new view\cantor\model\DBCantor;
$user = $db->selectCdById($_POST['id'])[0];
?>
<div class="row">
    <form id="editCD">
        <div class="col-md-12 urlForm" data-url="controller/cantor.update.php">
            <fieldset>
                <div class="row">
                    <div class="">
                        <label for="inputEmail" class="col-lg-2 control-label">Nome do Cantor</label>
                        <div class="col-lg-10">
                            <input type="text" name='name' class="form-control" value="<?=$user['name']?>"  id="inputEmail" placeholder="Nome do Cantor">
                        </div>
                    </div>
                </div>
            </fieldset>
            <input type="hidden" name="id_user" value="<?=$user['id_cantor']?>"/>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </form>
</div>
<script>
    $(function(){
        $(".btn-img").on("click", function(){
            $("#inputFile").trigger("click").imgShow();
        });
        $("#editCD").on("submit",function(){
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
    });
</script>