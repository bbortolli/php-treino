<?php	    
	require_once('controller.php');	    
	$accountList = getAllAccounts();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<?php if ($db) : ?>

<h1 class="text-center">Accounts</h1>
<div class="separate"></div>
<div class="contador">Found <?= count($accountList)?> entries...</div>
<div class="content-items">
<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th>Nome</th>
		<th>Saldo</th>
		<th>Descricao</th>
		<th>Opcoes</th>
	</tr>
</thead>
<tbody>	
<?php if ($accountList) : ?>	
<?php foreach ($accountList as $acc) : ?>
	<tr>
		<td><?= $acc['_id']; ?></td>
		<td><?= $acc['name']; ?></td>
		<td><?= $acc['balance']; ?></td>
		<td><?= $acc['description']; ?></td>
		<td class="text-right">
			<i class="far fa-edit">
			<a id="deleteBtn" href="#" data="<?= $client['_id'];?>">
				<i class="far fa-trash-alt"></i>
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php endif; ?>
</tbody>
</table>
<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>