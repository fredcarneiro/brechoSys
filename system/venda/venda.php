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


?>

<form id="formVenda" name="formVenda" action="gravar.php" method="post">

	<div id="dadosForm"></div>  

    <div class="row" style="padding-top: 1.563em;">
        <div class="twelve large-12 columns" style="padding-bottom:2em;  padding-left:0px; text-align:center; font-weight:bold;">
            VENDA
        </div>
    </div>

    <fieldset style="border:1px solid #000; width:800px; margin:auto;" id="enderecos">
    	<legend style="color:#666;">BUSCA DE PRODUTOS</legend>    
        <div class="row" style="border:0px solid #000;">     
            <div class="twelve large-12 columns" style="border:0px solid #000; ">
				<input type="text" id="topic_title" />
            </div>        
        </div> 
        
	</fieldset>
    
    <br /> <br /> <br />
 
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
                            <th>A&Ccedil;&Atilde;O</th>
                        </tr>
                    </thead>
                    <tbody id='insertProdutos'></tbody>
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
                    <input type="text" id="p_total" name="p_total" placeholder="Preço total" disabled />
                </label>
            </div>
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    DESCONTO (%):
                    <input type="text" id="desconto" name="desconto" placeholder="Desconto" class="descontoProduto" />
                </label>
            </div>    
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    VALOR DA COMPRA	:
                    <input type="text" id="v_compra" name="v_compra" placeholder="Valor da Compra" />
                </label>
            </div>                                
        </div>
        
        <div class="row" style="border:0px solid #000;">
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    TIPO DE PAGAMENTO:
                    <select id="tp_pagamento" name="tp_pagamento">
                    	<option value="1">DINHEIRO</option>
                        <option value="2">CR&Eacute;DITO</option>
                        <option value="3">D&Eacute;BITO</option>
                    </select>

                </label>
            </div>
            <div class="four large-4 columns" style="border:0px solid #000;">
                <label>
                    PARCELAS:
                    <select id="parcelas" name="parcelas">
                    	<option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>                        
                    </select>
                </label>
            </div>                      
        </div>        
      
	</fieldset>    
    
    <div class="row" style="width:800px; margin:auto; padding-top:1em;">
    	<div class="twelve large-12 columns" style="border:0px solid #000; text-align:center; ">
            <a class="button" href="../index.php">Voltar a Tela Principal</a>
            <a class="button" onClick="formVenda.submit();">GERAR VENDA</a>
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