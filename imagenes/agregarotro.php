<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Producto</title>
</head>
<body>

<?php
$usuarios = 'root';
$pw = '';
$servidor = 'localhost';
$basedatos = 'super';

$conn = new mysqli($servidor, $usuarios, $pw, $basedatos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si las claves existen en $_POST antes de usarlas
    $codigo_de_barras = isset($_POST['codigo_de_barras']) ? $_POST['codigo_de_barras'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $marca = isset($_POST['marca']) ? $_POST['marca'] : '';
    $peso = isset($_POST['peso']) ? $_POST['peso'] : '';
    $fecha_de_elaboracion = isset($_POST['fecha_de_elaboracion']) ? $_POST['fecha_de_elaboracion'] : '';
    $fecha_de_vencimiento = isset($_POST['fecha_de_vencimiento']) ? $_POST['fecha_de_vencimiento'] : '';
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $ubicacion = isset($_POST['ubicacion']) ? $_POST['ubicacion'] : '';
    $proveedor = isset($_POST['proveedor']) ? $_POST['proveedor'] : '';
    $cantidad_disponible = isset($_POST['cantidad_disponible']) ? $_POST['cantidad_disponible'] : 0;
    $precio = isset($_POST['precio']) ? $_POST['precio'] : 0.0;

    // Insertar el nuevo producto en la base de datos
    $sql = "INSERT INTO productos (codigo_de_barras, nombre, marca, peso, fecha_de_elaboracion, fecha_de_vencimiento, categoria, ubicacion, proveedor, cantidad_disponible, precio)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("sssssssssid", $codigo_de_barras, $nombre, $marca, $peso, $fecha_de_elaboracion, $fecha_de_vencimiento, $categoria, $ubicacion, $proveedor, $cantidad_disponible, $precio);

    if ($stmt->execute()) {
        // Redirigir a la página de lista de productos después de agregar exitosamente
        header("Location: listadeproductos.php");
        exit(); // Importante para detener la ejecución del script
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<h1>Agregar Nuevo Producto</h1>

<form action="" method="post">
    <label for="codigo_de_barras">Código de Barras:</label>
    <input type="text" id="codigo_de_barras" name="codigo_de_barras" required><br>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="marca">Marca:</label>
    <input type="text" id="marca" name="marca" required><br>

    <label for="peso">Peso: </label> <a> Gr </a>
    <input type="int" id="peso" name="peso"  required><br>

    <label for="fecha_de_elaboracion">Fecha de Elaboración:</label>
    <input type="date" id="fecha_de_elaboracion" name="fecha_de_elaboracion" required><br>

    <label for="fecha_de_vencimiento">Fecha de Vencimiento:</label>
    <input type="date" id="fecha_de_vencimiento" name="fecha_de_vencimiento" required><br>

    <label for="categoria">Categoría:</label>
    <input type="text" id="categoria" name="categoria" required><br>

    <label for="ubicacion">Ubicación:</label>
    <input type="text" id="ubicacion" name="ubicacion" required><br>

    <label for="proveedor">Proveedor:</label>
    <input type="text" id="proveedor" name="proveedor" required><br>

    <label for="cantidad_disponible">Cantidad Disponible:</label> <a> Unidades </a>
    <input type="int" id="cantidad_disponible" name="cantidad_disponible" required><br>

    <label for="precio">Precio:</label> <a> Pesos </a>
    <input type="text" id="precio" name="precio" required><br>

    <button type="submit">Agregar Producto</button>
</form>

</body>
</html>
