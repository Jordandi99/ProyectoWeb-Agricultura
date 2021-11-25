<?php 
require_once "conexion.php";
session_start();

$id=$_POST['id'];
$sql="DELETE FROM articulo where id_articulo='$id'";

 echo $resultado=mysqli_query($conexion,$sql);

?>