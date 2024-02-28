<?php
$nombrePagina = "Parqueados";
include 'plantilla.php';
include 'header.php';
include 'conexionbasedatos.php';

// Escapa el texto de la placa para prevenir inyeccion SQL
$placa = $conexion->real_escape_string($post['placa']);

//consulta SQL para obtener la informacion del vehiculo
$consulta = "SELECT * FROM vehiculos WHERE placa = '$placa' AND estado = 'parqueado'";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows >0) {
    //mostrar la informacion del vehiculo

    $vehiculo = $resultado->fetch_assoc();
    echo '<div class="informacion">
    <div class="izquierda">Vehiculo</div>
    <div class="derecha disenoPlaca">ABC123</div>
    <div class="izquierda">fecha y Hora de Ingreso</div>
    <div class="derecha">12/02/2024 - 16:30</div>
    <div class="izquierda">Tiempo consumido</div>
    <div class="derecha">0 hora,23 min, 09 seg</div>
    <div class="izquierda">Total a pagar</div>
    <div class="derecha">$1500 COP</div>
</div>';
} else {
    echo "No se encontro ningun vehiculo con esa placa";
}
$conexion->close();

?>
<div class="contenedor-salida-vehiculo">
    <h3>Salida del vehiculo</h3>

    <div class="buscador">
        <form action="" method="post"
        <label> style="margin-top: 15px;">placa:</label>
        <input type="text" placeholder="Ingresa la Placa Del Vehiculo">
        <button>Buscar</button>
    </div>
    
    
    <div class="botones-acciones">
        <button class="btnAccion btnCobrar">Cobrar</button>
        <button class="btnAccion btnCancelar">Cancelar</button>
    </div>
</div>

<?php include 'footer.php'; ?>