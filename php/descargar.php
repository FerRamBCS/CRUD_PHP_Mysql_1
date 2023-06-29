
<?php
    require('fpdf/fpdf.php');
    include("conexion.php");
    $getmysql = new mysqlconex();
    $getconex = $getmysql->conex();
    // Conectar a la base de datos
    $conn = mysqli_connect('localhost', 'root', '', 'registro');

        // Obtener los datos
        $resultado = mysqli_query($conn, 'SELECT * FROM sistema_ventas');

        // Crear el archivo PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        while ($fila = mysqli_fetch_assoc($resultado)) {
        $pdf->Cell(50, 10, $fila['Fecha'], 0);
        $pdf->Cell(50, 10, $fila['Id'], 2);
        $pdf->Cell(50, 10, $fila['Nombre'], 3);
        $pdf->Cell(50, 10, $fila['Colonia'], 4);
        $pdf->Cell(50, 10, $fila['Referemncias'], 5);
        $pdf->Cell(50, 10, $fila['Material'], 6);
        $pdf->Cell(50, 10, $fila['Volumen'], 7);
        $pdf->Cell(50, 10, $fila['Total'], 8);
        $pdf->Ln();

        $pdf->Output('archivo.pdf', 'D');

        // Descargar el archivo PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="archivo.pdf"');
        readfile('archivo.pdf');
        $afectado = mysqli_stmt_affected_rows($sentencia);
            if ($afectado == 1) 
            {
                echo "<script>alert('Los datos han sido descargados correctamente'); location.href='../index.php';</script>";
            }else 
            {
                echo "<script>alert('Los datos no pudieron ser descargados'); location.href='../index.php';</script>";
            }
}

?>