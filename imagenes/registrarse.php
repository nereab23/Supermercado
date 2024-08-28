
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['Usuario'];
    $clave = $_POST['Clave'];

    if (empty($usuario) || empty($clave)) {
        $error = "Todos los campos son obligatorios";
    } else {
        $usuarios = 'root';
        $pw = '';
        $servidor = 'localhost';
        $basedatos = 'super';

        $conn = mysqli_connect($servidor, $usuarios, $pw, $basedatos) or die("No se puede conectar al servidor $servidor");

        if ($conn) {
            $usuario = mysqli_real_escape_string($conn, $usuario);
            $clave = mysqli_real_escape_string($conn, $clave);

            $sql = "INSERT INTO usuarios (Usuario, Clave) VALUES ('$usuario', '$clave')";
            if (mysqli_query($conn, $sql)) {
                header("Location: index.php");
                exit;
            } else {
                $error = "Error al registrar el usuario: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        } else {
            $error = "Error en la conexión a la base de datos: " . mysqli_connect_error();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq781YhFldvKuhfTAU6auU8T94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous">
    <title>REGISTRARSE</title>
</head>
<body>
    <form action="registrarse.php" method="POST">
        <h1>CREAR CUENTA</h1>
        <hr>
        <?php 
            if(isset($error)){
            ?>
            <p class="error">
                <?php
                echo $error;
                ?>
            </p>
            <?php
            } 
        ?>    
        <hr>
        <i class ="fa-solid fa-user"></i>
        <label>USUARIO</label>
        <input type="text" name="Usuario" placeholder="Nombre de usuario">

        <i class ="fa-solid fa-unlock"></i>
        <label>CLAVE</label>
        <input type="password" name="Clave" placeholder="Clave">
        <hr>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
