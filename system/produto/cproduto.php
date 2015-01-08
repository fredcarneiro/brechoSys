<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]--><head>
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width" />
<title>CADASTRO DE PRODUTOS</title>

<script src='../js/foundation3/jquery.js'></script>
<script src='../js/jquery.maskMoney.js'></script>
<script src='../js/jquery.livequery.js'></script>
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

<script type="text/javascript">

window.opener.location.href=window.opener.location.href;

function atualizaValor(){
	
		var p_repasse = $("#p_repasse").val();
		var p_loja = $("#p_loja").val();
		
		if(!p_repasse){
			p_repasse = 0;
		}else{
			p_repasse = $("#p_repasse").val().replace(',', '.');
			p_repasse = p_repasse.replace('R$', '');
		}
		
		if(!p_loja){
			p_loja = 0;
		}else{
			p_loja = $("#p_loja").val().replace(',', '.');
			p_loja = p_loja.replace('R$', '');
		}
		
		//console.log(p_repasse);
		//console.log(p_loja);

		p_repasse = Number(p_repasse);
		p_loja = Number(p_loja);			
		var p_total = p_repasse + p_loja;
		
		//console.log(p_total);
		
		$("#p_total").val('R$ ' + p_total.toFixed(2).replace('.', ','));


}


$(function(){
 	$("#p_total").maskMoney({symbol:'R$ ', showSymbol:true, decimal:',', symbolStay: true, allowBad: true});
	$("#p_loja").maskMoney({symbol:'R$ ', showSymbol:true, decimal:',', symbolStay: true, allowBad: true});
	$("#p_repasse").maskMoney({symbol:'R$ ', showSymbol:true, decimal:',', symbolStay: true, allowBad: true});
	
	$("#p_repasse").on( "focusout", function() {
		atualizaValor();
	});		
	
	$("#p_loja").on( "focusout", function() {
		atualizaValor();
	});		
	
 })

$(document).ready(function() {
						   
	atualizaValor();
	
	$(".preco").livequery(function(){
		$(this).maskMoney({symbol:'R$ ', showSymbol:true, decimal:',', symbolStay: true, allowBad: true});
		console.log(this.id);
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
$action = $_GET["ac"];
$id_produto = $_GET["pid"];

if(!isset($_GET["ac"])){
	$action = "add";
}

?>

<form id="formProduto" name="formProduto" action="crud.php" method="post">
	<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>"/>
    <input type="hidden" id="id_produto" name="id_produto" value="<?php echo $id_produto; ?>"/>
    <input type="hidden" id="ac" name="ac" value="<?php echo $action; ?>" />
    <div class="row" style="padding-top: 1.563em;">
        <div class="twelve large-12 columns" style="padding-bottom:2em;  padding-left:0px; text-align:center; font-weight:bold;">
            CADASTRO DE PRODUTO
        </div>
    </div>
 	
    <fieldset style="border:1px solid #000; width:800px; margin:auto;">
    	<legend style="color:#666;">DADOS DO PRODUTO</legend>    
    
        <?php
		if ($action == "add"){
		?>        
        
        <div class="row" style="border:0px solid #000;">
            <div class="eleven large-11 columns" style="border:0px solid #000;">
                <label>
                    DESCRI&Ccedil;&Atilde;O:
                    <input type="text" id="d_prod" name="d_prod" />
                </label>
            </div>          
        </div>


        <div class="row" style="border:0px solid #000;">     
            <div class="four large-4 columns" style="border:0px solid #000; ">
                <label>
                    PRE&Ccedil;O REPASSE:
                    <input type="text" id="p_repasse" name="p_repasse" style="width:13em;" />
                </label>
            </div>
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    PRE&Ccedil;O CARISMA:
                    <input type="text" id="p_loja" name="p_loja" style="width:13em;" />
                </label>
            </div>
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    PRE&Ccedil;O TOTAL:
                    <input type="text" id="p_total" name="p_total" style="width:13em;" disabled/>
                </label>
            </div>            
        </div>
        
        <div class="row" style="border:0px solid #000;">     
            <div class="five large-5 columns" style="border:0px solid #000;width:13em; ">
                <label>
                    SEXO:
                    <select id="p_sexo" name="p_sexo">
                        <option value="0">Escolha o Sexo</option>
                        <option value="1">NEUTRO</option>
                        <option value="2">MASCULINO</option>
                        <option value="3">FEMININO</option>
                    </select>
                </label>
            </div>
            <div class="seven large-7 columns" style="border:0px solid #000;width:13em;">
                <label>
                    TAMANHO:
                    <select id="p_idade" name="p_idade">
                        <option value="0">Escolha a Idade</option>
                        <option value="RN">RN</option>
                        <option value="P">P</option>
                        <option value="M">M</option>
                        <option value="G">G</option>
                        <option value="GG">GG</option>
						<?php
					
						for($k=2;$k<=12;$k++){
							
							echo "<option value='$k'>$k</option>";
						
						}
						
						?>                        
                    </select>
                </label>
            </div>
           
        </div> 
        
        <?php
		}else{
			
			$sql = "";
			$sql = $sql . " select * from produto ";
			$sql = $sql . "	 where usuario_id_usuario = $id_usuario and id_produto = $id_produto";	
			
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
				
			
			}
			
			
		?>

        <div class="row" style="border:0px solid #000;">
            <div class="eleven large-11 columns" style="border:0px solid #000;">
                <label>
                    DESCRI&Ccedil;&Atilde;O:
                    <input type="text" id="d_prod" name="d_prod" value="<?php echo $descricao; ?>" />
                </label>
            </div>          
        </div>


        <div class="row" style="border:0px solid #000;">     
            <div class="four large-4 columns" style="border:0px solid #000; ">
                <label>
                    PRE&Ccedil;O REPASSE:
                    <input type="text" id="p_repasse" name="p_repasse" style="width:13em;" value="R$ <?php echo str_replace(".", ",", $preco_repasse); ?>" class="preco"/>
                </label>
            </div>
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    PRE&Ccedil;O CARISMA:
                    <input type="text" id="p_loja" name="p_loja"  style="width:13em;" value="R$ <?php echo str_replace(".", ",",$preco_loja); ?>" class="preco"/>
                </label>
            </div>
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    PRE&Ccedil;O TOTAL:
                    <input type="text" id="p_total" name="p_total" style="width:13em;" disabled class="preco" />
                </label>
            </div>            
        </div>
        
        <div class="row" style="border:0px solid #000;">     
            <div class="five large-5 columns" style="border:0px solid #000;width:13em; ">
                <label>
                    SEXO:
                    <select id="p_sexo" name="p_sexo">
                        <option value="0" <?php if ($sexo == 0){echo "selected";} ?>>Escolha o Sexo</option>
                        <option value="1" <?php if ($sexo == 1){echo "selected";} ?>>NEUTRO</option>
                        <option value="2" <?php if ($sexo == 2){echo "selected";} ?>>MASCULINO</option>
                        <option value="3" <?php if ($sexo == 3){echo "selected";} ?>>FEMININO</option>
                    </select>
                </label>
            </div>
            <div class="seven large-7 columns" style="border:0px solid #000;width:13em;">
                <label>
                    TAMANHO:
                    <select id="p_idade" name="p_idade">
                        <option value="0" <?php if ($idade == 0){echo "selected";} ?>>Escolha a Idade</option>
                        <option value="RN" <?php if ($idade == 'RN'){echo "selected";} ?>>RN</option>
                        <option value="P" <?php if ($idade == 'P'){echo "selected";} ?>>P</option>
                        <option value="M" <?php if ($idade == 'M'){echo "selected";} ?>>M</option>
                        <option value="G" <?php if ($idade == 'G'){echo "selected";} ?>>G</option>
                        <option value="GG" <?php if ($idade == 'GG'){echo "selected";} ?>>GG</option>
						<?php
					
						for($k=2;$k<=12;$k++){
						
						?>
							<option value='<?php echo $k; ?>' <?php if ($idade == $k){echo "selected";} ?> ><?php echo $k; ?></option>
						<?php
						}
						
						?>                        
                    </select>
                </label>
            </div>
           
        </div>


        <?php
		}
		?>


	</fieldset>
    
    
    <div class="row" style="width:800px; margin:auto; padding-top:1em;">
    	<div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; ">
        	<a class="button" onClick="formProduto.submit();">Salvar</a>
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