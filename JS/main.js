/* function actualizarPrecio() {
    var tipoCombustible = document.getElementById("tipo_combustible").value;
    var precioLitro = 0; // Precio preestablecido inicial
  
    if (tipoCombustible === "regular") {
      precioLitro = 23.40; // Precio para el combustible regular
    } else if (tipoCombustible === "premium") {
      precioLitro = 24.89; // Precio para el combustible premium
    }
  
    document.getElementById("precio_litro").value = precioLitro.toFixed(2);
  }
  
  function ingresarDatos() {
    var nombreDespachador = document.getElementById("nombre_despachador").value;
    var tipoCombustible = document.getElementById("tipo_combustible").value;
    var precioLitro = document.getElementById("precio_litro").value;
    var cantidadLitros = document.getElementById("cantidad_litros").value;
  
    // Realizar las operaciones necesarias y enviar los datos al backend para guardarlos en la base de datos
    // Puedes utilizar AJAX, Fetch, o cualquier otro método para enviar los datos al backend
  }
  function calcularTotal() {
    // Obtener el valor de litros y convertirlo a número
    var litros = parseFloat(document.getElementById("litros").value);
  
    // Obtener el precio por litro desde donde lo obtengas (puedes asignarlo manualmente o obtenerlo de otro campo)
    var precioPorLitro = 10; // Ejemplo, reemplaza este valor con el adecuado
  
    // Realizar la operación y obtener el total
    var total = litros * precioPorLitro;
  
    // Agregar el resultado al formulario
    document.getElementById("total").value = total;
  } */