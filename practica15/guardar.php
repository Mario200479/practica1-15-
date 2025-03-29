<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$base_de_datos = "registro_usuarios";

$conn = new mysqli($servidor, $usuario, $clave, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre_completo = $_POST['nombre_completo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$correo_electronico = $_POST['correo_electronico'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); 

$sql = "INSERT INTO usuarios (nombre_completo, fecha_nacimiento, correo_electronico, contraseña) 
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nombre_completo, $fecha_nacimiento, $correo_electronico, $contraseña);

if ($stmt->execute()) {
    echo "Usuario registrado con éxito.";
} else {
    echo "Error al registrar usuario: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
