<?php include('inc/conecta.php'); ?>

<div class="modal fade" id="confirm" role="dialog">
  <div class="modal-dialog modal-md">

    <div class="modal-content">
      <div class="modal-body">
            <p> QUER REALMENTE FAZER ISSO?? NÂO POR FAVOR, EU TENHO FILHOS </p>
            <?php echo $obj->cd_compromisso; ?>
      </div>
      <div class="modal-footer">
        <a href="delete.php?codigo=<?php echo $_GET['codigo']?> " type="button" class="btn btn-danger" id="delete">Apagar Registo</a>
            <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
      </div>
    </div>

  </div>
</div>