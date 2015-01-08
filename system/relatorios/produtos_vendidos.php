<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]--><head>
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width" />
<title>PRODUTOS VENDIDOS</title>

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
$sql = $sql . "	sysbrejo.usuario a inner join sysbrejo.produto b on a.id_usuario = b.usuario_id_usuario ";
$sql = $sql . " WHERE ";
$sql = $sql . "	dt_baixa is not null and substring(dt_baixa,1,4) = '$ano' and substring(dt_baixa,5,2) = '$mes'";
$sql = $sql . " order by ";
$sql = $sql . " a.nm_usuario, b.descricao, b.dt_cadastro ";

?>
<div class="row" style="padding-top: 1.563em;">
    <div class="twelve large-12 columns" style="padding-bottom:2em;  padding-left:0px; text-align:center; font-weight:bold;">
        RELAT&Oacute;RIO DE PRODUTOS VENDIDOS
    </div>
</div>
<hr />
<div class="row" style="padding-top: 1.563em;">
    <div class="twelve large-12 columns">
        <table>
            <thead>
                <tr>
                    <th>FORNECEDOR</th>
                    <th>C&Oacute;DIGO DO PRODUTO</th>
                    <th>DESCRI&Ccedil;&Atilde;O</th>
                    <th>TAMANHO</th>
                    <th>SEXO</th>
                    <th>VALOR CARISMA</th>
                    <th>VALOR REPASSE</th>
                    <th>VALOR DE VENDA</th>
                    <th>DATA DE VENDA</th>
                </tr>
            </thead>
        
        	<tbody>
        	<?php
			foreach($dbh->query($sql) as $row) {
			
				$id_usuario = $row['id_usuario'];
				$nm_usuario = $row['nm_usuario'];
				
				$id_produto = $row['id_produto'];
				$desc_produto = $row['descricao'];
				$tamanho_produto = $row['idade'];
				
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
				
				$valor_carisma = round($row['preco_loja'], 2);
				$valor_repasse = round($row['preco_repasse'], 2);
				$valor_total = $valor_carisma + $valor_repasse;
				
				$valor_total = number_format($valor_total, 2, ',', '.');
				
				$dt_cadastro = substr($row['dt_baixa'], -2).'/'.substr($row['dt_baixa'], 4, 2).'/'.substr($row['dt_baixa'], 0, -4);
			
			?>

               <tr >
               		<th><a href="../usuario/cadastro.php?uid=<?php echo $id_usuario; ?>" target="_self"><?php echo $nm_usuario; ?></a></th>
                    <th style="width:25em;"><a href="../produto/produto.php?uid=<?php echo $id_usuario; ?>" target="_self"><?php echo str_pad($id_produto, 6, "0", STR_PAD_LEFT); ?></a></th>
					<th style="width:25em;"><?php echo utf8_decode($desc_produto); ?></th>
                    <th style="width:5em;text-align:center;"><?php echo $tamanho_produto; ?></th>
                    <th><?php echo $sexo; ?></th>
                    <th style="width:20em;">R$ <?php echo $valor_carisma; ?></th>
                    <th style="width:20em;">R$ <?php echo $valor_repasse; ?></th>
                    <th style="width:20em;">R$ <?php echo $valor_total; ?></th>                    
                    <th><?php echo $dt_cadastro; ?></th>
               </tr>

            
            <?php
			}
			?>
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