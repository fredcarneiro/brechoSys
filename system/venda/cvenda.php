<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]--><head>
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width" />
<title>VENDA</title>

<script src='../js/foundation3/jquery.js'></script>
<script src='../js/autocomplete/jquery-ui.min.js'></script>
<script src='../js/autocomplete/jquery.ui.autocomplete.html.js'></script>
<script src='../js/autocomplete/jquery.ui.touch-punch.min.js'></script>

<!-- AUTOCOMPLETE INCLUDES -->
<link rel="stylesheet" href="../js/autocomplete/autocomplete.css">
<link rel="stylesheet" href="../js/autocomplete/jquery-ui.css">

<script src='../js/autocomplete/autocomplete.js'></script>

<!-- AUTOCOMPLETE INCLUDES -->



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
$(document).ready(function() {
						   
				   

});

</script>

</head>

<body>

<?php
error_reporting(E_ALL ^ E_NOTICE);
include '../lib/conn.php'; 

$dbh = conn();

$id_venda = $_GET["vid"];

if(isset($id_venda)){
	

	$sql = "";
	$sql = $sql . " select * from venda ";
	$sql = $sql . "	 where id_venda = $id_venda ";
	
	foreach($dbh->query($sql) as $row) {
		$valor = $row['valor'];
		$desconto = $row['desconto'];
		$valor_total = $row['valor_total'];
		$dt_venda = $row['dt_venda'];
		$tp_pagamento = $row['tp_pagamento'];
		$parcelas = $row['parcelas'];

		$dt_venda = substr($dt_venda, 0, -4).'-'.substr($dt_venda, 4, 2).'-'.substr($dt_venda, -2);
		$dt_venda2 = substr($row['dt_venda'], -2).'/'.substr($row['dt_venda'], 4, 2).'/'.substr($row['dt_venda'], 0, -4);

	}
	
}


?>

<form id="formVenda" name="formVenda" action="gravar.php" method="post">

	<div id="dadosForm"></div>  

    <div class="row" style="padding-top: 1.563em;">
        <div class="twelve large-12 columns" style="padding-bottom:2em;  padding-left:0px; text-align:center; font-weight:bold;">
            VENDA
        </div>
    </div>

   	<fieldset style="border:1px solid #000; width:800px; margin:auto;" id="enderecos">
    	<legend style="color:#666;">PRODUTOS</legend>    
    
        <div class="row" style="border:0px solid #000;">     
        	<div class="twelve large-12 columns" style="border:0px solid #000; " align="center">
                
                             
                
                <table align="center">
                    
                    <thead >
                        <tr>
                            <th>C&Oacute;DIGO</th>
                            <th>DESCRI&Ccedil;&Atilde;O</th>
                            <th>TAMANHO</th>
                            <th>SEXO</th>
                            <th>VALOR DO PRODUTO</th>
                        </tr>
                    </thead>
                    <tbody id='insertProdutos'>
     				<?php               
						
						$sql = "";
						$sql = $sql . " select * from item_venda ";
						$sql = $sql . "	 where venda_id_venda = $id_venda ";
						
						foreach($dbh->query($sql) as $row) {
							
							$id_produto = $row['produto_id_produto'];
							

							$sql = "";
							$sql = $sql . " select * from produto ";
							$sql = $sql . "	 where id_produto = $id_produto ";	
							
							foreach($dbh->query($sql) as $row) {
								
								$descricao = $row['descricao'];
								$idade = $row['idade'];
								$preco_loja = round($row['preco_loja'], 2);
								$preco_repasse = round($row['preco_repasse'], 2);
								
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
								
								$total = $preco_repasse + $preco_loja;
								
								
								$th = "";
								$th = $th . " <tr> ";
								$th = $th . " <th> " . str_pad($id_produto, 6, "0", STR_PAD_LEFT). " </th>";
								$th = $th . " <th> " . utf8_decode($descricao) . " </th>";
								$th = $th . " <th> " . $idade . " </th>";
								$th = $th . " <th> " . $sexo . " </th>";
								$th = $th . " <th> R$ " . $total . " </th>";
								$th = $th . " </tr> ";	
								
								echo $th;
						
						
							}								
					
						}                    
                    ?>
                    </tbody>
            	</table>
			</div>
    	</div>
      
	</fieldset>
    
    <br /> <br /> <br />
 
    <fieldset style="border:1px solid #000; width:800px; margin:auto;" id="enderecos">
    	<legend style="color:#666;">GERAL</legend>    
    
        <div class="row" style="border:0px solid #000;">
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    PRE&Ccedil;O TOTAL:
                    <input type="text" id="p_total" name="p_total" disabled value="<?php echo $valor_total; ?>"/>
                </label>
            </div>
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    DESCONTO (%):
                    <input type="text" id="desconto" name="desconto" class="descontoProduto" value="<?php echo $desconto; ?>" disabled />
                </label>
            </div>    
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    VALOR DA COMPRA:
                    <input type="text" id="v_compra" name="v_compra" value="<?php echo $valor; ?>" disabled />
                </label>
            </div>                                
        </div>
        
        <div class="row" style="border:0px solid #000;">
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    TIPO DE PAGAMENTO:
                    <select id="tp_pagamento" name="tp_pagamento" disabled>
                    	<option value="1" <?php if ($tp_pagamento == "1"){echo "selected";} ?> >DINHEIRO</option>
                        <option value="2" <?php if ($tp_pagamento == "2"){echo "selected";} ?> >CR&Eacute;DITO</option>
                        <option value="3" <?php if ($tp_pagamento == "3"){echo "selected";} ?> >D&Eacute;BITO</option>
                    </select>

                </label>
            </div>
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    PARCELAS:
                    <select id="parcelas" name="parcelas" disabled>
                    	<option value="1" <?php if ($parcelas == "1"){echo "selected";} ?> >01</option>
                        <option value="2" <?php if ($parcelas == "2"){echo "selected";} ?> >02</option>
                        <option value="3" <?php if ($parcelas == "3"){echo "selected";} ?> >03</option>
                        <option value="4" <?php if ($parcelas == "4"){echo "selected";} ?> >04</option>
                        <option value="5" <?php if ($parcelas == "5"){echo "selected";} ?> >05</option>
                        <option value="5" <?php if ($parcelas == "6"){echo "selected";} ?> >06</option>                        
                    </select>
                </label>
            </div>                      
        </div>        
      
	</fieldset> 
    
    <br /> <br /> <br />
    
    <fieldset style="border:1px solid #000; width:800px; margin:auto;" id="enderecos">
    	<legend style="color:#666;">PARCELAS</legend> 
        <center> 
        <table align='center'>
                <thead> 
                    <tr> 
                        <th>N. DE PARCELAS</th> 
                        <th>VALOR DAS PARCELAS</th> 
                        <th>DATA DE BAIXA</th> 
                    </tr> 
                </thead> 
             <tbody> 
             <?php
			$sql = "";
			$sql = $sql . " select * from pagamento ";
			$sql = $sql . "	 where venda_id_venda = $id_venda ";	
			$sql = $sql . "	order by venda_id_venda, dt_vencimento ";
			
			//echo $sql;
			
			foreach($dbh->query($sql) as $row) {
				
				$dt_parcela = $row['dt_vencimento'];
				$dt_baixa = $row['dt_baixa'];
				
				$dt_parcela = substr($dt_parcela, -2).'/'.substr($dt_parcela, 4, 2).'/'.substr($dt_parcela, 0, -4);
				//$valor_parcela = $row['valor_parcela'];
				
				$valor = round($row['valor_parcela']/$parcelas, 2);
				
			
				$valor_parcela = number_format($valor, 2, ',', '.');
				
				$parcela = $row['parcela'];		
				
				if(!$dt_baixa || trim($dt_baixa) == ''){
					$dt_baixa = "N/BAIXADO";
				}else{
					$dt_baixa = substr($dt_baixa, -2).'/'.substr($dt_baixa, 4, 2).'/'.substr($dt_baixa, 0, -4);
				}
		
								
				echo " <tr> ";
				echo " 	<th style='width:5em;text-align:center;'>".$parcelas."</th> ";
				echo " 	<th>R$ ".$valor_parcela."</th> ";
				echo " 	<th > ".$dt_venda2." </th> ";
				echo " </tr> ";
				
				
			}
			 
			 ?>
             </tbody>
		</table>          
     	</center>
	</fieldset>       
    
    <div class="row" style="width:800px; margin:auto; padding-top:1em;">
    	<div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; ">
            <a class="button" href="../index.php">Voltar a Tela Principal</a>
            <a class="button" onClick="window.print();">IMPRIMIR</a>
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