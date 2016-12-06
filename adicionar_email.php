<?php include 'conecta.php';

if (isset($_POST['bt_adicionar_email'])) {
	$id=$_POST['id_contato'];
	$novo_email=$_POST['novo_email'];

	$query_novo_email="INSERT INTO emails(email, id_contato) VALUES ('$novo_email', '$id')";
	$verifica_novo_email=mysqli_query($connect, $query_novo_email);

	echo "<script language='javascript' type='text/javascript'>alert('E-Mail Adicionado!');window.location.href='listar_contatos.php';</script>";


}