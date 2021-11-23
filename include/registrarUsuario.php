<?php 
require_once "conexion.php";
$conexion=conexion();
//Insertar en tabla usuarios
$correo=$_POST['correo'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$rol=$_POST['rol'];

$sql="INSERT into usuarios (correo,username,contra,rol)
                  values ('$correo','$user','$pass','$rol')";

 echo $resultado=mysqli_query($conexion,$sql);

//consulta para saber que id tiene el usuario

//Insertar en tabla escritores
$correo=$_POST['nombre'];
$user=$_POST['apellido'];
$pass=$_POST['rfc'];
$rol=$_POST['edad'];
$correo=$_POST['genero'];
$user=$_POST['direccion'];
$pass=$_POST['telefono'];
$rol=$_POST['referencias'];
$correo=$_POST['categoria'];



?>