<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq781YhFldvKuhfTAU6auU8T94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">    
    <title>MOSTRAR PRODUCTOS</title>
    <style>
        body {
            background-color: #f7f7f7;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .error {
            color: red;
        }

        .table-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table {
            width: 100%;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #007BFF;
            color: white;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #e0e0e0;
        }

        .btn-center {
            text-align: center;
            margin-top: 20px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .btn {
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 5px;
            text-transform: uppercase;
            width: 200px;
        }

        .btn-primary {
            background-color: #007BFF;
            border-color: #007BFF;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #1e7e34;
            border-color: #1e7e34;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            color: white;
        }

        .btn-info:hover {
            background-color: #117a8b;
            border-color: #117a8b;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #bd2130;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
    <form action="mostrarproductos.php" method="POST">
        <h1>MOSTRAR PRODUCTOS</h1>
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
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Valor Compra</th>
                        <th>Valor Venta</th>
                        <th>Ganancia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
         
                $usuarios = 'root';
                $pw = '';
                $servidor = 'localhost';
                $basedatos = 'iniciarsesion';

                $conn = new mysqli($servidor, $usuarios, $pw, $basedatos);

                if ($conn->connect_error) {
                    die("La conexión falló: " . $conn->connect_error);
                }

               
                $sql = "SELECT * FROM productos ORDER BY id ASC"; // Modificado para ordenar por ID ascendente
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Calcular la ganancia
                        $ganancia = $row["valor_venta"] - $row["valor_compra"];
                
                        // Actualizar la columna "ganancia" en la base de datos
                        $updateSql = "UPDATE productos SET ganancia = $ganancia WHERE id = " . $row["id"];
                        $conn->query($updateSql);
                
                        // Mostrar la fila en la tabla
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["producto"] . "</td>";
                        echo "<td>" . $row["valor_compra"] . "</td>";
                        echo "<td>" . $row["valor_venta"] . "</td>";
                        echo "<td>" . $ganancia . "</td>"; // Mostrar la ganancia calculada
                        echo '<td>';
                        echo '<form action="proceso.php" method="POST">';
                        echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
                        echo '<button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</button>';
                        echo '</form>';
                        echo '</td>';
                        echo "</tr>";
                    }
                }               

                // Calcular el total de productos comprados y vendidos
                $totalComprados = 0;
                $totalVendidos = 0;

                $sql = "SELECT valor_compra, valor_venta FROM productos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $totalComprados += $row["valor_compra"];
                        $totalVendidos += $row["valor_venta"];
                    }
                }
                ?>

                <tr>
                    <td colspan="2"><strong>Total Comprados:</strong></td>
                    <td colspan="2"><strong>Total Vendidos:</strong></td>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $totalComprados; ?></td>
                    <td colspan="2"><?php echo $totalVendidos; ?></td>
                </tr>
                
                </tbody>
            </table>
        </div>
        <hr>
        <div class="btn-center">
            <div class="btn-group">
                <a href="listadeproductos.php" class="btn btn-primary"><i class="bi bi-arrow-left"></i> FINALIZAR</a>
                <a href="ingresarproductos.php" class="btn btn-success"><i class="bi bi-plus"></i> AGREGAR OTRO</a>
                <a href="total.php" class="btn btn-info"><i class="bi bi-currency-dollar"></i> MOSTRAR TOTALES</a>
            </div>
        </div>
    </form>
</body>
</html>
