<?php include 'conecta.php';

if (isset($_POST['bt_editar_contato'])) {
	$id = $_POST['id_contato'];

	$query_contatos = "SELECT * FROM contatos WHERE id = '$id'";
	$verifica_contatos=mysqli_query($connect, $query_contatos);

	$contatos = mysqli_fetch_object($verifica_contatos);


	$query_empresas = "SELECT * FROM empresas";
	$verifica_empresas=mysqli_query($connect, $query_empresas);

	$empresas = mysqli_fetch_object($verifica_empresas);

	
	$query_contato_empresa="SELECT empresas.nome, empresas.id FROM empresas INNER JOIN contatos ON empresas.id=contatos.id_empresa WHERE empresas.id='$contatos->id_empresa'";
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
	<title>Editar Contato</title>
	<div class="col-md-12 text-center"><legend style="font-size: 30px;">Editar Contato</legend></div>
</head>
<body>
	<div class="col-md-9 col-md-offset-2"><form class="form-group" method="POST" action="update_contato.php" name="envia_contato">
		<div class="col-md-5 col-md-offset-3"><input class="form-control"type="hidden" name="id" value="<?php echo $id; ?>"></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="nome_contato" value="<?php echo $contatos->nome; ?>"></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="sobrenome_contato" value="<?php echo $contatos->sobrenome; ?>"></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="cep_contato" value="<?php echo $contatos->cep; ?>"></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="rua_contato" value="<?php echo $contatos->rua; ?>"></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="numero_contato" value="<?php echo $contatos->numero; ?>"></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="bairro_contato" value="<?php echo $contatos->bairro; ?>"></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" style="margin-bottom: 20px;" type="text" name="cidade_contato" value="<?php echo $contatos->cidade; ?>"></div>
		
		
		<div class="col-md-5 col-md-offset-3"><legend>Selecione o Estado:</legend></div>
		<div class="col-md-5 col-md-offset-3"><select class="form-control" style="margin-bottom: 20px;" name="estado_contato">
			<option value="<?php echo $contatos->estado; ?>"><?php echo $contatos->estado; ?></option>
			<option value="AC">AC</option>
			<option value="AL">AL</option>
			<option value="AM">AM</option>
			<option value="AP">AP</option>
			<option value="BA">BA</option>
			<option value="CE">CE</option>
			<option value="DF">DF</option>
			<option value="ES">ES</option>
			<option value="GO">GO</option>
			<option value="MA">MA</option>
			<option value="MT">MT</option>
			<option value="MS">MS</option>
			<option value="MG">MG</option>
			<option value="PA">PA</option>
			<option value="PB">PB</option>
			<option value="PR">PR</option>
			<option value="PE">PE</option>
			<option value="PI">PI</option>
			<option value="RJ">RJ</option>
			<option value="RN">RN</option>
			<option value="RS">RS</option>
			<option value="RO">RO</option>
			<option value="RR">RR</option>
			<option value="SC">SC</option>
			<option value="SP">SP</option>
			<option value="SE">SE</option>
			<option value="TO">TO</option>
		</select></div><br>

		<div class="col-md-5 col-md-offset-3"><legend>Selecione a Empresa:</legend></div>
		<div class="col-md-5 col-md-offset-3"><select class="form-control" style="margin-bottom: 20px;" name="empresa_contato">Selecione a Empresa:
			<?php

				echo "<option value='".$contato_empresa->id."'>".$contato_empresa->nome."</option>";
				do {
					echo "<option value='".$empresas->id."'>".$empresas->nome."</option>";

				} while ($empresas = mysqli_fetch_object($verifica_empresas)); 
			?>

		</select></div>
		</label><br>


	<div class="col-md-5 col-md-offset-3"><button class="form-control btn btn-primary" type="submit" value="submit" name="envia_contato">Salvar</button></div>
	</form></div>
</div>
</body>
</html>