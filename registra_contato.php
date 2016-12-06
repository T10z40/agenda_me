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
</head>
<body>
<div>
	<form method="POST" action="adiciona_contato.php" name="novo_contato">
		<label>Nome:<br>
			<input type="text" name="nome_contato" placeholder="NOME">
		</label><br>
		<label>Sobrenome:<br>
			<input type="text" name="sobrenome_contato" placeholder="SOBRENOME">
		</label><br>
		<label>E-Mail:<br>
			<input type="text" name="email_contato" placeholder="E-MAIL">
		</label><br>
		<label>CEP:<br>
			<input type="text" name="cep_contato"	placeholder="CEP">
		</label><br>
		<label>Rua:<br>
			<input type="text" name="rua_contato" placeholder="RUA">
		</label><br>
		<label>Número:<br>
			<input type="text" name="numero_contato" placeholder="NUMERO">
		</label><br>
		<label>Bairro:<br>
			<input type="text" name="bairro_contato" placeholder="BAIRRO">
		</label><br>
		<label>Cidade:<br>
			<input type="text" name="cidade_contato" placeholder="CIDADE">
		</label><br>
		
		<label>Estado:<br>
		<select name="estado_contato">Selecione o Estado:
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
		</select>
		</label><br>
		
		<label>Telefone:<br>
			<input type="text" name="telefone_contato">
			<select name="tipo_telefone_contato">
				<option value="Residencial">Residencial</option>
				<option value="Celular">Celular</option>
				<option value="Trabalho">Trabalho</option>
			</select>
		</label><br>

		<label>Empresa:<br>
		<select name="empresa_contato">Selecione a Empresa:
			<?php
				do {
					echo "<option value='".$empresas->id."'>".$empresas->nome."</option>";

				} while ($empresas = mysqli_fetch_object($verifica_lista)); 
			?>

		</select>
		</label><br>


	<button type="submit" value="submit" name="envia_contato">Enviar</button>
	</form>
</div>
</body>
</html>