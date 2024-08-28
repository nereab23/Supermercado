<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
</head>
<body>
    <h2>Registro de Cliente</h2>
    <form action="registrarcliente.php" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="tipo_documento">Tipo de Documento:</label><br>
        <select id="tipo_documento" name="tipo_documento" required>
        <option value="Seleccione_un_campo">Seleccione un campo</option>
            <option value="Pasaporte">Pasaporte</option>
            <option value="Cédula_Extrangera">Cédula Extrangera</option>
            <option value="Cédula_de_ciudadania">Cédula de ciudadania</option>
            <!-- Agrega más tipos de documentos según necesites -->
        </select><br><br>

        <label for="documento">Documento:</label><br>
        <input type="text" id="documento" name="documento" required><br><br>

        <label for="correo">Correo Electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="barrio">Barrio:</label><br>
        <input type="text" id="barrio" name="barrio" required><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="tel" id="telefono" name="telefono" required><br><br>

        <input type="submit" value="Registrar Cliente">

        
    </form>
</body>
<?php
// registrarcliente.php
                

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_documento = $_POST['tipo_documento'];
    $documento = $_POST['documento'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $barrio = $_POST['barrio'];
    $telefono = $_POST['telefono'];

                $usuarios = 'root';
                $pw = '';
                $servidor = 'localhost';
                $basedatos = 'super';

                $conn = new mysqli($servidor, $usuarios, $pw, $basedatos);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar los datos en la tabla de clientes
    $sql = "INSERT INTO clientes (nombre, apellido, tipo_documento, documento, correo, direccion, barrio, telefono)
            VALUES ('$nombre', '$apellido', '$tipo_documento', '$documento', '$correo', '$direccion','$barrio', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        // Redirigir a productos.php después de guardar
        header("Location: productos.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

</html>
