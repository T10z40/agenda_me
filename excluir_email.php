<?php include 'conecta.php';

if (isset ($_POST['bt_excluir_email'])) {
	$id=$_POST['id_email'];

	$query_email = "DELETE FROM emails WHERE id = '$id'";
	$verifica_email = mysqli_query($connect, $query_email);

	echo "<script language='javascript' type='text/javascript'>alert('Email apagado!');window.location.href='listar_contatos.php';</script>";

}

 ?>