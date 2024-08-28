<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del Cliente
    $documento = $_POST['documento'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];

    echo "<h1>Factura Generada</h1>";

    // Datos de los Productos
    $codigos = $_POST['codigo'];
    $nombres = $_POST['nombre_producto'];
    $marcas = $_POST['marca'];
    $cantidades = $_POST['cantidad'];
    $precios = $_POST['precio'];

    $total_general = 0;

    for ($i = 0; $i < count($codigos); $i++) {
        $total = $cantidades[$i] * $precios[$i];
        $total_general += $total;
        
        echo "<h2>Producto " . ($i + 1) . "</h2>";
        echo "<p><strong>Código:</strong> " . $codigos[$i] . "</p>";
        echo "<p><strong>Nombre:</strong> " . $nombres[$i] . "</p>";
        echo "<p><strong>Marca:</strong> " . $marcas[$i] . "</p>";
        echo "<p><strong>Cantidad:</strong> " . $cantidades[$i] . "</p>";
        echo "<p><strong>Precio Unitario:</strong> " . $precios[$i] . "</p>";
        echo "<p><strong>Total:</strong> " . $total . "</p>";
    }

    echo "<h2>Total General:</h2>";
    echo "<p><strong>Total a Pagar:</strong> " . $total_general . "</p>";

    echo "<h2>Datos del Cliente</h2>";
    echo "<p><strong>Nombre:</strong> $nombre_cliente $apellido</p>";
    echo "<p><strong>Documento:</strong> $documento</p>";
    echo "<p><strong>Teléfono:</strong> $telefono</p>";
    echo "<p><strong>Correo:</strong> $correo</p>";
    echo "<p><strong>Dirección:</strong> $direccion</p>";
}
?>
