<?php
error_reporting(E_ALL ^ E_NOTICE); 
include '../lib/conn.php'; 

$dbh = conn();

$error_msg = 0;
$error_txt = "";
$resposta = "";


$d_prod = $_POST['d_prod'];
$p_repasse = $_POST['p_repasse'];
$p_loja = $_POST['p_loja'];
$p_sexo = $_POST['p_sexo'];
$p_idade = $_POST['p_idade'];

$p_repasse = str_replace('R$', '', $p_repasse);
$p_loja = str_replace('R$', '', $p_loja);

$p_repasse = str_replace(',', '.', $p_repasse);
$p_loja = str_replace(',', '.', $p_loja);


$id_usuario = $_POST['id_usuario'];
$ac = $_POST['ac'];
$dt_cadastro = date("Ymd");



if ($ac == 'add'){ 
	
	$URL = "cproduto.php?uid=".$id_usuario;

	$sql = "";
	$sql = $sql . " INSERT INTO produto ";
	$sql = $sql . " 	(descricao, preco_loja, preco_repasse, dt_cadastro, usuario_id_usuario, sexo, idade) ";
	$sql = $sql . " VALUES ";
	$sql = $sql . " 	(:d_prod, :p_loja, :p_repasse, :dt_cadastro, :id_usuario, :p_sexo, :p_idade) ";
	
	$stmt = $dbh->prepare($sql);
	
	$d_prod = utf8_encode($d_prod);
	
	$stmt->bindParam(':d_prod', $d_prod);
	$stmt->bindParam(':p_loja', $p_loja);
	$stmt->bindParam(':p_repasse', $p_repasse);
	$stmt->bindParam(':dt_cadastro', $dt_cadastro);
	$stmt->bindParam(':id_usuario', $id_usuario);
	$stmt->bindParam(':p_sexo', $p_sexo);
	$stmt->bindParam(':p_idade', $p_idade);	
	
	try {
		//$stmt->execute();
	}
	catch(Exception $e) {
		echo 'Exception -> ';
		var_dump($e->getMessage());
	}


	if (!$stmt->execute()){
		$error_msg = 1;
		$error_txt = $error_txt . "Erro ao cadastrar os dados pessoais.";
	}
	
	if($error_msg == 1){
		$resposta = $error_txt;
	}else{
		$resposta = "SUCESSO";
	}
	
	echo $resposta;
	
}



if ($ac == 'edit'){
	
	$id_produto = $_POST['id_produto'];
	$URL = "cproduto.php?uid=".$id_usuario."&ac=edit&pid=".$id_produto;

	$sql = "";
	$sql = $sql . " update produto set ";
	$sql = $sql . " 	descricao = :d_prod, ";
	$sql = $sql . " 	dt_cadastro = :dt_cadastro, ";
	$sql = $sql . " 	preco_loja = :p_loja, ";
	$sql = $sql . " 	preco_repasse = :p_repasse, ";
	$sql = $sql . " 	sexo = :p_sexo, ";	
	$sql = $sql . " 	idade = :p_idade ";	
	$sql = $sql . " where ";
	$sql = $sql . " 	id_produto = :id_produto  ";

	$stmt = $dbh->prepare($sql);
	
	$stmt->bindParam(':d_prod', $d_prod);
	$stmt->bindParam(':p_loja', $p_loja);
	$stmt->bindParam(':p_repasse', $p_repasse);
	$stmt->bindParam(':dt_cadastro', $dt_cadastro);
	$stmt->bindParam(':id_produto', $id_produto);
	$stmt->bindParam(':p_sexo', $p_sexo);
	$stmt->bindParam(':p_idade', $p_idade);	
	
	
	if (!$stmt->execute()){
		$error_msg = 1;
		$error_txt = $error_txt . "Erro ao cadastrar os dados pessoais.";
	}
		
	
	if($error_msg == 1){
		$resposta = $error_txt;
	}else{
		$resposta = "SUCESSO";
	}
	
	echo $resposta;

}


if ($ac == 'baixaProduto'){
	
	$id_produto = $_POST['p_id'];
	$baixa = $_POST['baixa'];
	
	if($baixa == '1'){
		$dt_baixa = date("Ymd");
		$_baixa = 1;
	}else{
		$dt_baixa = null;
		$_baixa = 0;
	}
	

	
	$sql = "";
	$sql = $sql . " update produto set ";
	$sql = $sql . " 	dt_baixa = :dt_baixa ";
	$sql = $sql . " where ";
	$sql = $sql . " 	id_produto = :id_produto  ";

	$stmt = $dbh->prepare($sql);
	
	$stmt->bindParam(':dt_baixa', $dt_baixa);
	$stmt->bindParam(':id_produto', $id_produto);

	if (!$stmt->execute()){
		$error_msg = 1;
		$error_txt = $error_txt . "Erro ao cadastrar os dados pessoais.";
	}
		
	
	if($error_msg == 1){
		$resposta = $error_txt;
	}else{
		$resposta = "SUCESSO";
	}
	
	echo $resposta.'/'.$id_produto.'/'.$_baixa;
	die();

}

if ($ac == 'repasseProduto'){
	
	$id_produto = $_POST['p_id'];
	$repasse = $_POST['repasse'];
	
	if($repasse == '1'){
		$dt_repasse = date("Ymd");
		$_repasse = 1;
	}else{
		$dt_repasse = null;
		$_repasse = 0;
	}
	

	
	$sql = "";
	$sql = $sql . " update produto set ";
	$sql = $sql . " 	dt_repasse = :dt_repasse ";
	$sql = $sql . " where ";
	$sql = $sql . " 	id_produto = :id_produto  ";

	$stmt = $dbh->prepare($sql);
	
	$stmt->bindParam(':dt_repasse', $dt_repasse);
	$stmt->bindParam(':id_produto', $id_produto);

	if (!$stmt->execute()){
		$error_msg = 1;
		$error_txt = $error_txt . "Erro ao cadastrar os dados pessoais.";
	}
		
	
	if($error_msg == 1){
		$resposta = $error_txt;
	}else{
		$resposta = "SUCESSO";
	}
	
	echo $resposta.'/'.$id_produto.'/'.$_repasse;
	die();

}



if ($ac == 'buscar'){
	
	$texto = $_POST['texto'];
	
	
	$table = "";
	$table = $table. " <table> ";
	$table = $table. " 	<thead> ";
	$table = $table. " 		<tr> ";
	$table = $table. " 			<th>C&Oacute;DIGO</th> ";
	$table = $table. " 			<th>DESCRI&Ccedil;&Atilde;O</th> ";
	$table = $table. " 			<th>TAMANHO</th> ";
	$table = $table. " 			<th>SEXO</th> ";
	$table = $table. " 			<th>PRE&Ccedil;O VENDA</th> ";
	$table = $table. " 			<th>PRE&Ccedil;O CARISMA</th> ";
	$table = $table. " 			<th>DATA DE CADASTRO</th> ";
	$table = $table. " 			<th>DATA DE VENDA</th> ";
	$table = $table. " 			<th>DATA DE REPASSE</th> ";
	$table = $table. " 			<th>BAIXA</th> ";
	$table = $table. " 			<th>REPASSE</th> ";
	$table = $table. " 			<th>FORNECEDOR</th> ";
	$table = $table. " 		</tr> ";
	$table = $table. " 	</thead> ";
	$table = $table. " <tbody> ";
	

	$sql = "";
	$sql = $sql . " select * from produto ";
	$sql = $sql . "	 where descricao like '%$texto%' ";	
		
	foreach($dbh->query($sql) as $row) {
		
		$baixa = false;
		$repasse = false;
		$_baixa = "";
		$_repasse = "";
		
		$id_produto = $row['id_produto'];
		$id_usuario = $row['usuario_id_usuario'];
		$descricao = $row['descricao'];		
		$preco_loja = $row['preco_loja'];		
		$preco_repasse = $row['preco_repasse'];		
		$sexo = $row['sexo'];
		$idade = $row['idade'];
		$dt_cadastro = $row['dt_cadastro'];		
		$dt_baixa = $row['dt_baixa'];	
		$dt_repasse = $row['dt_repasse'];	
		
		if (!$dt_baixa){
			$dt_baixa = "N/D";
			$baixa = false;
		}else{
			$dt_baixa = substr($dt_baixa, -2).'/'.substr($dt_baixa, 4, 2).'/'.substr($dt_baixa, 0, -4);
			$baixa = true;
		}
		
		if (!$dt_cadastro){
			$dt_cadastro = "N/D";
		}else{
			$dt_cadastro = substr($dt_cadastro, -2).'/'.substr($dt_cadastro, 4, 2).'/'.substr($dt_cadastro, 0, -4);
		}
		
		if (!$dt_repasse){
			$dt_repasse = "N/D";
			$repasse = false;
		}else{
			$dt_repasse = substr($dt_repasse, -2).'/'.substr($dt_repasse, 4, 2).'/'.substr($dt_repasse, 0, -4);
			$repasse = true;
		}		
		
		switch ($sexo) {
			case 0:
				$sexo = "N/D";
				break;
			case 1:
				$sexo = "NEUTRO";
				break;
			case 2:
				$sexo = "MASCULINO";
				break;
			case 3:
				$sexo = "FEMININO";
				break;						
		}				
			
		if($baixa){
			$_baixa = "checked";
		}
		
		if($repasse){
			$_repasse = "checked";
		}		

						
		$table = $table. " <tr> ";
		$table = $table. " 	<th style='cursor:pointer;' class='editProduto' id='editProduto".$id_produto."' name='editProduto".$id_usuario."'>".str_pad($id_produto, 6, '0', STR_PAD_LEFT)."</th> ";
		$table = $table. " 	<th style='width:25em;'>".$descricao."</th> ";
		$table = $table. " 	<th style='width:5em;text-align:center;'>".$idade."</th> ";
		$table = $table. " 	<th>".$sexo."</th> ";
		$table = $table. " 	<th style='width:13em;'>R$ ".$preco_loja."</th> ";
		$table = $table. " 	<th style='width:20em;'>R$ ".$preco_repasse."</th> ";
		$table = $table. " 	<th>".$dt_cadastro."</th> ";
		$table = $table. " 	<th id='dtbaixa".$id_produto."'>".$dt_baixa."</th> ";
		$table = $table. " 	<th id='dtrepasse".$id_produto."'>".$dt_repasse."</th> ";
		$table = $table. " 	<th><input type='checkbox' id='baixa".$id_produto."' ". $_baixa ." class='baixaProduto'/></th> ";
		$table = $table. " 	<th><input type='checkbox' id='repasse".$id_produto."' ". $_repasse ." class='repasseProduto'/></th> ";
		$table = $table. " 	<th><a href='produto.php?uid=$id_usuario' target='_self'>Fornecedor</a></th> ";		
		$table = $table. " </tr> ";
		
		
	}

    $table = $table. " 		</tbody> ";
    $table = $table. " </table> ";
	
	
	echo $table;

}

if($resposta == "SUCESSO"){
	header('Location: '.$URL);
}






















