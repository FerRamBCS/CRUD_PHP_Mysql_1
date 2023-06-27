function mostrarDatos() {
    // Obtener los valores ingresados por el usuario
    var entero = document.getElementById("entero").value;
    var decimal = document.getElementById("decimal").value;
    var cadena = document.getElementById("cadena").value;
    var booleano = document.getElementById("booleano").checked;

    // Obtener la fecha y hora actual
    var fechaHora = new Date();
    
            // Mostrar los valores y la fecha/hora en la consola
            console.log("Valores ingresados:");
            console.log("Entero: " + entero);
            console.log("Decimal: " + decimal);
            console.log("Cadena: " + cadena);
            console.log("Booleano: " + booleano);
            console.log("Fecha y Hora: " + fechaHora);
}