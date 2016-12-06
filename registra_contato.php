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
	<title>Agenda</title>
	<div class="col-md-12 text-center"><legend style="font-size: 30px;">Agenda</legend></div>s
</head>
<body>
	<div class="col-md-9 col-md-offset-2"><form method="POST" class="form-group" action="adiciona_contato.php" name="novo_contato">
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="nome_contato" placeholder="NOME"><br></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="sobrenome_contato" placeholder="SOBRENOME"><br></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="email_contato" placeholder="E-MAIL"><br></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="cep_contato"	placeholder="CEP"><br></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="rua_contato" placeholder="RUA"><br></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="numero_contato" placeholder="NUMERO"><br></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="bairro_contato" placeholder="BAIRRO"><br></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" style="margin-bottom: 20px;" type="text" name="cidade_contato" placeholder="CIDADE"><br></div>
		
		<div class="col-md-5 col-md-offset-3"><legend>Selecione o Estado:</legend></div>
		<div class="col-md-5 col-md-offset-3"><select class="form-control" style="margin-bottom: 20px;" name="estado_contato">
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
		</select></div>
		
		<div class="col-md-5 col-md-offset-3"><legend>Insira o Telefone</legend></div>
		<div class="col-md-5 col-md-offset-3"><input class="form-control" type="text" name="telefone_contato" placeholder="TELEFONE" style="margin-bottom: 5px;""></div>
		<div class="col-md-5 col-md-offset-3"><select class="form-control" name="tipo_telefone_contato" style="margin-bottom: 20px;">
				<option value="Residencial">Residencial</option>
				<option value="Celular">Celular</option>
				<option value="Trabalho">Trabalho</option>
			</select></div>
		<br>

		<div class="col-md-5 col-md-offset-3"><legend>Selecione a Empresa:</legend></div>
		<div class="col-md-5 col-md-offset-3"><select class="form-control" name="empresa_contato" style="margin-bottom: 20px;">
			<?php
				do {
					echo "<option value='".$empresas->id."'>".$empresas->nome."</option>";

				} while ($empresas = mysqli_fetch_object($verifica_lista)); 
			?>

		</select></div>
		<br>


	<div class="col-md-5 col-md-offset-3"><button class="form-control btn btn-primary" type="submit" value="submit" name="envia_contato">Enviar</button></div>
	</form></div>
</div>
</body>
</html>