<?php
//conexion a la base de datos
//crear las variables de conexion
$usuarios='root';
$pw='';
$servidor='localhost';
$basedatos='super';

//conectar con la base de datos 
$conn=mysqli_connect($servidor,$usuarios,$pw) or die("no se puede conectar al servidor $servidor");
//variable para conectar a la base de datos
$db=mysqli_select_db($conn,$basedatos);
?>