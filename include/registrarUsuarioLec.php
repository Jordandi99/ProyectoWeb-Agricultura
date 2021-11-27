<?php 
require_once "conexion.php";
session_start();
//Insertar en tabla usuarios
$correo=$_POST['correo'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$rol=$_POST['rol'];

$nombre=$_POST['nombre'];
$ap=$_POST['apellido'];
$edad=$_POST['edad'];
$genero=$_POST['genero'];
$cat=$_POST['categoria'];

$sql="INSERT into usuarios (correo,username,contra,rol)
                  values ('$correo','$user','$pass','$rol')";

 echo $resultado=mysqli_query($conexion,$sql);

//consulta para saber que id tiene el usuario
$consultide = "SELECT id_usuario FROM usuarios WHERE correo = '$correo'";
$resultado4 = mysqli_query($conexion, $consultide);
$ide = mysqli_fetch_row($resultado4);
//Insertar usuario

$sql2="INSERT into lector (id_usuario,nombre,apeP,edad,genero,tema_interes_cat)
                  values ('$ide[0]','$nombre','$ap','$edad','$genero','$cat')";

 echo $resultado2=mysqli_query($conexion,$sql2);


?>