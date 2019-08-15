<?php	    
	require_once('controller.php');	   
    require_once('../categories/controller.php'); 
    require_once('../accounts/controller.php'); 
    $categoryList = getAllCategories();
    $accountList = getAllAccounts();
	addTransaction();
?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<?php if ($db) : ?>

<h1 class="text-center">Add Transaction</h1>
<div class="separate"></div>

<div class="content-manage">
	<form class="add" action="add.php" method="post">
		<div class="entrydata">
            <select name="transaction['acc_id']">
                <option value="" disabled selected>Conta</option>
                <?php foreach ($accountList as $acc) : ?>
					<option value="<?=$acc['_id']?>"> <?=$acc['name']?> </option>
				<?php endforeach; ?>
            </select>
			<input type="number" class="input-manage" placeholder="Preço" step="0.01" min="0.1" name="transaction['value']">
            <select name="transaction['type']" >
				<option value="in"  selected>Receita</option>
                <option value="out">Despesa</option>
            </select>
            <input type="date" name="transaction['date']" class="datein">
            <input type="text" maxlength="32" class="input-manage" placeholder="Nome" name="transaction['description']">
		</div>
		<select name="transaction['category']" >
			<option value="" disabled selected>Categoria</option>
			<?php foreach ($categoryList as $cat) : ?>
				<option value="<?=$cat['name']?>"> <?=$cat['name']?> </option>
			<?php endforeach; ?>
		</select>
		<button type="submit" class="addBtn"><i class="fas fa-plus"></i></button>
	</form>
</div>

<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>