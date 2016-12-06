<?php include 'conecta.php';

$lista = "SELECT * FROM empresas";
$verifica_lista=mysqli_query($connect, $lista);

$empresas = mysqli_fetch_object($verifica_lista);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
	<script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
	<title>Lista de Empresas</title>
</head>
<body>
<div class="col-md-12 text-center"><legend style="font-size: 30px;">Lista de Empresas</legend>
<table class="table table-responsive table-hover">
	<thead>
		<th class="text-center">Nome</th>
		<th class="text-center">Telefone</th>
		<th class="text-center">Ações</th>
	</thead>
	<tbody>
		<?php
			if ($empresas != NULL){ 
				do {
					?>
					<tr>
						<td><?php echo $empresas->nome;  ?> </td>
						<td><?php echo $empresas->telefone;  ?> </td>
						<td><form method="POST" name="excluir_empresa" action="excluir_empresas.php"><button type='submit' name='bt_excluir_empresa' class="btn btn-xs btn-danger"><input type="hidden" name="id_empresa" value='<?php echo $empresas->id ?>'>Excluir</button></form>
					</tr>
				<?php } while ($empresas = mysqli_fetch_object($verifica_lista));
			}
		?>
		
	</tbody>
</table>
<br>
<legend style="font-size: 30px;">Nova Empresa</legend><br>
<form class="form-group" method="POST" action="adiciona_empresa.php" name="nova_empresa">
	<div class="col-md-9 col-md-offset-2">
	<div class="col-md-4"><input class="form-control" type="text" name="nome_empresa" placeholder="NOME"></div>
	<div class="col-md-4"><input class="form-control" type="text" name="telefone_empresa" placeholder="TELEFONE"></div>
	<div class="col-md-1 text-center"><button class="btn btn-primary" style="margin-left: 20px;" type="submit" value="submit" name="envia_empresa">Enviar</button>
	</div></div>
</form>
</div>
</body>
</html>