<?php

error_reporting(E_ALL ^ E_NOTICE);
include '../lib/conn.php'; 

$dbh = conn();
$valor_compra = $_POST['v_compra'];
$valor_total = $_POST['p_total2'];
$desconto = $_POST['desconto'];
$tp_pagamento = $_POST['tp_pagamento'];
$parcelas = $_POST['parcelas']; 

$id_produtos = $_POST['idProduto'];

$dt_venda = date("Ymd"); 

$sql = "";
$sql = $sql . " INSERT INTO venda ";
$sql = $sql . " 	(valor, desconto, valor_total, dt_venda, tp_pagamento, parcelas) ";
$sql = $sql . " VALUES ";
$sql = $sql . " 	(:valor_compra, :desconto, :valor_total, :dt_venda, :tp_pagamento, :parcelas) ";

$stmt = $dbh->prepare($sql);

$stmt->bindParam(':valor_compra', $valor_compra);
$stmt->bindParam(':desconto', $desconto);
$stmt->bindParam(':valor_total', $valor_total);
$stmt->bindParam(':dt_venda', $dt_venda);
$stmt->bindParam(':tp_pagamento', $tp_pagamento);
$stmt->bindParam(':parcelas', $parcelas);


if (!$stmt->execute()){
	$error_msg = 1;
	$error_txt = $error_txt . "Erro ao cadastrar os dados da venda.";
}

$venda_id = $dbh->lastInsertId();


$sql = "";
$sql = $sql . " INSERT INTO item_venda ";
$sql = $sql . " 	(produto_id_produto, venda_id_venda) ";
$sql = $sql . " VALUES ";
$sql = $sql . " 	(:produto_id_produto, :venda_id_venda) ";

$stmt = $dbh->prepare($sql);

for($i=0;$i<count($id_produtos);$i++){
	
	$stmt->bindParam(':produto_id_produto', $id_produtos[$i]);
	$stmt->bindParam(':venda_id_venda', $venda_id);
	
	$stmt->execute();
	
}

$sql = "";
$sql = $sql . " update produto set ";
$sql = $sql . " 	dt_baixa = :dt_baixa ";
$sql = $sql . " where ";
$sql = $sql . " 	id_produto = :id_produto  ";

$stmt = $dbh->prepare($sql);

for($i=0;$i<count($id_produtos);$i++){
	
	$stmt->bindParam(':id_produto', $id_produtos[$i]);
	$stmt->bindParam(':dt_baixa', $dt_venda);
	
	$stmt->execute();
	
}

$sql = "";
$sql = $sql . " INSERT INTO pagamento ";
$sql = $sql . " 	(parcela, dt_vencimento, venda_id_venda, valor_parcela) ";
$sql = $sql . " VALUES ";
$sql = $sql . " 	(:parcela, :dt_vencimento, :venda_id_venda, :valor_parcela) ";

$stmt = $dbh->prepare($sql);

$dt_vencimento = date('Ymd');


$stmt->bindParam(':parcela', $parcelas);
$stmt->bindParam(':dt_vencimento', $dt_vencimento);
$stmt->bindParam(':venda_id_venda', $venda_id);
$stmt->bindParam(':valor_parcela', $valor_compra);

$stmt->execute();

/*$valor_parcela = round($valor_compra/$parcelas, 2);


for($i=1;$i<=$parcelas;$i++){
	
	$dt_vencimento = date('Ymd');
	
	$dt_vencimento = date('Ymd', strtotime("+$i months", strtotime($dt_vencimento)));
	
	

	$stmt->bindParam(':parcela', $i);
	$stmt->bindParam(':dt_vencimento', $dt_vencimento);
	$stmt->bindParam(':venda_id_venda', $venda_id);
	$stmt->bindParam(':valor_parcela', $valor_parcela);
	
	$stmt->execute();
	
}*/

$URL = "cvenda.php?vid=".$venda_id;

header('Location: '.$URL);
