<?php 
require_once "conexion.php";
session_start();

$id=$_POST['id'];
$cat=$_POST['categoria'];

$sql="UPDATE lector set tema_interes_cat='$cat' where id_lector='$id' ";

 echo $resultado=mysqli_query($conexion,$sql);

?>