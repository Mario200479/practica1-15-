<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$base_de_datos = "registro_usuarios";

$conn = new mysqli($servidor, $usuario, $clave, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";
$resultado = $conn->query($sql);

echo "<h2>Lista de Usuarios Registrados</h2>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Fecha de Nacimiento</th>
            <th>Correo Electrónico</th>
            <th>Fecha de Registro</th>
        </tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
            <td>{$fila['id']}</td>
            <td>{$fila['nombre_completo']}</td>
            <td>{$fila['fecha_nacimiento']}</td>
            <td>{$fila['correo_electronico']}</td>
            <td>{$fila['fecha_registro']}</td>
        </tr>";
}

echo "</table>";

$conn->close();
?>
