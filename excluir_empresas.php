<?php include 'conecta.php';

if (isset ($_POST['bt_excluir_empresa'])) {
	$id=$_POST['id_empresa'];

	$query_empresas = "DELETE FROM empresas WHERE id = '$id'";
	$verifica_empresas = mysqli_query($connect, $query_empresas);

	echo "<script language='javascript' type='text/javascript'>alert('Empresa Excluída!');window.location.href='listar_empresas.php';</script>";

}

 ?>