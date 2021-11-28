<?php 
require_once "conexion.php";
session_start();
$userN = $_SESSION['username'];
//Insertar en tabla articulos
$cat=$_POST['categoria'];
$nom=$_POST['nom'];
$cont=$_POST['cuerpo'];
$fe=$_POST['fecha'];
$sta=$_POST['estatus'];


$consultide = "SELECT E.id_escritor
FROM usuarios U JOIN escritor E
ON (U.id_usuario=E.id_usuario)
WHERE U.username='$userN'";
$resultadoA = mysqli_query($conexion, $consultide);
$txt = mysqli_fetch_row($resultadoA); 



$sql="INSERT into articulo (id_escritor,categoria,nom,cuerpo,fecha,estatus)
                  values ('$txt[0]','$cat','$nom','$cont','$fe','$sta')";

 echo $resultado=mysqli_query($conexion,$sql);



?>