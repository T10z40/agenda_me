<?php include 'conecta.php';

if (isset($_POST['bt_adicionar_telefone'])) {
	$id=$_POST['id_contato'];
	$novo_telefone=$_POST['novo_telefone'];
	$tipo=$_POST['tipo_telefone_contato'];

	$query_novo_telefone="INSERT INTO telefone(numero, tipo, id_contato) VALUES ('$novo_telefone', '$tipo', '$id')";
	$verifica_novo_telefone=mysqli_query($connect, $query_novo_telefone);

	echo "<script language='javascript' type='text/javascript'>alert('Telefone Adicionado!');window.location.href='listar_contatos.php';</script>";


}