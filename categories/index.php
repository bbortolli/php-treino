<?php	    
	require_once('controller.php');	    
	$categoryList = getAllCategories();
	addCategory();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<?php if ($db) : ?>

<div class="content-manage">
	<form class="add" action="index.php" method="post">
		<div class="entrydata">
			<input type="text" maxlength="32" class="input-manage" placeholder="Nome" name="category['nome']">
			<input type="text" class="input-manage" placeholder="Descricao" name="category['descricao']">
			
		</div>
		<div>
			<button type="submit" class="addBtn"><i class="fas fa-plus"></i></button>
		</div>
	</form>
</div>
<div class="separate"></div>
<div class="contador">Foram encontrados um total de <?= count($categoryList)?> registros.</div>
<div class="content-items">
<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th width="30%">Nome</th>
		<th width="50%">Descrição</th>
		<th>Opcoes</th>
	</tr>
</thead>
<tbody>	
<?php if ($categoryList) : ?>	
<?php foreach ($categoryList as $category) : ?>
	<tr>
		<td><?= $category['_id']; ?></td>
		<td><?= $category['nome']; ?></td>
		<td><?= $category['descricao']; ?></td>
		<td class="text-right">
			<i class="far fa-edit">
			<i class="far fa-trash-alt"></i>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<span>Nada foi encontrado!</span>
<?php endif; ?>
</tbody>
</table>
<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>