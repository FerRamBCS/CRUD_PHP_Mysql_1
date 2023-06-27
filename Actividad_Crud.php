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
				<label for="nombre"></label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre">
				<label for="colonia"></label>
				<input type="text" name="colonia" id="colonia" placeholder="Colonia">
				<label for="referencia"></label>
				<input type="text" name="referencia" id="referencia" placeholder="Referencia">
				<label for="material"></label>
				<select name="material" id="material">
					<option value="opcion" selected>Seleccione el material</option>
					<option value="arena">Arena</option>
					<option value="grava">Grava</option>
					<option value="tierra">Tierra</option>

				</select>
				<label for="volumen"></label>
				<select name="volumen" id="volumen">
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
				<input type="text" name="total" id="total" placeholder="Total">
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
					<th>Colonia</th>
					<th>Referencia</th>
					<th>Material</th>
					<th>Volumen</th>
					<th>Total</th>
					<th>Eliminar</th>
					<th>Editar</th>
				</tr> 
				</thead>
				<tbody>
					<?php
						include("php/conexion.php");
						$getmysql = new mysqlconex();
						$getconex = $getmysql->conex();
						
						$consulta = "SELECT * FROM sistema_ventas";
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
								echo "<td>".$fila[7]."</td>";
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
                        				<input type='hidden' name='nombre' value='".$fila["2"]."'>
                        				<input type='hidden' name='colonia' value='".$fila["3"]."'>
                        				<input type='hidden' name='referencia' value='".$fila["4"]."'>
                        				<input type='hidden' name='material' value='".$fila["5"]."'>
                        				<input type='hidden' name='volumen' value='".$fila["6"]."'>
                        				<input type='hidden' name='total' value='".$fila["7"]."'>
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