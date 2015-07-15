<div class="row urlForm" data-url="controller/delete.user.php">
    <div class="col-md-12">
        <p>Deseja deletar o usuário?</p>
        <input type="hidden" name="id_user" value="<?=$_POST['id']?>"/>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
    <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Deletar</button>
</div>