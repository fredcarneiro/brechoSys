<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]--><head>
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width" />
<title>RELAT&Oacute;RIO DE GANHOS MENSAL</title>

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
$(document).ready(function() {
	
	$('#buscar').click(function(){sendform('buscar');});
	
	
});
</script>

</head>

<body>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include '../lib/conn.php'; 

$dbh = conn();

$ano = $_POST['ano'];
$mes = $_POST['mes'];

$sql = " SELECT * FROM ";
$sql = $sql . "	venda ";
$sql = $sql . " WHERE ";
$sql = $sql . "	substring(dt_venda,1,4) = '$ano' and substring(dt_venda,5,2) = '$mes'";
$sql = $sql . " order by ";
$sql = $sql . " dt_venda ";

?>
<div class="row" style="padding-top: 1.563em;">
    <div class="twelve large-12 columns" style="padding-bottom:2em;  padding-left:0px; text-align:center; font-weight:bold;">
    	RELAT&Oacute;RIO DE GANHOS MENSAL
    </div>
</div>
<hr />
<div class="row" style="padding-top: 1.563em;">
    <div class="twelve large-12 columns">
        <table>
            <thead>
                <tr>
                    <th>VENDA</th>
                    <th>VALOR</th>
                    <th>DESCONTO</th>
                    <th>VALOR TOTAL</th>
                    <th>VALOR DE REPASSE</th>
                    <th>VALOR GANHO</th>
                    <th>DATA DA VENDA</th>
                    <th>TIPO DE PAGAMENTO</th>
                    <th>PARCELAS</th>
				</tr>
            </thead>
        
        	<tbody>
        	<?php
			foreach($dbh->query($sql) as $row) {
			
				$id_venda = $row['id_venda'];
				
				$valor = $row['valor'];
				$desconto = $row['desconto'];
				$valor_total = $row['valor_total'];
				$parcelas = $row['parcelas'];


				$t_valor_total = $t_valor_total + $valor_total;


				switch ($row['tp_pagamento']) {
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
				
				$dt_venda = substr($row['dt_venda'], -2).'/'.substr($row['dt_venda'], 4, 2).'/'.substr($row['dt_venda'], 0, -4);
				
				
				
				$sql = "";
				$sql = $sql . " select * from item_venda ";
				$sql = $sql . "	 where venda_id_venda = $id_venda ";
				
				$valor_repasse = 0;
				$valor_ganho = 0;
				
				foreach($dbh->query($sql) as $row) {
					
					$id_produto = $row['produto_id_produto'];
					

					$sql = "";
					$sql = $sql . " select * from produto ";
					$sql = $sql . "	 where id_produto = $id_produto ";	
					
					foreach($dbh->query($sql) as $row) {

						$valor_ganho = $valor_ganho + $row['preco_loja'];
						$valor_repasse = $valor_repasse + $row['preco_repasse'];
						
						$t_valor_ganho = $t_valor_ganho + $valor_ganho;
						$t_valor_repasse = $t_valor_repasse + $valor_repasse;						
					
			
					}								
			
				}				
				
				
			
			?>

               <tr >
               		<th><a href="../venda/cvenda.php?vid=<?php echo $id_venda; ?>" target="_self"><?php echo str_pad($id_venda, 6, "0", STR_PAD_LEFT); ?></th>
                    <th style="width:25em;">R$ <?php echo number_format($valor, 2, ',', '.'); ?></th>
					<th style="width:25em;">R$ <?php echo $desconto; ?></th>
                    <th style="width:25em;text-align:center;">R$ <?php echo number_format($valor_total, 2, ',', '.'); ?></th>
                    <th style="width:25em;">R$ <?php echo number_format($valor_repasse, 2, ',', '.'); ?></th>
                    <th style="width:25em;">R$ <?php echo number_format($valor_ganho, 2, ',', '.'); ?></th>
                    <th style="width:20em;"><?php echo $dt_venda; ?></th>
                    <th style="width:20em;"><?php echo $tp_pagamento; ?></th>                    
                    <th><?php echo $parcelas; ?></th>
               </tr>

            
            <?php
			}
			?>
        	</tbody>
        </table>
    </div>
</div>

<div class="row" style="padding-top: 1.563em;">
    <div class="twelve large-12 columns" align="center">
        <table>
            <thead>
                <tr>
                    <th>VALOR TOTAL DE VENDAS</th>
                    <th>VALOR DE REPASSE TOTAL</th>
                    <th>VALOR GANHO TOTAL</th>
				</tr>
            </thead>
        
        	<tbody>
            
                    <th>R$ <?php echo number_format($t_valor_total, 2, ',', '.'); ?></th>
                    <th>R$ <?php echo number_format($t_valor_repasse, 2, ',', '.'); ?></th>
                    <th>R$ <?php echo number_format($t_valor_ganho, 2, ',', '.'); ?></th>            
            
        	</tbody>
        </table>
    </div>
</div>            
 	
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