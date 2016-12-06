<?php include 'conecta.php';

if (isset ($_POST['bt_excluir_contato'])) {
	$id=$_POST['id_contato'];

	$query_email = "DELETE FROM emails WHERE id_contato = '$id'";
	$verifica_email = mysqli_query($connect, $query_email);

	$query_telefone = "DELETE FROM telefone WHERE id_contato = '$id'";
	$verifica_telefone = mysqli_query($connect, $query_telefone);
	
	$query_contato = "DELETE FROM contatos WHERE id = '$id'";
	$verifica_contato = mysqli_query($connect, $query_contato);


	echo "<script language='javascript' type='text/javascript'>alert('Contato apagado!');window.location.href='listar_contatos.php';</script>";

}

 ?>