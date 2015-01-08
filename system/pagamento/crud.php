<?php
error_reporting(E_ALL ^ E_NOTICE); 
include '../lib/conn.php'; 

$dbh = conn();

$error_msg = 0;
$error_txt = "";
$resposta = "";


$ac = $_POST['ac'];
$dt_cadastro = date("Ymd");


if ($ac == 'a_receber'){
	
	$ano = $_POST['ano'];
	$mes = $_POST['mes'];
	
	$table = "";
	$table = $table. "<center> <table align='center'> ";
	$table = $table. " 	<thead> ";
	$table = $table. " 		<tr> ";
	$table = $table. " 			<th>C&Oacute;DIGO DA VENDA</th> ";
	$table = $table. " 			<th>VALOR DA PARCELA</th> ";
	$table = $table. " 			<th>DATA DE VENCIMENTO</th> ";
	$table = $table. " 			<th>BAIXA</th> ";	
	$table = $table. " 		</tr> ";
	$table = $table. " 	</thead> ";
	$table = $table. " <tbody> ";
	 
  
	$sql = "";
	$sql = $sql . " select * from pagamento ";
	$sql = $sql . "	 where substring(dt_vencimento,1,4) = '$ano' and substring(dt_vencimento,5,2) = '$mes' and (dt_baixa is null or dt_baixa = '') ";	
	$sql = $sql . "	order by venda_id_venda, dt_vencimento ";
	
	//echo $sql;
	
	$total = 0; 
	
	foreach($dbh->query($sql) as $row) {
		
		$dt_parcela = $row['dt_vencimento'];
		
		$id_venda = $row['venda_id_venda'];
		$id_parcela = $row['id_pagamento'];
		$dt_parcela = substr($dt_parcela, -2).'/'.substr($dt_parcela, 4, 2).'/'.substr($dt_parcela, 0, -4);
		$valor_parcela = $row['valor_parcela'];
		$parcela = $row['parcela'];	
		
		$dt_baixa = $row['dt_baixa'];
		
		$total = $total + $valor_parcela;
		
		if (!$dt_baixa){
			$_baixaParcela = "";
		}else{
			$_baixaParcela = "checked";
		}		

						
		$table = $table. " <tr> ";
		$table = $table. " 	<th><a href='../venda/cvenda.php?vid=$id_venda' target='_self'>".str_pad($id_venda, 6, '0', STR_PAD_LEFT)."</a></th> ";
		$table = $table. " 	<th>R$ ".$valor_parcela."</th> ";
		$table = $table. " 	<th > ".$dt_parcela." </th> ";
		$table = $table. " 	<th><input type='checkbox' id='baixa".$id_parcela."' ". $_baixaParcela ." class='baixaParcela'/></th> ";		
		$table = $table. " </tr> ";
		
		
	}
	$table = $table. " <tr> ";
	$table = $table. " 	<th colspan='4' style='text-align:right;'><b>Total:</b> R$ ".$total."</th> ";
	$table = $table. " </tr> ";

    $table = $table. " 		</tbody> ";
    $table = $table. " </table> </center>";
	
	
	echo $table;

}

if ($ac == 'baixaParcela'){
	
	$id_parcela = $_POST['p_id'];
	$baixa = $_POST['baixa'];
	
	if($baixa == '1'){
		$dt_baixa = date("Ymd");
		$_baixa = 1;
	}else{
		$dt_baixa = '';
		$_baixa = 0;
	}
	
	//echo $dt_baixa . $id_parcela;
	
	$sql = "";
	$sql = $sql . " update pagamento set ";
	$sql = $sql . " 	dt_baixa = :dt_baixa ";
	$sql = $sql . " where ";
	$sql = $sql . " 	id_pagamento = :id_parcela  ";

	$stmt = $dbh->prepare($sql);
	
	$stmt->bindParam(':dt_baixa', $dt_baixa);
	$stmt->bindParam(':id_parcela', $id_parcela);

	if (!$stmt->execute()){
		$error_msg = 1;
		$error_txt = $error_txt . "Erro ao cadastrar os dados pessoais.";
	}
		
	
	if($error_msg == 1){
		$resposta = $error_txt;
	}else{
		$resposta = "SUCESSO";
	}
	
	echo $resposta.'/'.$id_parcela.'/'.$_baixa;
	die();

}

if($resposta == "SUCESSO"){
	header('Location: '.$URL);
}






















