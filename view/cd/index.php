<?php
require_once ("../../controller/autoload.inc");
include "../add-on/header.php";

$db = new view\cd\model\DBCd;
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <a href="../dashboard/index.php" class="btn btn-default btn-fab btn-raised mdi-navigation-arrow-back"></a>
                                </div>
                                <div class="col-md-8">
                                    <h1 class="text-center text-capitalize">CD</h1>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:void(0)" class="btn btn-success btn-fab btn-raised mdi-content-add fn" data-title="Criando CD..." data-url="pages/add.cd.php" data-toggle="modal" data-target="#myModal"></a>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-60">
                            <div class="col-md-12">
                                <div class="list-group">
                                    <!-- inicio de modelo -->
                                    <?php foreach($db->getAll() as $k){?>
                                        <div class="list-group-item">
                                            <div class="row-action-primary">
                                                <!--a href="javascript:void(0)" class="btn btn-success btn-fab btn-raised mdi-image-camera"></a-->
                                                <img src="img/cd/<?=$k['img']?>" alt=""/>
                                            </div>
                                            <div class="row-content">
                                                <div class="least-content"><?=$k['date']?></div>
                                                <h4 class="list-group-item-heading"><?=$k['title']?> <i class="fa fa-pencil fn" data-title="Editando CD..." data-url="pages/editar.cd.php" data-id="<?=$k['id_cd']?>" data-toggle="modal" data-target="#myModal"></i> <i class="fa fa-trash-o fn" data-title="Deletando CD..." data-url="pages/delete.cd.php" data-id="<?=$k['id_cd']?>" data-toggle="modal" data-target="#myModal"></i></h4>
                                                <p class="list-group-item-text"><?=$k['descricao']?></p>
                                                <p class="text-right"><a href="controller/xml.php?id=<?=$k['id_cd']?>" class="btn btn-flat btn-success">Fazer Dowload</a></p>
                                            </div>
                                        </div>
                                        <div class="list-group-separator"></div>
                                    <?php } ?>
                                    <!-- fim de modelo -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include "../add-on/footer.php";
?>