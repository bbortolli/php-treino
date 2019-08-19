<?php	    
	require_once('controller.php');	    
	$categoryList = getAllCategories();
	addCategory();
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
			<a href="#" data-toggle="modal" data-target="#delete-modal" data-id="<?=$category['_id'] ?>" data-ident="<?= $category['name'];?>">
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