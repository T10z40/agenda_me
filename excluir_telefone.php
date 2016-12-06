<?php include 'conecta.php';

if (isset ($_POST['bt_excluir_telefone'])) {
	$id=$_POST['id_telefone'];

	$query_telefone = "DELETE FROM telefone WHERE id = '$id'";
	$verifica_telefone = mysqli_query($connect, $query_telefone);

	echo "<script language='javascript' type='text/javascript'>alert('Telefone apagado!');window.location.href='listar_contatos.php';</script>";

}

 ?>