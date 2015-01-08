<?php
error_reporting(E_ALL ^ E_NOTICE); 
include '../lib/conn.php'; 

$dbh = conn();

$error_msg = 0;
$error_txt = "";
$resposta = "";


$nm_usuario = $_POST['nm_usuario'];
$dt_nasc = $_POST['dt_nasc'];
$email = $_POST['email'];

$id_usuario = $_POST['id_usuario'];
$ac = $_POST['ac'];

$dt_nascS = explode("-", $dt_nasc);
$dt_nasc = $dt_nascS[0].$dt_nascS[1].$dt_nascS[2];

$dt_cadastro = date("Ymd");

$tp_end = array();
$end = array();
$num_end = array();
$bairro = array();
$cidade = array();
$cep = array();
$uf = array();
$end_comp = array();

$nu_tel = array();
$ddd_tel = array();
$tp_tel = array(); 

foreach($_POST as $param_name => $param_value){
	//echo "Param: $param_name; Value: $param_value<br />\n";
	

	if(preg_match("/\btp_end(\d*)?\b/", $param_name)){
		array_push($tp_end, $param_value);
	}
	
	if(preg_match("/\bend(\d*)?\b/", $param_name)){
		array_push($end, $param_value);
	}
	
	if(preg_match("/\bnum_end(\d*)?\b/", $param_name)){
		array_push($num_end, $param_value);
	}		
	
	if(preg_match("/\bbairro(\d*)?\b/", $param_name)){
		array_push($bairro, $param_value);
	}	
	
	if(preg_match("/\bcidade(\d*)?\b/", $param_name)){
		array_push($cidade, $param_value);
	}	
	
	if(preg_match("/\bcep(\d*)?\b/", $param_name)){
		array_push($cep, $param_value);
	}	
	
	if(preg_match("/\buf(\d*)?\b/", $param_name)){
		array_push($uf, $param_value);
	}		
	
	if(preg_match("/\bend_comp(\d*)?\b/", $param_name)){
		array_push($end_comp, $param_value);
	}
	
	if(preg_match("/\bnu_tel(\d*)?\b/", $param_name)){
		array_push($nu_tel, $param_value);
	}
	
	if(preg_match("/\btp_tel(\d*)?\b/", $param_name)){
		array_push($tp_tel, $param_value);
	}
	
	if(preg_match("/\bddd_tel(\d*)?\b/", $param_name)){
		array_push($ddd_tel, $param_value);
	}	
	
	
}

//echo 'Tipo: '.$tp_end[2].' Endereco: '.$end[2].' Numero: '.$num_end[2];
//var_dump($end);

if ($ac == 'add'){

	$sql = "";
	$sql = $sql . " INSERT INTO usuario ";
	$sql = $sql . "	 (nm_usuario, dt_cadastro, dt_nascimento, email) ";
	$sql = $sql . "	VALUES (:nm_usuario, :dt_cadastro, :dt_nasc, :email) ";
	
	$stmt = $dbh->prepare($sql);
	
	$stmt->bindParam(':nm_usuario', $nm_usuario);
	$stmt->bindParam(':dt_cadastro', $dt_cadastro);
	$stmt->bindParam(':dt_nasc', $dt_nasc);
	$stmt->bindParam(':email', $email);
	
	try{
		$stmt->execute();
	}catch (PDOException $e) {
		$error_msg = 1;
		$error_txt = $error_txt . "Erro ao cadastrar os dados pessoais.";
		$err = $e->getMessage();
	}
	
	
	$user_id = $dbh->lastInsertId();
	
	$stmt = NULL;
	
	$sql = "";
	$sql = $sql . " INSERT INTO endereco_usuario ( ";
	$sql = $sql . " 	usuario_id_usuario, logradouro, numero, "; 
	$sql = $sql . " 	complemento, cep, bairro, cidade, uf, dt_cadastro, tipo_endereco ";
	$sql = $sql . " ) VALUES (:user_id, :end, :num_end, :end_comp, :cep, :bairro, :cidade, :uf, :dt_cadastro, :tp_end) ";	
	
	$stmt = $dbh->prepare($sql);
	
	$ct = count($end);
	
	for($i=0;$i<$ct;$i++){
		
		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':end', $end[$i]);
		$stmt->bindParam(':num_end', $num_end[$i]);
		$stmt->bindParam(':end_comp', $end_comp[$i]);
		$stmt->bindParam(':cep', $cep[$i]);
		$stmt->bindParam(':bairro', $bairro[$i]);
		$stmt->bindParam(':cidade', $cidade[$i]);
		$stmt->bindParam(':uf', $uf[$i]);
		$stmt->bindParam(':dt_cadastro', $dt_cadastro);
		$stmt->bindParam(':tp_end', $tp_end[$i]);
		
		try{
			$stmt->execute();
		}catch (PDOException $e) {
			$error_msg = 1;
			$error_txt = $error_txt . "Erro ao cadastrar os dados do endereço $i.";
			$err = $e->getMessage();
		}		
		
	}
	
	
	$sql = "";
	$sql = $sql . " INSERT INTO telefone_usuario( ";
	$sql = $sql . " 	usuario_id_usuario, ddd, nu_telefone, tipo_telefone, dt_cadastro ";
	$sql = $sql . " ) VALUES (:user_id, :ddd_tel, :nu_tel, :tp_tel, :dt_cadastro) ";
	
	$stmt = $dbh->prepare($sql);
	
	$ct = count($nu_tel);
	
	for($i=0;$i<$ct;$i++){
		
		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':ddd_tel', $ddd_tel[$i]);
		$stmt->bindParam(':nu_tel', $nu_tel[$i]);
		$stmt->bindParam(':tp_tel', $end_comp[$i]);
		$stmt->bindParam(':dt_cadastro', $dt_cadastro);
	
		try{
			$stmt->execute();
		}catch (PDOException $e) {
			$error_msg = 1;
			$error_txt = $error_txt . "Erro ao cadastrar os dados telefone $i.";
			$err = $e->getMessage();
		}		
		
	}	
	
	if($error_msg == 1){
		$resposta = $error_txt;
	}else{
		$resposta = "SUCESSO";
	}
	
	echo $resposta.'/'.$user_id;
	
}



if ($ac == 'edit'){

	$sql = "";
	$sql = $sql . " update usuario set ";
	$sql = $sql . " 	nm_usuario = :nm_usuario, ";
	$sql = $sql . " 	dt_cadastro = :dt_cadastro, ";
	$sql = $sql . " 	dt_nascimento = :dt_nasc, ";
	$sql = $sql . " 	email = :email ";
	$sql = $sql . " where ";
	$sql = $sql . " 	id_usuario = :id_usuario ";

	$stmt = $dbh->prepare($sql);
	
	$stmt->bindParam(':nm_usuario', $nm_usuario);
	$stmt->bindParam(':dt_cadastro', $dt_cadastro);
	$stmt->bindParam(':dt_nasc', $dt_nasc);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':id_usuario', $id_usuario);
	
	
	try{
		$stmt->execute();
	}catch (PDOException $e) {
		$error_msg = 1;
		$error_txt = $error_txt . "Erro ao atualizar os dados pessoais.";
		var_dump($e->getMessage());
	}
	
	$sql = "delete from endereco_usuario where usuario_id_usuario = :id_usuario";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':id_usuario', $id_usuario);
	$stmt->execute();
	
	$sql = "";
	$sql = $sql . " INSERT INTO endereco_usuario ( ";
	$sql = $sql . " 	usuario_id_usuario, logradouro, numero, "; 
	$sql = $sql . " 	complemento, cep, bairro, cidade, uf, dt_cadastro, tipo_endereco ";
	$sql = $sql . " ) VALUES (:id_usuario, :end, :num_end, :end_comp, :cep, :bairro, :cidade, :uf, :dt_cadastro, :tp_end) ";	
	
	$stmt = $dbh->prepare($sql);
	
	$ct = count($end);
	
	for($i=0;$i<$ct;$i++){
		
		$stmt->bindParam(':id_usuario', $id_usuario);
		$stmt->bindParam(':end', $end[$i]);
		$stmt->bindParam(':num_end', $num_end[$i]);
		$stmt->bindParam(':end_comp', $end_comp[$i]);
		$stmt->bindParam(':cep', $cep[$i]);
		$stmt->bindParam(':bairro', $bairro[$i]);
		$stmt->bindParam(':cidade', $cidade[$i]);
		$stmt->bindParam(':uf', $uf[$i]);
		$stmt->bindParam(':dt_cadastro', $dt_cadastro);
		$stmt->bindParam(':tp_end', $tp_end[$i]);
		
		try{
			$stmt->execute();
		}catch (PDOException $e) {
			$error_msg = 1;
			$error_txt = $error_txt . "Erro ao atualizar os dados do endereço $i.";
		}		
		
	}
	
	$sql = "delete from telefone_usuario where usuario_id_usuario = :id_usuario";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':id_usuario', $id_usuario);
	$stmt->execute();
	
	$sql = "";
	$sql = $sql . " INSERT INTO telefone_usuario( ";
	$sql = $sql . " 	usuario_id_usuario, ddd, nu_telefone, tipo_telefone, dt_cadastro ";
	$sql = $sql . " ) VALUES (:id_usuario, :ddd_tel, :nu_tel, :tp_tel, :dt_cadastro) ";
	
	$stmt = $dbh->prepare($sql);
	
	$ct = count($nu_tel);
	
	for($i=0;$i<$ct;$i++){
		
		$stmt->bindParam(':id_usuario', $id_usuario);
		$stmt->bindParam(':ddd_tel', $ddd_tel[$i]);
		$stmt->bindParam(':nu_tel', $nu_tel[$i]);
		$stmt->bindParam(':tp_tel', $tp_tel[$i]);
		$stmt->bindParam(':dt_cadastro', $dt_cadastro);
	
		try{
			$stmt->execute();
		}catch (PDOException $e) {
			$error_msg = 1;
			$error_txt = $error_txt . "Erro ao cadastrar os dados telefone $i.";
		}		
		
	}	

	if($error_msg == 1){
		$resposta = $error_txt;
	}else{
		$resposta = "SUCESSO";
	}
	
	echo $resposta.'/'.$id_usuario;


}



if ($ac == 'buscar'){
	
	$texto = $_POST['texto'];
	
	$sql = "";
	$sql = $sql . " select * from usuario where nm_usuario like '$texto%' ";
	
	$table = "";
	$table = $table. " <table> ";
	$table = $table. "   <thead> ";
	$table = $table. "     <tr> ";
	$table = $table. "       <th width='200'>Nome</th> ";
	$table = $table. "       <th>Data de Nascimento</th> ";
	$table = $table. "       <th width='150'>E-mail</th> ";
	$table = $table. "       <th width='150'></th> ";
	$table = $table. " 	  	 <th width='150'></th> ";
	$table = $table. "     </tr> ";
	$table = $table. "   </thead> ";
	$table = $table. "   <tbody> ";

	foreach($dbh->query($sql) as $row) {

		$dt_nasc = $row['dt_nascimento'];

		$dt_nasc = substr($dt_nasc, 0, -4).'-'.substr($dt_nasc, 4, 2).'-'.substr($dt_nasc, -2);

		$table = $table. " <tr> ";
		$table = $table. "   <td>".$row['nm_usuario']."</td> ";
		$table = $table. "   <td>".$dt_nasc."</td> ";
		$table = $table. "   <td>".$row['email']."</td> ";
		$table = $table. "   <td><a href='cadastro.php?uid=".$row['id_usuario']."' target='_self'>Editar</a></td> ";
		$table = $table. "   <td><a href='../produto/produto.php?uid=".$row['id_usuario']."' target='_self'>Produtos</a></td> ";		
		$table = $table. " </tr> ";
		
	}	

	$table = $table. "   </tbody> ";
	$table = $table. " </table> ";

	echo $table;

}






















