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
	$nombre = $_POST["nombre"];
	$colonia = $_POST["colonia"];
	$referencia = $_POST["referencia"];
	$material = $_POST["material"];
	$volumen = $_POST["volumen"];
	$total = $_POST["total"];

	if (isset($_POST["editar2"])) 
	{
		include("conexion.php");
		$getmysql = new mysqlconex();
		$getconex = $getmysql->conex();

		$query = "UPDATE sistema_ventas set nombre = ?, colonia = ?, referencias = ?, material = ?, volumen = ?, total = ? WHERE id = ?";
		$sentencia = mysqli_prepare($getconex,$query);
		mysqli_stmt_bind_param($sentencia,"ssssddi",$nombre,$colonia,$referencia,$material,$volumen,$total,$id);
		mysqli_stmt_execute($sentencia);
		$afectado = mysqli_stmt_affected_rows($sentencia);

		if ($afectado == 1) 
		{
			echo "<script>alert('El pedido de [$nombre] ha sido modificado'); location.href='../index.php';</script>";
		}else 
		{
			echo "<script>alert('El pedido de [$nombre] no pudo ser modificado'); location.href='../index.php';</script>";
		}
		mysqli_stmt_close($sentencia);
		mysqli_close($getconex);
	}


	?>
	<form action="editar.php" class="formulario" method="POST">
		<input type="hidden" name="id" value="<?php echo $id ?>">
				<label for="nombre"></label>
				<input type="text" name="nombre" value="<?php echo $nombre ?>" id="nombre" placeholder="Nombre">
				<label for="colonia"></label>
				<input type="text" name="colonia" value="<?php echo $colonia ?>" id="colonia" placeholder="Colonia">
				<label for="referencia"></label>
				<input type="text" name="referencia" value="<?php echo $referencia ?>" id="referencia" placeholder="Referencia">
				<label for="material"></label>
				<select name="material" id="material">
					<option value="<?php echo $material ?>" hidden selected><?php echo $material ?></option>
					<option value="opcion" selected>Seleccione el material</option>
					<option value="arena">Arena</option>
					<option value="grava">Grava</option>
					<option value="tierra">Tierra</option>

				</select>
				<label for="volumen"></label>
				<select name="volumen" id="volumen">
					<option value="<?php echo $volumen ?>" hidden selected><?php echo $volumen; ?></option>
					<option value="opcion" select="true">Seleccione la cantidad</option>
					<option value="0.5">0.5</option>
					<option value="1">1</option>
					<option value="1.5">1.5</option>
					<option value="2">2</option>
					<option value="2.5">2.5</option>
					<option value="3">3</option>
					<option value="3.5">3.5</option>
					<option value="4">4</option>
					<option value="4.5">4.5</option>
					<option value="5">5</option>
					<option value="5.5">5.5</option>
					<option value="6">6.5</option>
					<option value="7">7</option>
					<option value="7.5">7.5</option>
					<option value="8">8</option>
				</select>
				<label for="total"></label>
				<input type="text" name="total" value="<?php echo $total ?>" id="total" placeholder="Total">
				<input type="submit" name="editar2" value="Registrar">
	</form>
</body>
</html>