<?php
require_once ("../../../controller/autoload.inc");

$db = new view\cd\model\DBCd;
$user = $db->selectCdById($_POST['id'])[0];
$db = new view\cantor\model\DBCantor;
?>
<div class="row">
    <form id="editCD">
        <div class="col-md-12 urlForm" data-url="controller/cd.update.php">
            <fieldset>
                <div class="row">
                    <div class="">
                        <label for="inputEmail" class="col-lg-2 control-label">Titulo do CD</label>
                        <div class="col-lg-10">
                            <input type="text" name='title' class="form-control" value="<?=$user['title']?>"  id="inputEmail" placeholder="Titulo do cd">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="">
                        <label for="inputData" class="col-lg-2 control-label">Data do CD</label>
                        <div class="col-lg-10">
                            <input type="date" name="date" class="form-control" id="inputData" value="<?=$user['date']?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="textArea" class="col-lg-2 control-label">Descrição</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" name="descricao" rows="3" id="textArea"><?=$user['title']?></textarea>
                        <span class="help-block">Breve descrição sobre o cd </span>
                    </div>
                </div>
                <div class="row">
                    <label for="select" class="col-lg-2 control-label">Cantor</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="id_cantor" id="select">
                            <?php foreach($db->getAll() as $k){?>
                                <option value="<?=$k['id_cantor']?>"><?= $k['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="">
                        <label for="inputFile" class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <input type="file" name="img" id="inputFile" style="display: none">
                            <div class="col-sm-12 col-md-12">
                                <div class="thumbnail">
                                    <img class="img-rounded img-size-200 imagem-show" src="img/cd/<?=$user['img']?>">
                                    <div class="caption text-center">
                                        <p><a href="#" class="btn btn-warning btn-img" role="button">Buscar Foto</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <input type="hidden" name="id_user" value="<?=$user['id_cd']?>"/>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar CD</button>
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