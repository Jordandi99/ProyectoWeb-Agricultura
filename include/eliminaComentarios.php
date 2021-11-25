<?php 
require_once "conexion.php";
session_start();

$id=$_POST['id'];
$sql="DELETE FROM comentarios where id_comentario='$id'";

 echo $resultado=mysqli_query($conexion,$sql);

?>