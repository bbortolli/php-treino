<?php	    
	require_once('controller.php');	    
	$categoryList = getAllCategories();
	addCategory();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<?php if ($db) : ?>

<div class="content-manage">
	<form class="add-cat" action="index.php" method="post">
		<div class="entrydata">
			<input type="text" maxlength="32" class="name-cat" placeholder="Nome" name="category['name']">
		</div>
		<div>
			<button type="submit" class="addBtn"><i class="fas fa-plus"></i></button>
		</div>
	</form>
</div>
<div class="separate"></div>
<h1 class="text-center">Categories</h1>
<div class="contador">Found <?= count($categoryList)?> entries...</div>
<div class="content-items">
<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th width="60%">Nome</th>
		<th>Opcoes</th>
	</tr>
</thead>
<tbody>	
<?php if ($categoryList) : ?>	
<?php foreach ($categoryList as $category) : ?>
	<tr>
		<td><?= $category['_id']; ?></td>
		<td><?= $category['name']; ?></td>
		<td class="text-right">
			<i class="far fa-edit">
			<a id="deleteBtn" href="#" data="<?= $category['_id'];?>" ident="<?= $category['name'];?>">
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