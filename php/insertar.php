<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

	if (isset($_POST["registrar"])) 
	{
		$nombre = $_POST["nombre"];
		$colonia = $_POST["colonia"];
		$referencia = $_POST["referencia"];
		$material = $_POST["material"];
		$volumen = $_POST["volumen"];
		$total = $_POST["total"];

		$query = "INSERT INTO  sistema_ventas (Nombre,Colonia,Referencias,Material,Volumen,Total) VALUES(?,?,?,?,?,?)";
		$sentencia = mysqli_prepare($getconex,$query);
		mysqli_stmt_bind_param($sentencia,"ssssdd",$nombre,$colonia,$referencia,$material,$volumen,$total);
		mysqli_stmt_execute($sentencia);
		$afectado = mysqli_stmt_affected_rows($sentencia);
		if ($afectado == 1) 
		{
			echo "<script>alert('El pedido de [$nombre] ha sido registrado'); location.href='../index.php';</script>";
		}else 
		{
			echo "<script>alert('El pedido de [$nombre] no pudo ser registrado'); location.href='../index.php';</script>";
		}
		mysqli_stmt_close($sentencia);
		mysqli_close($getconex);

	}

?>