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
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
	<script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
	<title>Contato</title>
	<div class="col-md-12 text-center"><legend style="font-size: 30px;">Contato</legend></div>
</head>
<body>

<table class="table table-responsive table-bordered table-hover">
	<thead>
		<th class="text-center">Nome</th>
		<th class="text-center">Sobrenome</th>
		<th class="text-center">Cep</th>
		<th class="text-center">Rua</th>
		<th class="text-center">Número</th>
		<th class="text-center">Bairro</th>
		<th class="text-center">Cidade</th>
		<th class="text-center">Estado</th>
		<th class="text-center">Criado</th>
		<th class="text-center">Modificado</th>
		<th class="text-center">Empresa</th>
		<th class="text-center">Ações</th>
	</thead>
	<tbody>
			<?php if ($contato != NULL){ ?>
			<tr>
			<td class="text-center"><?php echo $contato->nome; ?> </td>
			<td class="text-center"><?php echo $contato->sobrenome; ?> </td>
			<td class="text-center"><?php echo $contato->cep; ?> </td>
			<td class="text-center"><?php echo $contato->rua; ?> </td>
			<td class="text-center"><?php echo $contato->numero; ?> </td>
			<td class="text-center"><?php echo $contato->bairro; ?> </td>
			<td class="text-center"><?php echo $contato->cidade; ?> </td>
			<td class="text-center"><?php echo $contato->estado; ?> </td>
			<td class="text-center"><?php echo $contato->criado; ?> </td>
			<td class="text-center"><?php echo $contato->modificado; ?> </td>
			<td class="text-center"><?php echo $contato_empresa->nome; ?> </td>
			<td class="text-center"><form method="POST" name="editar_contato" action="editar_contato.php"><button type='submit' class='btn btn-xs btn-success' style="margin-bottom: 5px;" name='bt_editar_contato'><input type="hidden" name="id_contato" value='<?php echo $contato->id ?>'>Editar</button></form>
			<form method="POST" name="excluir_contato" action="excluir_contato.php"><button type='submit' class="btn btn-xs btn-danger" name='bt_excluir_contato'><input type="hidden" name="id_contato" value='<?php echo $contato->id ?>'>Excluir</button></form></td>
			<?php } ?>
			</tr>
	</tbody>
</table>

<div class="col-md-12 text-center"><legend style="font-size: 30px;">Telefones</legend></div>

<table class="table table-responsive table-bordered table-hover"
	<thead>
		<th class="text-center">Número</th>
		<th class="text-center">Tipo</th>
		<th class="text-center">Ações</th>
	</thead>
	<tbody>
		<?php
			
			do { ?>

				<?php if($telefone->id){ ?>
				<tr>
				<td class="text-center"><?php echo $telefone->numero; ?> </td>
				<td class="text-center"><?php echo $telefone->tipo; ?> </td>
				<td class="text-center"><form method="POST" name="excluir_telefone" action="excluir_telefone.php"><button type='submit' class="btn btn-xs btn-danger text-center" name='bt_excluir_telefone'><input type="hidden" name="id_telefone" value='<?php echo $telefone->id ?>'>Excluir</button></form></td>
				<?php } ?>
			<?php } while ($telefone = mysqli_fetch_object($verifica_telefone));
		?>
		</tr>
	</tbody>
</table><br>
	<div class="col-md-4 col-md-offset-4"><form class="form-group" method="POST" name="adicionar_telefone" action="adicionar_telefone.php"><legend>Adicionar outro Telefone:</legend></div>
				<div class="col-md-4 col-md-offset-4"><input type="text" class="form-control" style="margin-bottom: 5px;" name="novo_telefone" placeholder="TELEFONE"></div>
				<div class="col-md-4 col-md-offset-4"><select class="form-control" style="margin-bottom: 5px;" name="tipo_telefone_contato">
				<option value="Residencial">Residencial</option>
				<option value="Celular">Celular</option>
				<option value="Trabalho">Trabalho</option>
			</select></div>
		<div class="col-md-4 col-md-offset-4"><button style="margin-bottom: 30px;"class="form-control btn btn-primary" type='submit' name='bt_adicionar_telefone'><input type="hidden" name="id_contato" value='<?php echo $contato->id ?>'>Adicionar</button></div></form></div><br>

<div class="col-md-12 text-center"><legend style="font-size: 30px;">E-Mails</legend></div>

<table class="table table-responsive table-bordered table-hover"
	<thead>
		<th class="text-center">E-Mail</th>
		<th class="text-center">Ações</th>
	</thead>
	<tbody>
		<?php
			
			do { ?>
				<?php if($email->id){ ?>
				<tr>
				<td class="text-center"><?php echo $email->email; ?> </td>
				<td class="text-center"><form method="POST" name="excluir_email" action="excluir_email.php"><button type='submit' class="btn btn-xs btn-danger" name='bt_excluir_email'><input type="hidden" name="id_email" value='<?php echo $email->id ?>'>Excluir</button></form></td>
				<?php } ?>
			<?php } while ($email = mysqli_fetch_object($verifica_email));
		?>
	</tr>
	</tbody>
</table><br>
	

	<div class="col-md-4 col-md-offset-4"><form class="form-group" method="POST" name="adicionar_email" action="adicionar_email.php"><legend>Adicionar outro E-Mail:</legend></div>
			<div class="col-md-4 col-md-offset-4"><input type="text" class="form-control" style="margin-bottom: 5px;" name="novo_email" placeholder="E-MAIL"></div>
	<div class="col-md-4 col-md-offset-4"><button class="form-control btn btn-primary" type='submit' style="margin-bottom: 30px;" name='bt_adicionar_email'><input type="hidden" name="id_contato" value='<?php echo $contato->id ?>'>Adicionar</button></div></form></div>
	

</body>
</html>