<?php include 'conecta.php';

$lista = "SELECT * FROM contatos";
$verifica_lista=mysqli_query($connect, $lista);

$contatos = mysqli_fetch_object($verifica_lista);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
	<script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
	<title>Lista de Contatos</title>
	<div class="col-md-12 text-center"><legend style="font-size: 30px;">Lista de Contatos</legend>
</head>
<body>

<table class="table table-responsive table-bordered table-hover">
	<thead>
		<th class="text-center">Nome</th>
		<th class="text-center">Sobrenome</th>
		<th class="text-center">Criado</th>
		<th class="text-center">Modificado</th>
		<th class="text-center">Ações</th>
	</thead>
	<tbody>
		<?php
		if ($contatos != NULL){
			do {
				echo "<tr>";
				echo "<td>".$contatos->nome."</td>";
				echo "<td>".$contatos->sobrenome."</td>";
				echo "<td>".$contatos->criado."</td>";
				echo "<td>".$contatos->modificado."</td>";
				echo "<td><form method='POST' action='mostrar_contato.php'><button style='margin-left: 20px;' class='btn btn-xs btn-info' type='submit' name='mostrar_contato'><input type='hidden' name='id_usuario' value='".$contatos->id."'>Ver</button></form></td>";
				echo "</tr>";
			} while ($contatos = mysqli_fetch_object($verifica_lista));
		} ?>

	</tbody>
</table>
<br><br>
<div class="col-md-4 col-md-offset-4 text-center"><a class="btn btn-block btn-primary" href="registra_contato.php">Novo Contato</a></div></div>

</body>
</html>