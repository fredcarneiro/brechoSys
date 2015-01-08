<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]--><head>
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width" />
<title>CADASTRO DE PRODUTOS</title>

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
function openInserir(ac, pid) {

var width = 800;
var height = 600;

var left = 99;
var top = 99;

var uid = $("#id_usuario").val();

window.open('cproduto.php?uid='+uid+'&ac='+ac+'&pid='+pid,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

}


$(document).ready(function() {
						   
					   
	$('#salvar').click(function(){sendform('add');});
	$('#btInserirProduto').click(function(){openInserir('add', 0);});	
	
	$(document.body).on('click', '.editProduto' , function() {
		var nrow = this.id.substring(11);
		openInserir('edit', nrow);
	});		
	
	
	$(".baixaProduto").on( "click", function() {
		
		var p_id = this.id.substring(5);
		var baixa = 0;
		
		if (this.checked){
			baixa = 1;
		}
		
		$.post(
			'crud.php',
			{p_id: p_id, ac: 'baixaProduto', baixa: baixa},
	
			function(data){

				data = data.split("/");
				
				if(data[0] != "SUCESSO"){
					
					alert('Desculpe o transtorno, mas parece que ocorreu um problema para completar o seu pedido.');
					return false;				
				}else{
					//alert('Atualizacao realizada com sucesso! \nEspere a atualizacao da tela para poder ver o resultado.');
					location.reload();
				}
		});
		
	});
	
	$(".repasseProduto").on( "click", function() {
		
		var p_id = this.id.substring(7);
		var repasse = 0;
		
		if (this.checked){
			repasse = 1;
		}
		
		$.post(
			'crud.php',
			{p_id: p_id, ac: 'repasseProduto', repasse: repasse},
	
			function(data){

				data = data.split("/");
				
				if(data[0] != "SUCESSO"){
					
					alert('Desculpe o transtorno, mas parece que ocorreu um problema para completar o seu pedido.');
					return false;				
				}else{
					//alert('Atualizacao realizada com sucesso! \nEspere a atualizacao da tela para poder ver o resultado.');
					location.reload();
				}
		});
		
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

if(isset($id_usuario)){
	

	$sql = "";
	$sql = $sql . " select * from usuario ";
	$sql = $sql . "	 where id_usuario = $id_usuario ";
	
	foreach($dbh->query($sql) as $row) {
		$nm_usuario = $row['nm_usuario'];
		$dt_nasc = $row['dt_nascimento'];

		$dt_nasc = substr($dt_nasc, 0, -4).'-'.substr($dt_nasc, 4, 2).'-'.substr($dt_nasc, -2);

		$email = $row['email'];
	}
	
}

?>

<form id="formUsuario" name="formUsuario">
	<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>"/>
	<input type="hidden" id="ac" name="ac" value="<?php echo $action; ?>" />
    <div class="row" style="padding-top: 1.563em;">
        <div class="twelve large-12 columns" style="padding-bottom:2em;  padding-left:0px; text-align:center; font-weight:bold;">
            CADASTRO DE PRODUTOS
        </div>
    </div>
 	
    <fieldset style="border:1px solid #000; width:1200px; margin:auto;">
    	<legend style="color:#666;">DADOS DO USUÁRIO</legend>    
    
        <div class="row" style="border:0px solid #000;">     
            <div class="five large-5 columns" style="border:0px solid #000; ">
                <label>
                    NOME:
                    <input type="text" id="nm_usuario" name="nm_usuario" value="<?php echo $nm_usuario; ?>" disabled/>
                </label>
            </div>
            <div class="seven large-7 columns" style="border:0px solid #000;">
                <label>
                    DATA DE NASCIMENTO:
                    <input type="date" id="dt_nasc" name="dt_nasc" style="width:13em;" value="<?php echo $dt_nasc; ?>" disabled/>
                </label>
            </div>
        </div>

        <div class="row" style="border:0px solid #000;">
            <div class="five large-5 columns" style="border:0px solid #000;">
                <label>
                    E-MAIL:
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>" disabled/>
                </label>
            </div>          
        </div>
	</fieldset>
    
    <br /><br />
    
    <fieldset style="border:1px solid #000; width:1200px; margin:auto;" id="enderecos">
    	<legend style="color:#666;">PRODUTOS</legend>    
    
        <div class="row" style="border:0px solid #000;">     
            <div class="twelve large-12 columns" style="border:0px solid #000; ">
                <table>
                    
                    <thead>
                        <tr>
                            <th>C&Oacute;DIGO</th>
                            <th>DESCRI&Ccedil;&Atilde;O</th>
                            <th>TAMANHO</th>
                            <th>SEXO</th>
                            <th>VALOR CARISMA</th>
                            <th>VALOR REPASSE</th>
                            <th>DATA DE CADASTRO</th>
                            <th>DATA DE VENDA</th>
                            <th>DATA DE REPASSE</th>
                            <th>BAIXA</th>
                            <th>REPASSE</th>
                        </tr>
                    </thead>
                    <tbody>
        
		<?php
			$sql = "";
			$sql = $sql . " select * from produto ";
			$sql = $sql . "	 where usuario_id_usuario = $id_usuario order by dt_baixa,dt_repasse , id_produto ";	
			
			foreach($dbh->query($sql) as $row) {
				
				$id_produto = $row['id_produto'];		
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
				
			
		?>
               <tr >
               		<th style="cursor:pointer;" class="editProduto" id="editProduto<?php echo $id_produto; ?>"><?php echo str_pad($id_produto, 6, "0", STR_PAD_LEFT); ?></th>
                    <th style="width:25em;"><?php echo utf8_decode($descricao); ?></th>
                    <th style="width:5em;text-align:center;"><?php echo $idade; ?></th>
                    <th><?php echo $sexo; ?></th>
                    <th style="width:20em;">R$ <?php echo round($preco_loja, 2); ?></th>
                    <th style="width:20em;">R$ <?php echo round($preco_repasse, 2); ?></th>
                    <th><?php echo $dt_cadastro; ?></th>
                    <th><?php echo $dt_baixa; ?></th>
                    <th><?php echo $dt_repasse; ?></th>
                    <th><input type="checkbox" id="baixa<?php echo $id_produto; ?>" <?php if($baixa) { echo 'checked'; } ?> class="baixaProduto"/></th>
                    <th><input type="checkbox" id="repasse<?php echo $id_produto; ?>" <?php if($repasse) { echo 'checked'; } ?> class="repasseProduto"/></th>
               </tr>
                
		<?php
			}
		?>
        		</tbody>
            </table>
        </div>
    </div>
      
	</fieldset>
    
    <br /><br />
    
    <fieldset style="border:1px solid #000; width:1200px; margin:auto;">
    	<legend style="color:#666;">RELAT&Oacute;RIOS</legend>    
    
        <div class="row" style="border:0px solid #000;" align="center">     
            <div class="twelve large-12 columns" style="border:0px solid #000; ">
                <a class="button" href="relat_produtos.php?uid=<?php echo $id_usuario;?>" target="_self">Relat&oacute;rio de Produtos</a> <br />
                <a class="button" href="buscar_vendidos.php?uid=<?php echo $id_usuario;?>" target="_self">Relat&oacute;rio de Produtos Vendidos</a> <br />
                <a class="button" href="buscar_repasse.php?uid=<?php echo $id_usuario;?>" target="_self">Relat&oacute;rio de Repasse</a>
            </div>
        </div>
	</fieldset>    
    
    <div class="row" style="width:1200px; margin:auto; padding-top:1em;">
    	<div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; ">
            <a class="button" href="../index.php">Voltar a Tela Principal</a>
            <a class="button" id="btInserirProduto">Inserir novo Produto</a>
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