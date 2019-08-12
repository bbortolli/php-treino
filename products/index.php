<?php	    
	require_once('controller.php');	   
	require_once('../categories/controller.php'); 
	$productlist = getAllProducts();
	$categorylist = getAllCategories();
	addProduct();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<?php if ($db) : ?>

<div class="content-manage">
	<form class="add" action="index.php" method="post">
		<div class="entrydata">
			<input type="text" maxlength="32" class="input-manage" placeholder="Nome" name="product['nome']">
			<input type="number" class="input-manage" placeholder="Preço" step="0.01" min="0.1" name="product['preco']">
		</div>
		<div>
			<select class="category" name="product['categoria']" >
				<option value="" disabled selected>Selecione</option>
				<?php foreach ($categorylist as $cat) : ?>
					<option value="<?=$cat['nome']?>"> <?=$cat['nome']?> </option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="add">
			<button type="submit" class="addBtn"><i class="fas fa-plus"></i></button>
		</div>
	</form>
</div>
<div class="separate"></div>
<h1 class="text-center">PRODUCTS</h1>
<div class="contador">Foram encontrados um total de <?= count($productlist)?> registros.</div>
<div class="content-items">
<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th width="60%">Nome</th>
		<th>Preco</th>
		<th width="20%">Categoria</th>
		<th>Opcoes</th>
	</tr>
</thead>
<tbody>	
<?php if ($productlist) : ?>	
<?php foreach ($productlist as $product) : ?>
	<tr>
		<td class="_id"><?= $product['_id']; ?></td>
		<td><?= $product['nome']; ?></td>
		<td><?= $product['preco']; ?></td>
		<td><?= $product['categoria']; ?></td>
		<td class="text-right">
			<i class="far fa-edit">
			<a id="deleteBtn" href="#" data="<?= $product['_id'];?>">
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