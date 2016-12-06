<?php include 'conecta.php';

if (isset($_POST['envia_contato'])) {
 	$nome=$_POST['nome_contato'];
 	$sobrenome=$_POST['sobrenome_contato'];
 	$email=$_POST['email_contato'];
 	$cep=$_POST['cep_contato'];
 	$rua=$_POST['rua_contato'];
 	$numero=$_POST['numero_contato'];
 	$bairro=$_POST['bairro_contato'];
 	$cidade=$_POST['cidade_contato'];
 	$estado=$_POST['estado_contato'];
 	$telefone=$_POST['telefone_contato'];
 	$tipo_telefone=$_POST['tipo_telefone_contato'];
 	$empresa=$_POST['empresa_contato'];
 	$criado=new DateTime(now);
 	$criado=$criado->format('Y-m-d H:i:s');



 	$query_contato="INSERT INTO contatos(nome, sobrenome, criado, cep, rua, numero, bairro, cidade, estado, id_empresa) VALUES ('$nome', '$sobrenome', '$criado','$cep', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$empresa')";
 	$verifica_contato=mysqli_query($connect, $query_contato);

 	$busca_contato="SELECT id FROM contatos WHERE criado='$criado' AND nome='$nome'";
 	$verifica_busca=mysqli_query($connect, $busca_contato);

 	$contato=mysqli_fetch_object($verifica_busca);

 	$query_email="INSERT INTO emails(email, id_contato) VALUES ('$email', '$contato->id')";
 	$verifica_email = mysqli_query($connect, $query_email);


 	$query_telefone="INSERT INTO telefone(id_contato, tipo, numero) VALUES ('$contato->id', '$tipo_telefone', '$telefone')";
 	$verifica_telefone=mysqli_query($connect, $query_telefone);
 	
 	echo "<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso.');window.location.href='index.php';</script>";
 

 }

 ?>