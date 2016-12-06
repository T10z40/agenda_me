<?php include 'conecta.php';

if (isset($_POST['envia_empresa'])) {
 	$nome=$_POST['nome_empresa'];
 	$telefone=$_POST['telefone_empresa'];


 	$query_empresa="INSERT INTO empresas(nome, telefone) VALUES ('$nome', '$telefone')";
 	$verifica_contato=mysqli_query($connect, $query_empresa);

 	echo "<script language='javascript' type='text/javascript'>alert('Empresa Adicionada!');window.location.href='listar_empresas.php';</script>";

 }

 ?>