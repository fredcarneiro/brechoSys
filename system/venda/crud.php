<?php
error_reporting(E_ALL ^ E_NOTICE); 
include '../lib/conn.php'; 

$dbh = conn();

$error_msg = 0;
$error_txt = "";
$resposta = "";


$ac = $_POST['ac'];
$dt_cadastro = date("Ymd");


if ($ac == 'buscar'){
	
	$ano = $_POST['ano'];
	$mes = $_POST['mes'];
	
	
	$table = "";
	$table = $table. " <table> ";
	$table = $table. " 	<thead> ";
	$table = $table. " 		<tr> ";
	$table = $table. " 			<th>C&Oacute;DIGO</th> ";
	$table = $table. " 			<th>PRODUTOS</th> ";
	$table = $table. " 			<th>DATA DA VENDA</th> ";
	$table = $table. " 			<th>VALOR TOTAL</th> ";
	$table = $table. " 			<th>DESCONTO</th> ";
	$table = $table. " 			<th>VALOR DA COMPRA</th> ";
	$table = $table. " 			<th>TIPO DE PAGAMENTO</th> ";
	$table = $table. " 			<th>PARCELAS</th> ";
	$table = $table. " 			<th>PAGAMENTO</th> ";
	$table = $table. " 		</tr> ";
	$table = $table. " 	</thead> ";
	$table = $table. " <tbody> ";
	 
 
	$sql = "";
	$sql = $sql . " select * from venda ";
	$sql = $sql . "	 where substring(dt_venda,1,4) = '$ano' and substring(dt_venda,5,2) = '$mes' ";	
		
	foreach($dbh->query($sql) as $row) {
		
		$dt_venda = $row['dt_venda'];
		
		$id_venda = $row['id_venda'];
		$dt_venda = substr($dt_venda, -2).'/'.substr($dt_venda, 4, 2).'/'.substr($dt_venda, 0, -4);
		$valor_total = $row['valor_total'];
		$desconto = $row['desconto'];		
		$valor_venda = $row['valor'];		
		$tp_pagamento = $row['tp_pagamento'];		
		$parcelas = $row['parcelas'];
	
		
		switch ($tp_pagamento) {
			case 0:
				$tp_pagamento = "N/D";
				break;
			case 1:
				$tp_pagamento = "DINHEIRO";
				break;
			case 2:
				$tp_pagamento = "CR&Eacute;DITO";
				break;
			case 3:
				$tp_pagamento = "D&Eacute;BITO";
				break;						
		}				

						
		$table = $table. " <tr> ";
		$table = $table. " 	<th><a href='cvenda.php?vid=$id_venda' target='_self'>".str_pad($id_venda, 6, '0', STR_PAD_LEFT)."</a></th> ";
		
		$table = $table. "	<th>";
		
		$sql = "";
		$sql = $sql . " select * from item_venda ";
		$sql = $sql . "	 where venda_id_venda = $id_venda ";
		
		foreach($dbh->query($sql) as $row) {
			
			$id_produto = $row['produto_id_produto'];
			
			$sql = "";
			$sql = $sql . " select * from produto ";
			$sql = $sql . "	 where id_produto = $id_produto ";	
			
			foreach($dbh->query($sql) as $row) {
				$table = $table . " * <span style='border-bottom:1px solid #000;'>" . utf8_decode($row['descricao']) ."</span><br /><br />";
			}
		
		}

		$table = $table. "	</th>";

		$table = $table. " 	<th style='width:5em;text-align:center;'>".$dt_venda."</th> ";
		$table = $table. " 	<th>R$ ".$valor_total."</th> ";
		$table = $table. " 	<th > ".$desconto."% </th> ";
		$table = $table. " 	<th >R$ ".$valor_venda."</th> ";
		$table = $table. " 	<th>".$tp_pagamento."</th> ";
		$table = $table. " 	<th>".$parcelas."</th> ";
		$table = $table. " 	<th ><a href='cvenda.php?vid=$id_venda' target='_self'>Ver Pagamentos</a></th> ";
		$table = $table. " </tr> ";
		
		
	}

    $table = $table. " 		</tbody> ";
    $table = $table. " </table> ";
	
	
	echo $table;

}

if($resposta == "SUCESSO"){
	header('Location: '.$URL);
}






















