<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Estilos de Bootstrap desde una URL -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq781YhFldvKuhfTAU6auU8T94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Fuentes de iconos de Font Awesome desde una URL -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet">

    <style>
        /* Estilos personalizados */
        body {
            background-color: #f8f9fa;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        .error {
            color: red;
        }
        .total-ganancias {
            font-size: 24px;
            text-align: center;
        }
        .finalizar-btn {
            display: block;
            margin: 20px auto;
            text-align: center;
            background-color: #007bff; /* Cambiar el color de fondo del botón */
            color: #fff; /* Cambiar el color del texto del botón a blanco */
            padding: 10px 20px; /* Aumentar el espacio alrededor del texto */
            border: none; /* Eliminar el borde */
            border-radius: 5px; /* Agregar bordes redondeados */
            font-weight: bold; /* Hacer el texto en negrita */
            text-decoration: none; /* Eliminar subrayado del enlace */
            transition: background-color 0.3s; /* Agregar transición suave al color de fondo */
        }
        .finalizar-btn:hover {
            background-color: #0056b3; /* Cambiar el color de fondo del botón al pasar el mouse */
        }
    </style>
    <title>Total de Ganancias</title>
</head>
<body>
    <h1>TOTAL DE GANANCIAS <i class="fas fa-chart-line"></i></h1>
    <hr>
    <?php 
        if(isset($_GET['error'])){
        ?>
        <p class="error">
            <?php
            echo $_GET['error'];
            ?>
        </p>
        <?php
        } 
    ?>  

    <?php
    $usuarios = 'root';
    $pw = '';
    $servidor = 'localhost';
    $basedatos = 'iniciarsesion';

    $conn = new mysqli($servidor, $usuarios, $pw, $basedatos);

    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $sql = "SELECT SUM(valor_venta - valor_compra) AS total_ganancias FROM productos"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalGanancias = $row["total_ganancias"];
        echo "<p class='total-ganancias'>Total de Ganancias: $totalGanancias</p>";
    } else {
        echo "No se encontraron datos";
    }

    $conn->close();
    ?>

    <hr>
    <a href="productos.php" class="btn btn-primary finalizar-btn">FINALIZAR <i class="fas fa-check"></i></a>
</body>
</html>
