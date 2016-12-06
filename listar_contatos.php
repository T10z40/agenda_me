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
</head>
<body>

<table>
	<thead>
		<th>Nome</th>
		<th>Sobrenome</th>
		<th>Criado</th>
		<th>Modificado</th>
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
				echo "<td><form method='POST' action='mostrar_contato.php'><button type='submit' name='mostrar_contato'><input type='hidden' name='id_usuario' value='".$contatos->id."'>Ver</button></form></td>";
				echo "</tr>";
			} while ($contatos = mysqli_fetch_object($verifica_lista));
		} ?>

	</tbody>
</table>

<a class="btn btn-block btn-primary" href="registra_contato.php">Novo Contato</a>

</body>
</html>