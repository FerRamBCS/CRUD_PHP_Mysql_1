<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MODIFICACION DE DATOS</title>
</head>
<body>
	<?php
	$id = $_POST["id"];
	$nombre_despachador = $_POST["nombre_despachador"];
	$tipo_combustible = $_POST["tipo_combustible"];
	$precio_litro = $_POST["precio_litro"];
	$cantidad_litros = $_POST["cantidad_litros"];
	$monto_total = $_POST["monto_total"];

	if (isset($_POST["editar2"])) 
	{
		include("conexion.php");
		$getmysql = new mysqlconex();
		$getconex = $getmysql->conex();

		$query = "UPDATE registros_gasolinera set nombre_despachador = ?, tipo_combustible = ?, precio_litro = ?, cantidad_litros = ?, monto_total = ? WHERE id = ?";
		$sentencia = mysqli_prepare($getconex,$query);
		mysqli_stmt_bind_param($sentencia,"ssdddi", $nombre_despachador, $tipo_combustible, $precio_litro, $cantidad_litros, $monto_total, $id);
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
	<form action="editar.php" class="formulario" method="POST">
		<input type="hidden" name="id" value="<?php echo $id ?>">
				<label for="nombre_despachador"></label>
				<input type="text" name="nombre_despachador" id="nombre" placeholder="Nombre" required>
				<label for="tipo_combustible"></label>
				<select name="tipo_combustible" id="tipo_combustible">
					<option value="regular">Regular</option>
					<option value="premium">Premium</option>
				</select>
				<label for="precio_litro"></label>
    			<input type="number" name= "precio_litro"id="precio_litro" step="0.01" required placeholder="Precio por litro">
				<label for="cantidad_litros"></label>
				<input type="number" name= "cantidad_litros" id="cantidad_litros" step="0.1" required placeholder= "Cantidad de litros">
				<label for="monto_total"></label>
				<input type="text" name="monto_total"  value="<?php echo $monto_total ?>" id="monto_total" placeholder="Monto total">
				<input type="submit" name="editar2" value="Registrar">
	</form>
</body>
</html>