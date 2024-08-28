<?php
$usuarios = 'root';
$pw = '';
$servidor = 'localhost';
$basedatos = 'super';

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
            header("Location: listadeproductos.php");
            exit();
        } else {
            echo "Error al eliminar el producto: " . $conn->error;
        }
    } 

        if ($conn->query($sql) === TRUE) {
            header("Location: listadeproductos.php");
            exit();
        } else {
            header("Location: listadeproductos.php?error=" . urlencode("Error al guardar en la base de datos"));
            exit();
        }
    }


$conn->close();
?>