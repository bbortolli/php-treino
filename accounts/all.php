<?php	    
	require_once('controller.php');	    
	$accountList = getAllAccounts();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

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
				<a id="deleteBtn" href="#" data="<?= $acc['_id'];?>" accname="<?=$acc['name'];?>">
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