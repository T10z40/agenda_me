<?php include 'conecta.php';

if (isset($_POST['envia_contato'])) {
	$id=$_POST['id'];
 	$nome=$_POST['nome_contato'];
 	$sobrenome=$_POST['sobrenome_contato'];
 	$cep=$_POST['cep_contato'];
 	$rua=$_POST['rua_contato'];
 	$numero=$_POST['numero_contato'];
 	$bairro=$_POST['bairro_contato'];
 	$cidade=$_POST['cidade_contato'];
 	$estado=$_POST['estado_contato'];
 	$empresa=$_POST['empresa_contato'];
 	$modificado=new DateTime(now);
 	$modificado=$modificado->format('Y-m-d H:i:s');

 	
 	$query_contato="UPDATE contatos SET nome='$nome', sobrenome='$sobrenome', cep='$cep', rua='$rua', numero='$numero', bairro='$bairro', cidade='$cidade', estado='$estado', id_empresa='$empresa', modificado='$modificado' WHERE id='$id'";
 	$verifica_contato=mysqli_query($connect, $query_contato);

 	echo "<script language='javascript' type='text/javascript'>alert('As novas informações foram salvas!');window.location.href='index.php';</script>";
 

 }

 ?>