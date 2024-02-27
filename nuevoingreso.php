<?php
$nombrePagina = "Nuevo Ingreso";
include 'plantilla.php';
include 'header.php';


// verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Capturar datos del formulario
  $tipoVehiculo = $_POST["tipovehiculo"];
  $marca = $_POST["marca"];
  $color = $_POST["color"];
  $placa = $_POST["placa"];
  $observaciones = $_POST["observaciones"];

  //realizar la conexion a la base de datos
  $servername = "localhost";
  $username = "root";
  $password = "";
  $basedatos = "parking_plus_db";

  // Crear una nueva conexion
  $conexion = new mysqli($servername, $username, $password, $basedatos);

  //verificar la conexion
  if ($conexion->connect_error) {
    die("La conexion a la base de datos tuvo un error:" . $conexion->connect_error);
  }

  //armar la consulta SQL para la insercion
  $insertar = "INSERT INTO vehiculos (tipoVehiculo, marca, color, placa, observaciones)
  VALUES ( '$tipoVehiculo', '$marca', '$color', '$placa', '$observaciones')";

  //ejecutar la consulta
  if ($conexion->query($insertar) === TRUE) {
    
    // Redirigir al archivo exito.php despues de la insercion de la BD
    header("location: exito.php");
    exit;
  } else {
    echo "Error: "  . $insertar . "<br>" . $conexion->error;
  }
  //Cerrar la conexion
}
?>


<div class="contenedor-nuevo-ingreso">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="nuevoIngreso" method="post">
    <h3>Información el vehiculo</h3>

    <div class="control-form">
      <label>Tipo Vehículo</label><br />
      <select name="tipovehiculo">
        <option value="carro">Carro</option>
        <option value="moto">Moto</option>
        <option value="otro">Otro</option>
      </select>
    </div>
    <div class="control-form">
      <label>Marca:</label>
      <input type="text" id="marca" name="marca" />
    </div>
    <div class="control-form">
      <label>Color:</label>
      <input type="text" id="color" name="color" />
    </div>
    <div class="control-form">
      <label>Placa:</label>
      <input type="text" id="placa" name="placa" />
    </div>
    <div class="control-form">
      <label>Observaciones:</label>
      <input type="text" id="observaciones" name="observaciones" />
    </div>
    <button class="botonNuevoVehiculo">Ingresar vehiculo</button>
  </form>
</div>

<?php include 'footer.php'; ?>