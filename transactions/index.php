<?php	    
	require_once('controller.php');	   
	require_once('../accounts/controller.php');
	$transactionList = getAllTransactions();

	//addProduct();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<?php if ($db) : ?>
<div class="delete-warn">
	<div class="content-warn">
		<p class="warndata"></p>
		<p class="warnvalue"></p>
		<p class="warndesc"></p>
		<div class="btns">
			<button class="confirmBtn">CONFIRM</button>
			<button class="cancelBtn">CANCEL</button>
		</div>
	</div>
</div>
<h1 class="text-center">Transactions</h1>
<div class="separate"></div>
<div class="add-cat-btn">
	<a href="/transactions/add.php">New</a>
</div>
<div class="content-items">
<table class="table table-hover">
<thead>
	<tr>
		<th>Account</th>
		<th>Value</th>
		<th>Date</th>
		<th>Type</th>
		<th>Category</th>
		<th>Description</th>
		<th>Options</th>
	</tr>
</thead>
<tbody>	
<?php if ($transactionList) : ?>	
<?php foreach ($transactionList as $t) : ?>
	<tr class="<?= $t['type']; ?>">
		<td><?= $t['acc_id']; ?></td>
		<td><?= $t['value']; ?></td>
		<td><?= $t['date']; ?></td>
		<td><?= $t['type']; ?></td>
		<td><?= $t['category']; ?></td>
		<td><?= $t['description']; ?></td>
		<td class="text-right">
			<i class="far fa-edit">
			<a id="deleteBtn" href="#" idesc="<?= $t['description'];?>" idata="<?= $t['date'];?>" ival="<?= $t['value'];?>">
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