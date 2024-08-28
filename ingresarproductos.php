<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq781YhFldvKuhfTAU6auU8T94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous">

    <style>
        .center-container {
            background-image: url('https://tunegociobonito.com/wp-content/uploads/2020/10/decorar-tienda-abarrotes-2.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .center-table {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .custom-btn {
            background-color: #FF5733;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin: 10px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .custom-btn:hover {
            background-color: #FF964E;
        }

        h1.text-with-shadow,
        label.text-with-shadow {
            font-size: 36px;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

      
        h1.text-with-shadow {
            color: black;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1 class="text-with-shadow" style="text-align: center;">INGRESE PRODUCTOS</h1>
    <div class="center-container">
        <form action="proceso.php" method="POST" class="center-table">
            <div>
                <label class="text-with-shadow">INGRESE NOMBRE DEL PRODUCTO </label>
            </div>
            <div>
                <input type="text" name="producto" placeholder="Nombre Producto" required>
            </div>

            <div>
                <label class="text-with-shadow">INGRESE VALOR DEL PRODUCTO COMPRADO</label>
            </div>
            <div>
                <input type="number" name="valor_compra" placeholder="Valor Producto Comprado" required>
            </div>

            <div>
                <label class="text-with-shadow">INGRESE VALOR DE PRODUCTO VENDIDO</label>
            </div>
            <div>
                <input type="number" name="valor_venta" placeholder="Valor Producto Vendido" required>
            </div>

            <button type="submit" name="guardar" id="guardarBtn" class="btn custom-btn">GUARDAR</button>
        </form>
    </div>
</body>
</html>
