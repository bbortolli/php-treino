<?php	    
	require_once('controller.php');
	$account = getAccount();
	if (!$account) {
		header('location: /accounts/index.php');
	}
	require_once('../transactions/controller.php');
	require_once('../categories/controller.php'); 
	$transactionList = getAccTransactions();
	$categoryList = getAllCategories();
	$sumcategoryRec = getInByCat();
	$sumcategoryDes = getOutByCat();
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
        <a id="confirmDelTrans" class="btn btn-primary" href="#">Sim</a>
        <a id="cancel" class="btn btn-default" data-dismiss="modal">N&atilde;o</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modalLabel">Adicionar transação</h4>
      </div>
      <div class="modal-body">
		<form class="add" action="../transactions/add.php" method="post">
			<div class="entrydata">
				<select name="acc_id">
						<option selected value="<?=$account['_id']?>"> <?=$account['name']?> </option>
				</select>
				<input type="number" class="input-manage" placeholder="Preço" step="0.01" min="0.1" name="value">
				<select name="type">
					<option value="in" selected>Receita</option>
					<option value="out">Despesa</option>
				</select>
				<input type="date" name="date" class="datein">
				<input type="text" maxlength="32" class="input-manage" placeholder="Nome" name="description">
				<select name="category" >
					<option class="select-cat" value="Nenhuma" selected>Categoria</option>
					<?php foreach ($categoryList as $cat) : ?>
						<option class="select-cat" value="<?=$cat['name']?>"><?=$cat['name']?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <a id="confirmAddTrans" class="btn btn-primary tadd" href="#">Confirmar</a>
        <a id="cancel" class="btn btn-default" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>

<?php if ($db) : ?>
<h1 class="text-center"><?=$account['name']?></h1>
<div class="separate"></div>
<div class="add-cat-btn">
	<a href="#" data-toggle="modal" data-target="#add-modal">New</a>
</div>

<div class="content-items">
	<div class="leftgrid">
		<?php if ($transactionList) : ?>	
		<table class="table">
			<tr>
				<th>Value</th>
				<th>Date</th>
				<th>Category</th>
				<th>Description</th>
				<th>Options</th>
			</tr>
		<?php foreach ($transactionList as $t) : ?>
			<?php if ($t['type'] === 'in') : ?>	
				<?php $moneyFormat = number_format($t['value'], 2, '.', ','); ?>
				<tr class="<?=$t['type'];?>">
					<td class="inAux"><?=$moneyFormat?></td>
					<td><?= $t['date']; ?></td>
					<td><?= $t['category']; ?></td>
					<td><?= $t['description']; ?></td>
					<td class="text-right">
						<i class="far fa-edit">
						<a href="#" data-toggle="modal" data-target="#delete-modal" data-id="<?=$t['_id']?>" data-ident="<?=$moneyFormat;?>">
							<i class="far fa-trash-alt"></i>
						</a>
					</td>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php endif; ?>
		</table>
	</div>
	<div class="rightgrid">
		<?php if ($transactionList) : ?>	
		<table class="table">
			<tr>
				<th>Value</th>
				<th>Date</th>
				<th>Category</th>
				<th>Description</th>
				<th>Options</th>
			</tr>
		<?php foreach ($transactionList as $t) : ?>
			<?php if ($t['type'] === 'out') : ?>	
				<?php $moneyFormat = number_format($t['value'], 2, '.', ','); ?>
				<tr class="<?=$t['type'];?>">
					<td class="outAux"><?=$moneyFormat?></td>
					<td><?= $t['date']; ?></td>
					<td><?= $t['category']; ?></td>
					<td><?= $t['description']; ?></td>
					<td class="text-right">
						<i class="far fa-edit">
						<a href="#" data-toggle="modal" data-target="#delete-modal" data-id="<?=$t['_id'] ?>" data-ident="<?= $moneyFormat;?>">
							<i class="far fa-trash-alt"></i>
						</a>
					</td>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php endif; ?>
		</table>
	</div>
	<div class="botleft">
		<div class="amounts">
			<span class="rec">RECEITAS</span>
			<span class="rec totalr"></span>
			<div id="chartContainerRec" style="height: 280px; width: 100%;"></div>
		</div>
	</div>
	<div class="botright">
		<div class="amounts">
			<span class="des">DESPESAS</span>
			<span class="des totald"></span>
			<div id="chartContainerDes" style="height: 280px; width: 100%;"></div>
		</div>
	</div>
</div>

<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<script>
window.onload = function () {

var recData = <?=json_encode($sumcategoryRec)?>;
var desData = <?=json_encode($sumcategoryDes)?>;

var optionsRec = {
	animationEnabled: true,
	data: [{
		type: "doughnut",
		innerRadius: "40%",
		dataPoints: recData
	}]
};

var optionsDes = {
	animationEnabled: true,
	data: [{
		type: "doughnut",
		innerRadius: "40%",
		dataPoints: desData
	}]
};

$("#chartContainerRec").CanvasJSChart(optionsRec);
$("#chartContainerDes").CanvasJSChart(optionsDes);
}
</script>

<?php include(FOOTER_TEMPLATE); ?>