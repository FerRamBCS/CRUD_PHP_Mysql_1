<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

	if (isset($_POST["registrar"])) 
	{
		$nombre_despachador = $_POST["nombre_despachador"];
		$tipo_combustible = $_POST["tipo_combustible"];
		$precio_litro = $_POST["precio_litro"];
		$cantidad_litros = $_POST["cantidad_litros"];
		$monto_total = $_POST["monto_total"];
		
		
		
		$query = "INSERT INTO  registros_gasolinera (nombre_despachador, tipo_combustible, precio_litro, cantidad_litros, monto_total) VALUES(?,?,?,?,?)";
		$sentencia = mysqli_prepare($getconex,$query);
		mysqli_stmt_bind_param($sentencia, "ssddd", $nombre_despachador, $tipo_combustible, $precio_litro, $cantidad_litros, $monto_total);
		mysqli_stmt_execute($sentencia);
		$afectado = mysqli_stmt_affected_rows($sentencia);
		if ($afectado == 1) 
		{
			echo "<script>alert('La venta de [$nombre_despachador] ha sido registrado'); location.href='../index.php';</script>";
		}else 
		{
			echo "<script>alert('La venta de [$nombre_despachador] no pudo ser registrado'); location.href='../index.php';</script>";
		}
		mysqli_stmt_close($sentencia);
		mysqli_close($getconex);

	}

?>