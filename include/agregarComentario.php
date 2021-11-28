<?php 
require_once "conexion.php";
session_start();
$userN = $_SESSION['username'];
//Insertar en tabla articulos
$idArticulo=$_POST['id_articulo'];
$comentario=$_POST['comentario'];
$fe=$_POST['fecha'];

$consultide = "SELECT E.id_usuario
FROM usuarios U JOIN lector E
ON (U.id_usuario=E.id_usuario)
WHERE U.username='$userN'";
$resultadoA = mysqli_query($conexion, $consultide);
$txt = mysqli_fetch_row($resultadoA); 




$sql="INSERT into comentarios (id_articulo,id_usuario,comentario,fecha 	)
                  values ('$idArticulo','$txt[0]','$comentario','$fe')";

 echo $resultado=mysqli_query($conexion,$sql);



?>