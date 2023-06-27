<?php
	include("conexion.php");
	$getmysql = new mysqlconex();
	$getconex = $getmysql->conex();

	if (isset ($_POST["eliminar"])) 
	{
		$id = $_POST["id"];
		$nombre = $_POST["nombre"];

		$query = "DELETE FROM sistema_ventas WHERE id = ?";
		$sentencia = mysqli_prepare($getconex,$query);
		mysqli_stmt_bind_param($sentencia, "i", $id);
		mysqli_stmt_execute($sentencia);

		$afectado = mysqli_stmt_affected_rows($sentencia);
		if ($afectado == 1) 
		{
			echo "<script>alert('El pedido de [$nombre] ha sido eliminado con exito'); location.href='../index.php';</script>";
		}else 
		{
			echo "<script>alert('El pedido de [$nombre] no pudo ser eliminado correctamente'); location.href='../index.php';</script>";
		}
	}

?>