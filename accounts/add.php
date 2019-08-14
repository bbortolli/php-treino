<?php	    
	require_once('controller.php');
	addAccount();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<?php if ($db) : ?>

<h1 class="text-center">Add Account</h1>
<div class="separate"></div>

<div class="content-manage">
	<form class="add" action="add.php" method="post">
		<div class="entrydata">
            <input type="text" class="input-manage" placeholder="Nome da conta" name="account['name']">
            <input type="number" maxlength="32" class="input-manage" placeholder="Saldo inicial" name="account['balance']">
            <input type="text" maxlength="32" class="input-manage" placeholder="Descricao" name="account['description']">
		</div>
		<div class="add">
			<button type="submit" class="addBtn"><i class="fas fa-plus"></i></button>
		</div>
	</form>
</div>

<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>