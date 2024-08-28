<?php
session_start();

$usuarios = 'root';
$pw = '';
$servidor = 'localhost';
$basedatos = 'super';

$conn = mysqli_connect($servidor, $usuarios, $pw, $basedatos) or die("No se puede conectar al servidor $servidor");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['Usuario'];
    $clave = $_POST['Clave'];

    $sql = "SELECT * FROM usuarios WHERE Usuario = '$usuario' AND Clave = '$clave'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['Usuario'] = $usuario;
        header("Location: productos.php");
    } else {
        $error = "Nombre de usuario o contraseña incorrectos.";
        header("Location: index.php?error=" . $error);
        exit(); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq781YhFldvKuhfTAU6auU8T94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh60/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgX1oTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Supermercado</title>
</head>
<body>
    <form action="index.php" method="POST"> 
        <h1>INICIAR SESIÓN</h1>
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
        <hr> 
        <i class="fa-solid fa-user"></i>
        <label>USUARIO</label>
        <input type="text" name="Usuario" placeholder="Nombre de usuario">

        <i class="fa-solid fa-unlock"></i>
        <label>CLAVE</label>
        <input type="password" name="Clave" placeholder="Clave">
        <hr> 
        <button type="submit" class="btn btn-primary">INICIAR SESIÓN</button>
        <a class="btn btn-primary" href="./registrarse.php">REGISTRARSE</a>
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>
