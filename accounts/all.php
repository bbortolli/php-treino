<?php	    
	require_once('controller.php');	    
	$accountList = getAllAccounts();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este item?
      </div>
      <div class="modal-footer">
        <a id="confirm" class="btn btn-primary" href="#">Sim</a>
        <a id="cancel" class="btn btn-default" data-dismiss="modal">N&atilde;o</a>
      </div>
    </div>
  </div>
</div>

<?php if ($db) : ?>

<h1 class="text-center">Accounts</h1>
<div class="separate"></div>
<div class="content-items">

<?php if ($accountList) : ?>	
<?php foreach ($accountList as $acc) : ?>
	<div class="account" style="background-image: linear-gradient(to bottom right, white, white, <?=$acc['color'] ?>);">
		<div class="top">
			<div>
				<i class="far fa-money-bill-alt"></i>
				<span><?=$acc['name'] ?></span>
			</div>
			<div class="acc-opt">
				<i class="far fa-edit"></i>
				<a href="#" data-toggle="modal" data-target="#delete-modal" data-id="<?=$acc['_id'] ?>" data-ident="<?= $acc['name'];?>">
					<i class="far fa-trash-alt"></i>
				</a>
			</div>
		</div>
		<div>
			<span>Saldo atual: <?=$acc['balance'] ?></span>
		</div>
	</div>
<?php endforeach; ?>
<?php endif; ?>
<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>