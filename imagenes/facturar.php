<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturación de Producto</title>
    <script>
        function agregarProducto() {
            const contenedor = document.getElementById('productos');
            
            const nuevoProducto = document.createElement('div');
            nuevoProducto.classList.add('producto');
            
            nuevoProducto.innerHTML = `
                <fieldset>
                    <legend>Datos del Producto</legend>
                    <label for="codigo[]">Código:</label>
                    <input type="text" name="codigo[]" required><br><br>
                    
                    <label for="nombre_producto[]">Nombre:</label>
                    <input type="text" name="nombre_producto[]" required><br><br>
                    
                    <label for="marca[]">Marca:</label>
                    <input type="text" name="marca[]" required><br><br>
                    
                    <label for="cantidad[]">Cantidad:</label>
                    <input type="number" name="cantidad[]" required><br><br>
                    
                    <label for="precio[]">Precio:</label>
                    <input type="text" name="precio[]" required><br><br>
                </fieldset>
            `;
            
            contenedor.appendChild(nuevoProducto);
        }
    </script>
</head>
<body>
    <h1>Facturación de Producto</h1>
    <form action="procesar_factura.php" method="POST">
        <div id="productos">
            <!-- Aquí se agregará el primer producto y los adicionales -->
            <fieldset>
                <legend>Datos del Producto</legend>
                <label for="codigo[]">Código:</label>
                <input type="text" name="codigo[]" required><br><br>
                
                <label for="nombre_producto[]">Nombre:</label>
                <input type="text" name="nombre_producto[]" required><br><br>
                
                <label for="marca[]">Marca:</label>
                <input type="text" name="marca[]" required><br><br>
                
                <label for="cantidad[]">Cantidad:</label>
                <input type="number" name="cantidad[]" required><br><br>
                
                <label for="precio[]">Precio:</label>
                <input type="text" name="precio[]" required><br><br>
            </fieldset>
        </div>
        <button type="button" onclick="agregarProducto()">Agregar Otro Producto</button>
        
        <fieldset>
            <legend>Datos del Cliente</legend>
            <label for="documento">Documento:</label>
            <input type="text" id="documento" name="documento" required><br><br>
            
            <label for="nombre_cliente">Nombre:</label>
            <input type="text" id="nombre_cliente" name="nombre_cliente" required><br><br>
            
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required><br><br>
            
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required><br><br>
            
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required><br><br>
            
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required><br><br>
        </fieldset>
        
        <input type="submit" value="Generar Factura">
    </form>
</body>
</html>
