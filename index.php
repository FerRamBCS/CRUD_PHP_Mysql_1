<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RAMIREZ BRAVO EQUIPOS VENTAS</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet"> 
	<link rel="stylesheet" href="css/estilos.css">
</head>
<script>
    function confirmacion() {
        var respuesta = confirm("¡ALERTA!, Estas a punto de realizar esta accion, ¿Seguro que quieres continuar?");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }

    }
</script>
<body>
	<div class="contenedor">
		<header>
			<h1>SISTEMA VENTAS</h1>
			<div>

			</div>
		</header>
		<main>
			<form action="php/insertar.php" method="POST"class="formulario">
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
				<input type="text" name="monto_total" id="monto_total" placeholder="Total">
				<input type="submit" name="registrar" value="Registrar">
				<!--<input type="submit" name="cargar" value="Cargar ventas">
				<input type="submit" name="modificar" value="Modificar">
				<input type="submit" name="borrar" value="Borrar">-->
			</form>
			<div class="error_box" id="error_box">
				<p>Se ha producido un error.</p>
			</div>
			<table id="tabla" class="tabla">
				<thead>
				<tr>
					<th>Fecha</th>
					<th>ID</th>
					<th>Nombre</th>
					<th>Tipo de combustible</th>
					<th>Precio por litro</th>
					<th>Cantidad de litros</th>
					<th>Monto total</th>
					<th>Eliminar</th>
					<th>Editar</th>
				</tr> 
				</thead>
				<tbody>
					<?php
						include("php/conexion.php");
						$getmysql = new mysqlconex();
						$getconex = $getmysql->conex();
						
						$consulta = "SELECT * FROM registros_gasolinera";
						$resultado = mysqli_query($getconex,$consulta);
						while ($fila = mysqli_fetch_row($resultado)) 
							{
								echo "<tr>";
								echo "<td>".$fila[0]."</td>";
								echo "<td>".$fila[1]."</td>";
								echo "<td>".$fila[2]."</td>";
								echo "<td>".$fila[3]."</td>";
								echo "<td>".$fila[4]."</td>";
								echo "<td>".$fila[5]."</td>";
								echo "<td>".$fila[6]."</td>";

								echo "<td> 
                        			<form action='php/eliminar.php' method='POST'>
                        				<input type='hidden' name='id' value='".$fila["1"]."'>
                        				<input type='hidden' name='nombre' value='".$fila["2"]."'>
                        				<input type='submit' name='eliminar' value='Eliminar' onclick= 'return confirmacion ()'>
                        			</form>
									</td>";
								echo "</tr>";
								echo "<td> 
                        			<form action='php/editar.php' method='POST'>
                        				<input type='hidden' name='id' value='".$fila["1"]."'>
                        				<input type='hidden' name='nombre_despachador' value='".$fila["2"]."'>
                        				<input type='hidden' name='tipo_combustible' value='".$fila["3"]."'>
                        				<input type='hidden' name='precio_combustible' value='".$fila["4"]."'>
                        				<input type='hidden' name='precio_litro' value='".$fila["5"]."'>
                        				<input type='hidden' name='cantidad_litros' value='".$fila["6"]."'>
                        				<input type='hidden' name='monto_total' value='".$fila["7"]."'>
                        				<input type='submit' name='modificar' value='Modificar'>
                        			</form>
									</td>";
								echo "</tr>";
							}
							mysqli_close($getconex);
					?>
				</tbody>
			</table>
			<div class="loader" id="loader"></div>
		</main>
	</div>
</body>
</html>
