<?php 
	require_once 'config.php';
	require_once DBAPI; 
	require_once './accounts/controller.php';
	//require_once './cards/controller.php';
	require_once './categories/controller.php';
	$categorylist = getAllCategories();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<?php if ($db) : ?>

<div class="main">
	<div class="side">
		<div class="dash-number">
			<span class="number-data">aaaaaaaaaaa</span>
			<span class="number-data">CLIENTES</span>
		</div>
		<div class="dash-number">
			<span class="number-data">bbbbbbbbb</span>
			<span class="number-data">PRODUTOS</span>
		</div>
		<div class="dash-number">
			<span class="number-data">ccccccccc</span>
			<span class="number-data">CATEGORIAS</span>
		</div>
	</div>
	<div class="center">
		<span>oi</span>
	</div>
</div>
<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>