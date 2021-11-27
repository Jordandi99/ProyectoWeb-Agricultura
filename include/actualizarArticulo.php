<?php 
require_once "conexion.php";
session_start();

$id=$_POST['id'];
$cont=$_POST['cont'];
$nom=$_POST['nom'];
$cat=$_POST['cat'];
$st=$_POST['st'];

$sql="UPDATE articulo set categoria='$cat',nom='$nom',cuerpo='$cont',estatus='$st' where id_articulo='$id' ";

 echo $resultado=mysqli_query($conexion,$sql);

?>