<?php	    
	require_once('controller.php');	   
	//require_once('../categories/controller.php'); 
	$transactionList = getAllTransactions();
	//$categorylist = getAllCategories();
	//addProduct();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<?php if ($db) : ?>

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
<?php foreach ($transactionList as $transaction) : ?>
	<tr>
		<td><?= $transaction['acc_id']; ?></td>
		<td><?= $transaction['value']; ?></td>
		<td><?= $transaction['date']; ?></td>
		<td><?= $transaction['type']; ?></td>
		<td><?= $transaction['category']; ?></td>
		<td><?= $transaction['description']; ?></td>
		<td class="text-right">
			<i class="far fa-edit">
			<a id="deleteBtn" href="#" data="<?= $transaction['_id'];?>">
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