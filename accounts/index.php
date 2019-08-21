<?php	    
	require_once('controller.php');	    
	require_once('../transactions/controller.php');	 
	$accountList = getAllAccounts();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<div class="modal fade" id="delete-acc-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este item?
      </div>
      <div class="modal-footer">
        <a id="confirmAcc" class="btn btn-primary" href="#">Sim</a>
        <a id="cancel" class="btn btn-default" data-dismiss="modal">N&atilde;o</a>
      </div>
    </div>
  </div>
</div>

<?php if ($db) : ?>
<div class="content-items">

<?php if ($accountList) : ?>	
<?php foreach ($accountList as $acc) : ?>
<?php $last = getLastTransaction($acc['_id']); list($r, $g, $b) = sscanf($acc['color'], "#%02x%02x%02x");?>
	<div class="account" style="background-color: rgba(<?= $r?>, <?= $g?>, <?= $b?>, 0.15)">
		<div class="top">
			<div>
				<i class="far fa-money-bill-alt"></i>
				<span><?= strtoupper($acc['name']) ?></span>
			</div>
			<div class="acc-opt">
				<a class="viewbtn" href="./view.php?id=<?=$acc['_id']?>">
					<i class="far fa-arrow-alt-circle-up"></i>
				</a>
				<i class="far fa-edit"></i>
				<a href="#" data-toggle="modal" data-target="#delete-acc-modal" data-id="<?=$acc['_id'] ?>" data-ident="<?= $acc['name'];?>">
					<i class="far fa-trash-alt"></i>
				</a>
			</div>
		</div>
		<div class="acc-info">
			<span style="color:<?= $acc['balance'] >= 0 ? green : red ; ?>">Saldo atual: R$ <?=number_format($acc['balance'], 2, ',', '.');?></span>
			<span>Data criação: <?=$acc['created_date'] ?></span>
			<span>Ultima transação:</span>
			<ul>
				<li><span>Data: <?=$last['date'];?></span></li>
				<li><span style="color:<?= $last['type'] == in ? green : red ; ?>">Valor: R$ <?=number_format($last['value'], 2, ',', '.');?></span></li>
			</ul>
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