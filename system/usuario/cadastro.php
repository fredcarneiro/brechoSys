<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]--><head>
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width" />
<title>CADASTRO DE USUARIOS</title>

<script src='../js/foundation3/jquery.js'></script>
<link rel="stylesheet" href="../css/foundation4/normalize.css">
<!-- Foundation 3 for IE 8 and earlier -->
<!--[if lt IE 9]>
	<link rel="stylesheet" href="../css/foundation3/foundation.css">
<![endif]-->
<!-- Foundation 4 for IE 9 and earlier -->
<!--[if gt IE 8]><!-->
	<link rel="stylesheet" href="../css/foundation4/foundation.css">
<!--<![endif]-->
<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="../css/doc.css">
<script src="../js/foundation4/vendor/custom.modernizr.js"></script>

<script>


// CONTROLE ENDERECO
function controlEndereco(action, rnum){
	
	if(action == 'add'){
		
		var rowNumEnd = new Number($("#rowNumEnd").val()) + 1 - 1;
		
		rowNumEnd ++;
		
		$("#rowNumEnd").val(rowNumEnd);
		

		string = '';
		string += ' <div id="endereco'+rowNumEnd+'"> ';
		string += ' <hr /> ';
		string += ' <div class="row" style="border:0px solid #000;"> '; 
		string += ' <div class="three large-3 columns" style="border:0px solid #000; "> ';
		string += ' 	<label> ';
		string += ' 		TIPO: ';
		string += ' 		<select id="tp_end'+rowNumEnd+'" name="tp_end'+rowNumEnd+'"> ';
		string += ' 			<option value="00">Tipo de Endereco</option> ';
		string += ' 			<option value="0">Residencial</option> ';
		string += ' 			<option value="1">Trabalho</option> ';
		string += ' 		</select> ';
		string += ' 	</label> ';   
		string += ' </div> ';
		string += ' <div class="six large-6 columns" style="border:0px solid #000;"> ';
		string += ' 	<label> ';
		string += ' 		ENDERE&Ccedil;O: ';
		string += ' 		<input type="text" id="end'+rowNumEnd+'" name="end'+rowNumEnd+'" /> ';
		string += ' 	</label> ';
		string += ' </div> ';
		string += ' <div class="three large-3 columns" style="border:0px solid #000;"> ';
		string += ' 	<label> ';
		string += ' 		N&Uacute;MERO: ';
		string += ' 		<input type="text" id="num_end'+rowNumEnd+'" name="num_end'+rowNumEnd+'" /> ';
		string += ' 	</label> ';
		string += ' </div> ';    
		string += ' </div> ';
		string += ' <div class="row" style="border:0px solid #000;"> ';
		string += ' <div class="seven large-7 columns" style="border:0px solid #000;"> ';
		string += ' 	<label> ';
		string += ' 		COMPLEMENTO: ';
		string += ' 		<input type="text" id="end_comp'+rowNumEnd+'" name="end_comp'+rowNumEnd+'"  /> ';
		string += ' 	</label> ';
		string += ' </div> ';  
		string += ' </div> ';
		string += ' <div class="row" style="border:0px solid #000;"> ';
		string += ' <div class="seven large-7 columns" style="border:0px solid #000; "> ';
		string += ' 	<label> ';
		string += ' 		BAIRRO: ';
		string += ' 		<input type="text" id="bairro'+rowNumEnd+'" name="bairro'+rowNumEnd+'" /> ';
		string += ' 	</label> ';
		string += ' </div> ';
		string += ' </div> ';   
		string += ' <div class="row" style="border:0px solid #000;"> ';
		string += ' <div class="seven large-7 columns" style="border:0px solid #000;"> ';
		string += ' 	<label> ';
		string += ' 		CIDADE: ';
		string += ' 		<input type="text" id="cidade'+rowNumEnd+'" name="cidade'+rowNumEnd+'" /> ';
		string += ' 	</label> ';
		string += ' </div> ';
		string += ' </div> '; 
		string += ' <div class="row" style="border:0px solid #000;"> ';
		string += ' <div class="three large-3 columns" style="border:0px solid #000;"> ';
		string += ' 	<label> ';
		string += ' 		CEP: ';
		string += ' 		<input type="text" id="cep'+rowNumEnd+'" name="cep'+rowNumEnd+'" style="width:10em;"/> ';
		string += ' 	</label> ';
		string += ' </div> ';
		string += ' <div class="nine large-9 columns" style="border:0px solid #000;">  ';
		string += ' 	<label for="uf'+rowNumEnd+'"> ';
		string += ' 		UF: <br /> ';
		string += ' 		<select id="uf'+rowNumEnd+'" name="uf'+rowNumEnd+'" style="width:18em;"> ';
		string += ' 			<option value="0">Estados</option> ';
		string += ' 			<option value="ac">Acre</option> ';
		string += ' 			<option value="al">Alagoas</option> ';
		string += ' 			<option value="am">Amazonas</option> ';
		string += ' 			<option value="ap">Amapá</option> ';
		string += ' 			<option value="ba">Bahia</option> ';
		string += ' 			<option value="ce">Ceará</option> ';
		string += ' 			<option value="df">Distrito Federal</option> ';
		string += ' 			<option value="es">Espírito Santo</option> ';
		string += ' 			<option value="go">Goiás</option> ';
		string += ' 			<option value="ma">Maranhão</option> ';
		string += ' 			<option value="mt">Mato Grosso</option> ';
		string += ' 			<option value="ms">Mato Grosso do Sul</option> ';
		string += ' 			<option value="mg">Minas Gerais</option> ';
		string += ' 			<option value="pa">Pará</option> ';
		string += ' 			<option value="pb">Paraíba</option> ';
		string += ' 			<option value="pr">Paraná</option> ';
		string += ' 			<option value="pe">Pernambuco</option> ';
		string += ' 			<option value="pi">Piauí</option> ';
		string += ' 			<option value="rj">Rio de Janeiro</option> ';
		string += ' 			<option value="rn">Rio Grande do Norte</option> ';
		string += ' 			<option value="ro">Rondônia</option> ';
		string += ' 			<option value="rs">Rio Grande do Sul</option> ';
		string += ' 			<option value="rr">Roraima</option> ';
		string += ' 			<option value="sc">Santa Catarina</option> ';
		string += ' 			<option value="se">Sergipe</option> ';
		string += ' 			<option value="sp">São Paulo</option> ';
		string += ' 			<option value="to">Tocantins</option> ';
		string += ' 		</select> ';
		string += ' 	</label> ';
		string += ' </div> ';             
		string += ' </div> ';
		
        string += ' <div class="row"> ';
        string += '     <div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; "> ';
        string += '         <a class="button remEnd" id="btRemoveEndereco'+rowNumEnd+'">Remover este Endereco</a> ';
        string += '     </div> ';
        string += ' </div> ';		
		
		
		string += ' </div> ';
	
		$("#enderecos").append(string);
	
	}
	
	if(action == 'del'){
		$("#endereco"+rnum).remove();
	}
	
	
}

// CONTROLE TEL
function controlTel(action, rnum){
	
	if(action == 'add'){
		
		var rowNumTel = new Number($("#rowNumTel").val()) + 1 - 1;
		
		rowNumTel ++;
		
		$("#rowNumTel").val(rowNumTel);
		
		string = '';
		string += ' <div id="telefone'+rowNumTel+'"> ';
		string += ' <hr /> ';
		string += ' <div class="row" style="border:0px solid #000;"> ';     
		string += ' 	<div class="three large-3 columns" style="border:0px solid #000; "> ';
		string += ' 		<label> ';
		string += ' 			TIPO: ';
		string += ' 			<select id="tp_tel'+rowNumTel+'" name="tp_tel'+rowNumTel+'"> ';
		string += ' 				<option value="0">Tipo Telefone</option> ';
		string += ' 				<option value="1">Residencial</option> ';
		string += ' 				<option value="2">Celular</option> ';
		string += ' 				<option value="3">Trabalho</option> ';
		string += ' 			</select> ';
		string += ' 		</label> ';        
		string += ' 	</div> ';
		string += ' 	<div class="two large-2 columns" style="border:0px solid #000;"> ';
		string += ' 		<label> ';
		string += ' 			DDD: ';
		string += ' 			<input type="text" id="ddd_tel'+rowNumTel+'" name="ddd_tel'+rowNumTel+'" /> ';
		string += ' 		</label> ';
		string += ' 	</div> ';
		string += ' 	<div class="seven large-7 columns" style="border:0px solid #000;"> ';
		string += ' 		<label> ';
		string += ' 			N&Uacute;MERO: ';
		string += ' 			<input type="text" id="nu_tel'+rowNumTel+'" name="nu_tel'+rowNumTel+'" /> ';
		string += ' 		</label> ';
		string += ' 	</div> ';   
		string += ' </div> ';		
        string += ' <div class="row"> ';
        string += '     <div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; "> ';
        string += '         <a class="button remTel" id="btRemoveTel'+rowNumTel+'">Remover este Telefone</a> ';
        string += '     </div> ';
        string += ' </div> ';		
		
		
		string += ' </div> ';
	
		$("#telefones").append(string);
	
	}
	
	if(action == 'del'){
		$("#telefone"+rnum).remove();
	}
	
	
}

//ENVIA FORMULARIO
function sendform(action){
	
	


	if($('#nm_usuario').val() == ""){
		alert("Nome do usuário é um campo obrigatório.");
		$('#nm_usuario').focus();
		return false;
	}
			
	if($('#dt_nasc').val() == ""){
		alert("Data de Nascimento do usuário é um campo obrigatório.");
		$('#dt_nasc').focus();
		return false;
	}			
			
	var ac = $("#ac").val();
	
	/*if (ac == 'add'){
		var chk = checarUsuario();
		if(chk == 0){
			alert("Usuario ja cadastrado!");
			return false;
		}
	}*/
	
	if (ac == 'edit'){

	}
	

	$.post(
		'crud.php',
		$('#formUsuario').serialize(),

		function(data){
			
			alert(data);
			data = data.split("/");
			
			if(data[0] != "SUCESSO"){
				alert('Desculpe o transtorno, mas parece que ocorreu um problema para completar o seu pedido. \nPor favor, entre em contato com a Divisao de Informatica.');
				return false;				
			}else{
				alert('Atualizacao realizada com sucesso! \nEspere a atualizacao da tela para poder ver o resultado.');
				var loc = location.href;
				
				if (loc.indexOf("?uid=") > -1){
					window.location.assign(location.href); 
				}else{
					window.location.assign(location.href + "?uid=" + data[1]); 
				}
				
				
			}
		});
}


$(document).ready(function() {
						   
	
	var rowNumTel = new Number($("#rowNumTel").val()) + 1 - 1;
	
	$('#btAddEndereco').click(function(){controlEndereco('add', null);});
	$('#btAddTel').click(function(){controlTel('add', null);});
	$('#salvar').click(function(){sendform('add');});
	
	$(document.body).on('click', '.remEnd' , function() {
		var nrow = this.id.substring(16);
		//console.log(nrow + ' ' + this.id);
		controlEndereco('del', nrow);
	});
	
	$(document.body).on('click', '.remTel' , function() {
		var nrow = this.id.substring(11);
		//console.log(nrow + ' ' + this.id);
		controlTel('del', nrow);
	});	
	

});

</script>

</head>

<body>

<?php
error_reporting(E_ALL ^ E_NOTICE);
include '../lib/conn.php'; 

$dbh = conn();

$id_usuario = $_GET["uid"];

$count_end = 0;
$count_tel = 0;

if(isset($id_usuario)){
	
	$action = "edit";
	
	$sql = "";
	$sql = $sql . " select * from usuario ";
	$sql = $sql . "	 where id_usuario = $id_usuario ";
	
	foreach($dbh->query($sql) as $row) {
		$nm_usuario = $row['nm_usuario'];
		$dt_nasc = $row['dt_nascimento'];

		$dt_nasc = substr($dt_nasc, 0, -4).'-'.substr($dt_nasc, 4, 2).'-'.substr($dt_nasc, -2);

		$email = $row['email'];
	}
	
	$sql = "";
	$sql = $sql . " select count(*) count from endereco_usuario ";
	$sql = $sql . "	 where usuario_id_usuario = $id_usuario ";
	
	foreach($dbh->query($sql) as $row) {
		$count_end = $row['count'];
	}
	
	$sql = "";
	$sql = $sql . " select count(*) count from telefone_usuario ";
	$sql = $sql . "	 where usuario_id_usuario = $id_usuario ";
	
	foreach($dbh->query($sql) as $row) {
		$count_tel = $row['count'];
	}	
	
	
	
}else{
	$action = "add";
}




?>

<form id="formUsuario" name="formUsuario">
	<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>"/>
	<input type="hidden" id="ac" name="ac" value="<?php echo $action; ?>" />
    <input type="hidden" id="rowNumEnd" name="rowNumEnd" value="<?php echo $count_end; ?>" />
    <input type="hidden" id="rowNumTel" name="rowNumTel" value="<?php echo $count_tel; ?>" />    
    <div class="row" style="padding-top: 1.563em;">
        <div class="twelve large-12 columns" style="padding-bottom:2em;  padding-left:0px; text-align:center; font-weight:bold;">
            CADASTRO DE USU&Aacute;RIOS
        </div>
    </div>
 	
    <fieldset style="border:1px solid #000; width:800px; margin:auto;">
    	<legend style="color:#666;">DADOS PESSOAIS</legend>    
    
        <div class="row" style="border:0px solid #000;">     
            <div class="five large-5 columns" style="border:0px solid #000; ">
                <label>
                    NOME:
                    <input type="text" id="nm_usuario" name="nm_usuario" value="<?php echo $nm_usuario; ?>" />
                </label>
            </div>
            <div class="seven large-7 columns" style="border:0px solid #000;">
                <label>
                    DATA DE CADASTRO:
                      <input type="date" id="dt_nasc" name="dt_nasc" style="width:13em;" value="<?php echo $dt_nasc; ?>"/>
                </label>
            </div>
        </div>

        <div class="row" style="border:0px solid #000;">
            <div class="five large-5 columns" style="border:0px solid #000;">
                <label>
                    C&Oacute;DIGO DO USU&Aacute;RIO (E-MAIL):
                      <input type="text" id="email" name="email" value="<?php echo $email; ?>"/>
                </label>
            </div>          
        </div>
	</fieldset>
    
    <br /><br />
    
    <fieldset style="border:1px solid #000; width:800px; margin:auto;" id="enderecos">
    	<legend style="color:#666;">ENDERE&Ccedil;O</legend>    
    
        
        <?php
		if ($action == "add"){
		?>
        
            <div class="row" style="border:0px solid #000;">     
                <div class="three large-3 columns" style="border:0px solid #000; ">
                    <label>
                        TIPO:
                        <select id="tp_end" name="tp_end">
                            <option value="0">Tipo de Endereco</option>
                            <option value="0">Residencial</option>
                            <option value="1">Trabalho</option>
                        </select>
                    </label>                
                    
    
                </div>
                <div class="six large-6 columns" style="border:0px solid #000;">
                    <label>
                        ENDERE&Ccedil;O:
                        <input type="text" id="end" name="end"  />
                    </label>
                </div>
                <div class="three large-3 columns" style="border:0px solid #000;">
                    <label>
                        N&Uacute;MERO:
                        <input type="text" id="num_end" name="num_end" />
                    </label>
                </div>            
            </div>
    
            <div class="row" style="border:0px solid #000;">
                <div class="seven large-7 columns" style="border:0px solid #000;">
                    <label>
                        COMPLEMENTO:
                        <input type="text" id="end_comp" name="end_comp" />
                    </label>
                </div>          
            </div>
            
            <div class="row" style="border:0px solid #000;">     
                <div class="seven large-7 columns" style="border:0px solid #000; ">
                    <label>
                        BAIRRO:
                        <input type="text" id="bairro" name="bairro" />
                    </label>
                </div>
            </div>      
            
            <div class="row" style="border:0px solid #000;">
                <div class="seven large-7 columns" style="border:0px solid #000;">
                    <label>
                        CIDADE:
                        <input type="text" id="cidade" name="cidade" />
                    </label>
                </div>          
            </div>  
            
            <div class="row" style="border:0px solid #000;">
                <div class="three large-3 columns" style="border:0px solid #000;">
                    <label>
                        CEP:
                        <input type="text" id="cep" name="cep" style="width:10em;"/>
                    </label>
                </div>   
                
                <div class="nine large-9 columns" style="border:0px solid #000;">
                    <label for="uf">
                        UF: <br />
                        <select id="uf" name="uf" style="width:18em;">
                            <option value="0">Estados</option>
                            <option value="ac">Acre</option>
                            <option value="al">Alagoas</option>
                            <option value="am">Amazonas</option>
                            <option value="ap">Amapá</option>
                            <option value="ba">Bahia</option>
                            <option value="ce">Ceará</option>
                            <option value="df">Distrito Federal</option>
                            <option value="es">Espírito Santo</option>
                            <option value="go">Goiás</option>
                            <option value="ma">Maranhão</option>
                            <option value="mt">Mato Grosso</option>
                            <option value="ms">Mato Grosso do Sul</option>
                            <option value="mg">Minas Gerais</option>
                            <option value="pa">Pará</option>
                            <option value="pb">Paraíba</option>
                            <option value="pr">Paraná</option>
                            <option value="pe">Pernambuco</option>
                            <option value="pi">Piauí</option>
                            <option value="rj">Rio de Janeiro</option>
                            <option value="rn">Rio Grande do Norte</option>
                            <option value="ro">Rondônia</option>
                            <option value="rs">Rio Grande do Sul</option>
                            <option value="rr">Roraima</option>
                            <option value="sc">Santa Catarina</option>
                            <option value="se">Sergipe</option>
                            <option value="sp">São Paulo</option>
                            <option value="to">Tocantins</option>
                        </select>
                    </label>
                </div>                     
            </div>
		<?php
		}else{
			
			$sql = "";
			$sql = $sql . " select * from endereco_usuario ";
			$sql = $sql . "	 where usuario_id_usuario = $id_usuario ";	
			
			$i=0;
			
			foreach($dbh->query($sql) as $row) {
				
				$end = $row['logradouro'];		
				$num = $row['numero'];		
				$end_comp = $row['complemento'];		
				$cep = $row['cep'];		
				$bairro = $row['bairro'];
				$cidade = $row['cidade'];
				$uf = $row['uf'];		
				$tp_end = $row['tipo_endereco'];	
				
						
					
			
		?>
                <div id="endereco<?php echo $i; ?>">
                <div class="row" style="border:0px solid #000;">     
                    <div class="three large-3 columns" style="border:0px solid #000; ">
                        <label>
                            TIPO:
                            <select id="tp_end<?php echo $i; ?>" name="tp_end<?php echo $i; ?>">
                                <option value="0">Tipo de Endereco</option>
                                <option value="0" <?php if ($tp_end == "0"){echo "selected";} ?>>Residencial</option>
                                <option value="1" <?php if ($tp_end == "1"){echo "selected";} ?>>Trabalho</option>
                            </select>
                        </label>                
                        
        
                    </div>
                    <div class="six large-6 columns" style="border:0px solid #000;">
                        <label>
                            ENDERE&Ccedil;O:
                            <input type="text" id="end<?php echo $i; ?>" name="end<?php echo $i; ?>" value="<?php echo $end; ?>" />
                        </label>
                    </div>
                    <div class="three large-3 columns" style="border:0px solid #000;">
                        <label>
                            N&Uacute;MERO:
                            <input type="text" id="num_end<?php echo $i; ?>" name="num_end<?php echo $i; ?>" value="<?php echo $num; ?>" />
                        </label>
                    </div>            
                </div>
        
                <div class="row" style="border:0px solid #000;">
                    <div class="seven large-7 columns" style="border:0px solid #000;">
                        <label>
                            COMPLEMENTO:
                            <input type="text" id="end_comp<?php echo $i; ?>" name="end_comp<?php echo $i; ?>" value="<?php echo $end_comp; ?>" />
                        </label>
                    </div>          
                </div>
                
                <div class="row" style="border:0px solid #000;">     
                    <div class="seven large-7 columns" style="border:0px solid #000; ">
                        <label>
                            BAIRRO:
                            <input type="text" id="bairro<?php echo $i; ?>" name="bairro<?php echo $i; ?>" value="<?php echo $bairro; ?>" />
                        </label>
                    </div>
                </div>      
                
                <div class="row" style="border:0px solid #000;">
                    <div class="seven large-7 columns" style="border:0px solid #000;">
                        <label>
                            CIDADE:
                            <input type="text" id="cidade<?php echo $i; ?>" name="cidade<?php echo $i; ?>" value="<?php echo $cidade; ?>" />
                        </label>
                    </div>          
                </div>  
                
                <div class="row" style="border:0px solid #000;">
                    <div class="three large-3 columns" style="border:0px solid #000;">
                        <label>
                            CEP:
                            <input type="text" id="cep<?php echo $i; ?>" name="cep<?php echo $i; ?>" style="width:10em;" value="<?php echo $cep; ?>"/>
                        </label>
                    </div>   
                    
                    <div class="nine large-9 columns" style="border:0px solid #000;">
                        <label for="uf">
                            UF: <br />
                            <select id="uf<?php echo $i; ?>" name="uf<?php echo $i; ?>" style="width:18em;">
                                <option value="0">Estados</option>
                                <option value="ac" <?php if ($uf == "ac"){echo "selected";} ?>>Acre</option>
                                <option value="al" <?php if ($uf == "al"){echo "selected";} ?>>Alagoas</option>
                                <option value="am" <?php if ($uf == "am"){echo "selected";} ?>>Amazonas</option>
                                <option value="ap" <?php if ($uf == "ap"){echo "selected";} ?>>Amapá</option>
                                <option value="ba" <?php if ($uf == "ba"){echo "selected";} ?>>Bahia</option>
                                <option value="ce" <?php if ($uf == "ce"){echo "selected";} ?>>Ceará</option>
                                <option value="df" <?php if ($uf == "df"){echo "selected";} ?>>Distrito Federal</option>
                                <option value="es" <?php if ($uf == "es"){echo "selected";} ?>>Espírito Santo</option>
                                <option value="go" <?php if ($uf == "go"){echo "selected";} ?>>Goiás</option>
                                <option value="ma" <?php if ($uf == "ma"){echo "selected";} ?>>Maranhão</option>
                                <option value="mt" <?php if ($uf == "mt"){echo "selected";} ?>>Mato Grosso</option>
                                <option value="ms" <?php if ($uf == "ms"){echo "selected";} ?>>Mato Grosso do Sul</option>
                                <option value="mg" <?php if ($uf == "mg"){echo "selected";} ?>>Minas Gerais</option>
                                <option value="pa" <?php if ($uf == "pa"){echo "selected";} ?>>Pará</option>
                                <option value="pb" <?php if ($uf == "pb"){echo "selected";} ?>>Paraíba</option>
                                <option value="pr" <?php if ($uf == "pr"){echo "selected";} ?>>Paraná</option>
                                <option value="pe" <?php if ($uf == "pe"){echo "selected";} ?>>Pernambuco</option>
                                <option value="pi" <?php if ($uf == "pi"){echo "selected";} ?>>Piauí</option>
                                <option value="rj" <?php if ($uf == "rj"){echo "selected";} ?>>Rio de Janeiro</option>
                                <option value="rn" <?php if ($uf == "rn"){echo "selected";} ?>>Rio Grande do Norte</option>
                                <option value="ro" <?php if ($uf == "ro"){echo "selected";} ?>>Rondônia</option>
                                <option value="rs" <?php if ($uf == "rs"){echo "selected";} ?>>Rio Grande do Sul</option>
                                <option value="rr" <?php if ($uf == "rr"){echo "selected";} ?>>Roraima</option>
                                <option value="sc" <?php if ($uf == "sc"){echo "selected";} ?>>Santa Catarina</option>
                                <option value="se" <?php if ($uf == "se"){echo "selected";} ?>>Sergipe</option>
                                <option value="sp" <?php if ($uf == "sp"){echo "selected";} ?>>São Paulo</option>
                                <option value="to" <?php if ($uf == "to"){echo "selected";} ?>>Tocantins</option>
                            </select>
                        </label>
                    </div>                     
                </div>
                
                <div class="row">
                    <div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; ">
	                    <a class="button remEnd" id="btRemoveEndereco<?php echo $i; ?>">Remover este Endereco</a>
                    </div> 
                </div>
                
                <hr />
                
                </div>
                
		<?php
				$i++;
			}
		}
		
		?>
        

        
	</fieldset>
    
    <div class="row" style="width:800px; margin:auto; padding-top:1em;">
    	<div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; ">
        	<a class="button" id="btAddEndereco">Inserir novo Endereco</a>
        </div>
    </div>     
    
    <br />
    <fieldset style="border:1px solid #000; width:800px; margin:auto;" id="telefones">
    	<legend style="color:#666;">TELEFONE</legend>    
    
        <?php
		if ($action == "add"){
		?>        
        
            <div class="row" style="border:0px solid #000;">     
                <div class="three large-3 columns" style="border:0px solid #000; ">
                    <label>
                        TIPO:
                        <select id="tp_tel" name="tp_tel">
                            <option value="0">Tipo Telefone</option>
                            <option value="1">Residencial</option>
                            <option value="2">Celular</option>
                            <option value="3">Trabalho</option>
                        </select>
                    </label>                
                    
    
                </div>
                <div class="two large-2 columns" style="border:0px solid #000;">
                    <label>
                        DDD:
                        <input type="text" id="ddd_tel" name="ddd_tel"  />
                    </label>
                </div>
                <div class="seven large-7 columns" style="border:0px solid #000;">
                    <label>
                        N&Uacute;MERO:
                        <input type="text" id="nu_tel" name="nu_tel" />
                    </label>
                </div>            
            </div>
            
        <?php
		}else{
			
			$sql = "";
			$sql = $sql . " select * from telefone_usuario ";
			$sql = $sql . "	 where usuario_id_usuario = $id_usuario ";	
			
			$i=0;
			
			foreach($dbh->query($sql) as $row) {
				
				$nu_tel = $row['nu_telefone'];
				$ddd_tel = $row['ddd'];
				$tp_tel = $row['tipo_telefone'];
		
		?>
            
                <div id="telefone<?php echo $i; ?>">
                <div class="row" style="border:0px solid #000;">     
                    <div class="three large-3 columns" style="border:0px solid #000; ">
                        <label>
                            TIPO:
                            <select id="tp_tel<?php echo $i; ?>" name="tp_tel<?php echo $i; ?>">
                                <option value="0">Tipo Telefone</option>
                                <option value="1" <?php if ($tp_tel == 1){echo "selected";} ?>>Residencial</option>
                                <option value="2" <?php if ($tp_tel == 2){echo "selected";} ?>>Celular</option>
                                <option value="3" <?php if ($tp_tel == 3){echo "selected";} ?>>Trabalho</option>
                            </select>
                        </label>                
                        
        
                    </div>
                    <div class="two large-2 columns" style="border:0px solid #000;">
                        <label>
                            DDD:
                            <input type="text" id="ddd_tel<?php echo $i; ?>" name="ddd_tel<?php echo $i; ?>" value="<?php echo $ddd_tel; ?>" />
                        </label>
                    </div>
                    <div class="seven large-7 columns" style="border:0px solid #000;">
                        <label>
                            N&Uacute;MERO:
                            <input type="text" id="nu_tel<?php echo $i; ?>" name="nu_tel<?php echo $i; ?>" value="<?php echo $nu_tel; ?>" />
                        </label>
                    </div>            
                </div>  
                
                 <div class="row"> 
                     <div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; "> 
                         <a class="button remTel" id="btRemoveTel<?php echo $i; ?>">Remover este Telefone</a> 
                     </div> 
                </div>              
                
                </div>      
		
		<?php
				$i++;
			}
		}
		?>
        
	</fieldset>  
    
    
    <div class="row" style="width:800px; margin:auto; padding-top:1em;">
    	<div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; ">
        	<a class="button" id="btAddTel">Inserir novo Telefone</a>
        </div>
    </div>      
    
    <div class="row" style="width:800px; margin:auto; padding-top:1em;">
    	<div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; ">
        	<a class="button" id="salvar">Salvar</a>
            
            <?php
			if ($action != "add"){
			?>
            
            	<a href='../produto/produto.php?uid=<?php echo $id_usuario; ?>' target='_self' class="button">Cadastrar Produtos</a>
            
            <?php } ?>
            <a class="button" href="../index.php">Voltar a Tela Principal</a>
        </div>
    </div> 
        
</form>

<!-- Foundation 3 for IE 8 and earlier -->
<!--[if lt IE 9]>
    <script src="../js/foundation3/foundation.min.js"></script>
    <script src="../js/foundation3/app.js"></script>
<![endif]-->

<!-- Foundation 4 for IE 9 and later -->
<!--[if gt IE 8]><!-->
    <script src="../js/foundation4/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
<!--<![endif]-->

</body>
</html>