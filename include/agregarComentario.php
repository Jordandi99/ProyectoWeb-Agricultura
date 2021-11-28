<?php 
require_once "conexion.php";
session_start();
$userN = $_SESSION['username'];
//Insertar en tabla articulos
$idArticulo=$_POST['idAuto'];
$idUsuario=$_POST['idUsuario'];
$comentario=$_POST['Txtarea'];
$fe=$_POST['fechaC'];



$sql="INSERT into comentarios (id_articulo,id_usuario,comentario,fecha)
                  values ('$idArticulo','$idUsuario','$comentario','$fe')";

 echo $resultado=mysqli_query($conexion,$sql);



?>