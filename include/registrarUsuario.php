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
$rfc=$_POST['rfc'];
$edad=$_POST['edad'];
$genero=$_POST['genero'];
$dir=$_POST['direccion'];
$tel=$_POST['telefono'];
$ref=$_POST['referencias'];
$cat=$_POST['categoria'];

$sql="INSERT into usuarios (correo,username,contra,rol)
                  values ('$correo','$user','$pass','$rol')";

 echo $resultado=mysqli_query($conexion,$sql);

//consulta para saber que id tiene el usuario

$id = mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo = $correo");

if(mysqli_num_rows($id)==1){
    $row = mysqli_fetch_array($id);
    $ide = $row['id_usuario'];
}

//Insertar usuario

$sql2="INSERT into escritor (id_usuario,nombre,apeP,rfc,edad,genero,direccion,telefono,referencias,tema_interes_cat)
                  values ('$ide','$nombre','$ap','$rfc','$edad','$genero','$dir','$tel','$ref','$cat')";

 echo $resultado2=mysqli_query($conexion,$sql2);


?>