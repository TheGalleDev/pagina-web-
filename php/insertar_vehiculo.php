<?php
// Configuración de la base de datos
$host = 'localhost';
$usuario = 'root';
$clave = '';
$base_de_datos = 'mycar';

// Crear una conexión a la base de datos
$conexion = new mysqli($host, $usuario, $clave, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.<br>";
}

// Obtener los datos del formulario
$id = $_POST['id'];
$nombre_marca = $_POST['marca']; // Nombre de la marca
$cilindraje = $_POST['cilindraje'];
$traccion = $_POST['traccion'];
$kilometraje = $_POST['kilometraje'];
$precio = $_POST['precio'];
$nombre_color = $_POST['color']; // Nombre del color

// Obtener el código de la marca
$sql_marca = "SELECT cod_marca FROM marca WHERE nombre_marca = ?";
$stmt_marca = $conexion->prepare($sql_marca);
$stmt_marca->bind_param("s", $nombre_marca);
$stmt_marca->execute();
$resultado_marca = $stmt_marca->get_result();
if ($fila_marca = $resultado_marca->fetch_assoc()) {
    $cod_marca = $fila_marca['cod_marca'];
} else {
    echo "<script>alert('Nombre de marca inválido. Por favor, verifique e intente nuevamente.');</script>";
    exit;
}
$stmt_marca->close();

// Obtener el código del color
$sql_color = "SELECT cod_color FROM color WHERE nombre_color = ?";
$stmt_color = $conexion->prepare($sql_color);
$stmt_color->bind_param("s", $nombre_color);
$stmt_color->execute();
$resultado_color = $stmt_color->get_result();
if ($fila_color = $resultado_color->fetch_assoc()) {
    $cod_color = $fila_color['cod_color'];
} else {
    echo "<script>alert('Nombre de color inválido. Por favor, verifique e intente nuevamente.');</script>";
    exit;
}
$stmt_color->close();

// Preparar la consulta SQL para insertar los datos del vehículo
$sql_vehiculo = "INSERT INTO vehiculos (id, cod_marca, cilindraje, traccion, kilometraje, precio, color, cod_color) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt_vehiculo = $conexion->prepare($sql_vehiculo);

// Verificar la preparación de la sentencia
if (!$stmt_vehiculo) {
    die("Error al preparar la consulta: " . $conexion->error);
}

// Asociar parámetros y ejecutar la consulta
$stmt_vehiculo->bind_param("iissddss", $id, $cod_marca, $cilindraje, $traccion, $kilometraje, $precio, $nombre_color, $cod_color);
if ($stmt_vehiculo->execute()) {
    echo "Vehículo registrado exitosamente.<br>";
    echo "Marca: " . $nombre_marca . " (Código: " . $cod_marca . ")<br>";
    echo "Color: " . $nombre_color . " (Código: " . $cod_color . ")<br>";
} else {
    echo "Error al registrar vehículo: " . $stmt_vehiculo->error;
}

// Cerrar la conexión
$stmt_vehiculo->close();
$conexion->close();
?>
