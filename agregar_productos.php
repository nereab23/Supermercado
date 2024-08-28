<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo empty($persona) ? 'Crear' : 'Editar'; ?> Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('./imagenes/fondo.gif'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            backdrop-filter: blur(5px); 
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.3); 
        }
        .table th,
        .table td {
            padding: 12px 15px;
            border: 1px solid #ccc;
        }
        .table th {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }
        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="alert alert-danger text-center" role="alert">
            <h3><?php echo empty($persona) ? 'REGISTRAR' : 'Editar'; ?> PERSONAS</h3>
            <a class="btn btn-outline-dark" href="./index.php">ATRAS</a>
        </div>
        <form method="POST" action="./procesardatos.php">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label for="usuario">NOMBRE Y APELLIDO</label>
                        </td>
                        <td>
                            <input class="form-control" id="usuario" name="usuario" value="<?php echo isset($persona['usuario']) ? $persona['usuario'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="numero_documento">NUMERO DE DOCUMENTO</label>
                        </td>
                        <td>
                            <input class="form-control" type="text" id="numero_documento" name="numero_documento" pattern="[0-9]+" value="<?php echo isset($persona['numero_documento']) ? $persona['numero_documento'] : ''; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="telefono">TELEFONO</label>
                        </tds>
                        <td>
                            <input class="form-control" type="text" id="telefono" name="telefono" pattern="[0-9]+" value="<?php echo isset($persona['telefono']) ? $persona['telefono'] : ''; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tipo_vehiculo">TIPO DE VEHICULO</label>
                        </td>
                        <td>
                        <select class="form-control" id="tipo_vehiculo" name="tipo_vehiculo">
                        <option value=""></option>
                        <option value="AUTOMOVIL" <?php echo isset($vehiculo['tipo_vehiculo']) && $vehiculo['tipo_vehiculo'] === 'automovil' ? 'selected' : ''; ?>>AUTOMOVIL</option>
                        <option value="MOTOCICLETA" <?php echo isset($vehiculo['tipo_vehiculo']) && $vehiculo['tipo_vehiculo'] === 'motocicleta' ? 'selected' : ''; ?>>MOTOCICLETA</option>
                        <option value="CAMIONETA" <?php echo isset($vehiculo['tipo_vehiculo']) && $vehiculo['tipo_vehiculo'] === 'camioneta' ? 'selected' : ''; ?>>CAMIONETA</option>
                        <option value="CAMION_LIGERO" <?php echo isset($vehiculo['tipo_vehiculo']) && $vehiculo['tipo_vehiculo'] === 'camion_ligero' ? 'selected' : ''; ?>>CAMION LIGERO</option>
                        <option value="BICICLETA" <?php echo isset($vehiculo['tipo_vehiculo']) && $vehiculo['tipo_vehiculo'] === 'bicicleta' ? 'selected' : ''; ?>>BICICLETA</option>
                        <option value="AUTOBUS" <?php echo isset($vehiculo['tipo_vehiculo']) && $vehiculo['tipo_vehiculo'] === 'autobus' ? 'selected' : ''; ?>>AUTOBUS</option>
                        <option value="VEHICULO_CARGA" <?php echo isset($vehiculo['tipo_vehiculo']) && $vehiculo['tipo_vehiculo'] === 'vehiculo_carga' ? 'selected' : ''; ?>>VEHICULO DE CARGA</option>
                        <option value="VEHICULO_ELECTRICO" <?php echo isset($vehiculo['tipo_vehiculo']) && $vehiculo['tipo_vehiculo'] === 'vehiculo_electrico' ? 'selected' : ''; ?>>VEHICULO ELECTRICO</option>
                        <option value="VEHICULO_DISCAPACIDAD" <?php echo isset($vehiculo['tipo_vehiculo']) && $vehiculo['tipo_vehiculo'] === 'vehiculo_discapacidad' ? 'selected' : ''; ?>>VEHICULO CON DISCAPACIDAD</option>
                        <option value="VEHICULO_EMERGENCIA" <?php echo isset($vehiculo['tipo_vehiculo']) && $vehiculo['tipo_vehiculo'] === 'vehiculo_emergencia' ? 'selected' : ''; ?>>VEHICULO DE EMERGENCIA</option>
                          </select>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <label for="numero_placa">NUMERO DE PLACA</label>
                        </td>
                        <td>
                            <input class="form-control" id="numero_placa" name="numero_placa" value="<?php echo isset($persona['numero_placa']) ? $persona['numero_placa'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
    <td><label for="tiempo">TIPO DE TIEMPO</label></td>
    <td>
        <select class="form-control" id="tiempo" name="tiempo">
            <option value=""></option>
            <option value="HORA" <?php echo isset($numero_horas) && $numero_horas === 'HORA' ? 'selected' : ''; ?>>HORAS</option>
            <option value="DIA" <?php echo isset($numero_dias) && $numero_dias === 'DIA' ? 'selected' : ''; ?>>DIAS</option>
        </select>
    </td>
</tr>
<tr id="numero_horas" style="display: none;">
    <td><label for="numero_horas">Horas (máximo 24)</label></td>
    <td><input type="number" class="form-control" id="numero_horas" name="numero_horas" max="24"></td>
</tr>
<tr id="numero_dias" style="display: none;">
    <td><label for="numero_dias">Días</label></td>
    <td><input type="number" class="form-control" id="numero_dias" name="numero_dias"></td>
</tr>
<script>
  var tiempoSelect = document.getElementById("tiempo");
var numeroHorasInput = document.getElementById("numero_horas");
var diasInput = document.getElementById("numero_dias");

tiempoSelect.addEventListener("change", function () {
    numeroHorasInput.style.display = tiempoSelect.value === "HORA" ? "table-row" : "none";
    diasInput.style.display = tiempoSelect.value === "DIA" ? "table-row" : "none";
});
</script>

                </tbody>
            </table>
            <div class="row">
                <div class="col-6">
                    <div class="form-group text-center">
                        <input type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-outline-danger" value="GUARDAR">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>