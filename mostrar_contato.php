<?php include 'conecta.php';

if (isset($_POST['mostrar_contato'])) {
	$id = $_POST['id_usuario'];

	$selecionado = "SELECT * FROM contatos WHERE id = '$id'";
	$verifica_contato=mysqli_query($connect, $selecionado);

	$contato = mysqli_fetch_object($verifica_contato);

	$query_telefone = "SELECT * FROM telefone WHERE id_contato = '$id'";
	$verifica_telefone = mysqli_query($connect, $query_telefone);

	$telefone = mysqli_fetch_object($verifica_telefone);

	$query_email = "SELECT * FROM emails WHERE id_contato = '$id'";
	$verifica_email = mysqli_query($connect, $query_email);

	$email = mysqli_fetch_object($verifica_email);

	$query_contato_empresa="SELECT empresas.nome FROM empresas INNER JOIN contatos ON empresas.id=contatos.id_empresa WHERE empresas.id='$contato->id_empresa'";
	$verifica_contato_empresa=mysqli_query($connect, $query_contato_empresa);

	$contato_empresa = mysqli_fetch_object($verifica_contato_empresa);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Contato</title>
</head>
<body>

<h3>Contato</h3>

<table>
	<thead>
		<th>Nome</th>
		<th>Sobrenome</th>
		<th>Cep</th>
		<th>Criado</th>
		<th>Modificado</th>
		<th>Empresa</th>
		<th>Ações</th>
	</thead>
	<tbody>
			<?php if ($contato != NULL){ ?>
			<tr>
			<td><?php echo $contato->nome; ?> </td>
			<td><?php echo $contato->sobrenome; ?> </td>
			<td><?php echo $contato->cep; ?> </td>
			<td><?php echo $contato->criado; ?> </td>
			<td><?php echo $contato->modificado; ?> </td>
			<td><?php echo $contato_empresa->nome; ?> </td>
			<td><form method="POST" name="editar_contato" action="editar_contato.php"><button type='submit' name='bt_editar_contato'><input type="hidden" name="id_contato" value='<?php echo $contato->id ?>'>Editar</button></form></td>
			<td><form method="POST" name="excluir_contato" action="excluir_contato.php"><button type='submit' name='bt_excluir_contato'><input type="hidden" name="id_contato" value='<?php echo $contato->id ?>'>Excluir</button></form></td>
			<?php } ?>
			</tr>
	</tbody>
</table>

<h3>Telefones</h3>

<table>
	<thead>
		<th>Número</th>
		<th>Tipo</th>
		<th>Ações</th>
	</thead>
	<tbody>
		<?php
			
			do { ?>

				<?php if($telefone->id){ ?>
				<tr>
				<td><?php echo $telefone->numero; ?> </td>
				<td><?php echo $telefone->tipo; ?> </td>
				<td><form method="POST" name="excluir_telefone" action="excluir_telefone.php"><button type='submit' name='bt_excluir_telefone'><input type="hidden" name="id_telefone" value='<?php echo $telefone->id ?>'>Excluir</button></form></td>
				<?php } ?>
			<?php } while ($telefone = mysqli_fetch_object($verifica_telefone));
		?>
		</tr>
	</tbody>
</table><br>
	<form method="POST" name="adicionar_telefone" action="adicionar_telefone.php"><label>Adicionar outro Telefone:<br>
				<input type="text" name="novo_telefone" placeholder="TELEFONE"><select name="tipo_telefone_contato">
				<option value="Residencial">Residencial</option>
				<option value="Celular">Celular</option>
				<option value="Trabalho">Trabalho</option>
			</select>
		</label><button type='submit' name='bt_adicionar_telefone'><input type="hidden" name="id_contato" value='<?php echo $contato->id ?>'>Adicionar</button></form></tr>

<h3>E-Mails</h3>
<table>
	<thead>
		<th>E-Mail</th>
		<th>Ações</th>
	</thead>
	<tbody>
		<?php
			
			do { ?>
				<?php if($email->id){ ?>
				<tr>
				<td><?php echo $email->email; ?> </td>
				<td><form method="POST" name="excluir_email" action="excluir_email.php"><button type='submit' name='bt_excluir_email'><input type="hidden" name="id_email" value='<?php echo $email->id ?>'>Excluir</button></form></td>
				<?php } ?>
			<?php } while ($email = mysqli_fetch_object($verifica_email));
		?>
	</tr>
	</tbody>
</table><br>
	

	<form method="POST" name="adicionar_email" action="adicionar_email.php"><label>Adicionar outro E-Mail:<br>
			<input type="text" name="novo_email" placeholder="E-MAIL">
	</label><button type='submit' name='bt_adicionar_email'><input type="hidden" name="id_contato" value='<?php echo $contato->id ?>'>Adicionar</button></form>
	

</body>
</html>