<?php
$usuarios = 'root';
$pw = '';
$servidor = 'localhost';
$basedatos = 'iniciarsesion';

$conn = new mysqli($servidor, $usuarios, $pw, $basedatos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_REQUEST); 
    if (isset($_REQUEST["id"])) {
        $id = $_REQUEST["id"];
        $sql = "DELETE FROM productos WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header("Location: mostrarproductos.php");
            exit();
        } else {
            echo "Error al eliminar el producto: " . $conn->error;
        }
    } else {
        $producto = $_POST['producto'];
        $valorCompra = $_POST['valor_compra'];
        $valorVenta = $_POST['valor_venta'];
        $Ganan = $_POST['ganancia'];

        $sql = "INSERT INTO productos (producto, valor_compra, valor_venta, ganancia) VALUES ('$producto', '$valorCompra','$valorVenta','$Ganan')";

        if ($conn->query($sql) === TRUE) {
            header("Location: mostrarproductos.php");
            exit();
        } else {
            header("Location: ingresarproductos.php?error=" . urlencode("Error al guardar en la base de datos"));
            exit();
        }
    }
}

$conn->close();
?>
