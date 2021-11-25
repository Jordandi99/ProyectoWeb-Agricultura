<?php 
require_once "conexion.php";
session_start();

$id=$_POST['id'];
$dir=$_POST['direccion'];
$tel=$_POST['telefono'];
$cat=$_POST['categoria'];

$sql="UPDATE escritor set direccion='$dir',telefono='$tel',tema_interes_cat='$cat' where id_escritor='$id' ";

 echo $resultado=mysqli_query($conexion,$sql);

?>