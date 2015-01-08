<?php
// contains utility functions mb_stripos_all() and apply_highlight()
include '../lib/conn.php'; 
  
 
// get what user typed in autocomplete input
$term = trim($_GET['term']);
 
$a_json = array();
$a_json_row = array();
 
$a_json_invalid = array(array("id" => "#", "value" => $term, "label" => "Only letters and digits are permitted..."));
$json_invalid = json_encode($a_json_invalid);
 
// replace multiple spaces with one
$term = preg_replace('/\s+/', ' ', $term);
 
// SECURITY HOLE ***************************************************************
// allow space, any unicode letter and digit, underscore and dash
if(preg_match("/[^\040\pL\pN_-]/u", $term)) {
  print $json_invalid;
  exit;
}
// *****************************************************************************
 
// database connection
$conn = new mysqli("localhost", "root", "1234", "sysbrejo");
 
$parts = explode(' ', $term);
$p = count($parts);
 
/**
 * Create SQL
 */
$sql = 'SELECT * FROM produto WHERE dt_baixa not like "2%" or dt_baixa is null ';
for($i = 0; $i < $p; $i++) {
  $sql .= ' AND descricao LIKE ' . "'%" . $conn->real_escape_string($parts[$i]) . "%'";
}

$rs = $conn->query($sql);
if($rs === false) {
  $user_error = 'Wrong SQL: ' . $sql . 'Error: ' . $conn->errno . ' ' . $conn->error;
  trigger_error($user_error, E_USER_ERROR);
}
 
while($row = $rs->fetch_assoc()) {
	
	switch ($row['sexo']) {
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
	
	
  $a_json_row["id_produto"] = $row['id_produto'];
  $a_json_row["label"] = utf8_decode($row['descricao']) .' - TAMANHO: '. $row['idade'] . ' - ' . $sexo;
  $a_json_row["descricao"] = utf8_decode($row['descricao']);
  $a_json_row["sexo"] = $sexo;
  $a_json_row["idade"] = $row['idade'];
  $a_json_row["preco_loja"] = $row['preco_loja'];
  $a_json_row["preco_repasse"] = $row['preco_repasse'];
  
  array_push($a_json, $a_json_row);
}
 

$json = json_encode($a_json);
print $json;
