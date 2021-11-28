<?php 
require 'conexion.php';
session_start();
 $nombre = $_POST['nombre'];
 $pass = $_POST['contraseña'];
 $rol = "Lector";
 $rol2="Escritor";


 $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE username = '".$nombre."' and contra ='".$pass."' and rol = '".$rol."'");
 $nr = mysqli_num_rows($query);

    if($nr == 1)
    {
        header("location: ../indexLector.php");
        $_SESSION['username'] = $nombre;
        
    }else if ($nr ==0)
    {
        header("Location:../index.php");
    }
 
    $q= mysqli_query($conexion,"SELECT * FROM usuarios WHERE username = '".$nombre."' and contra ='".$pass."' and rol = '".$rol2."'");
    $n = mysqli_num_rows($q);
    if($n == 1)
    {
        header("location: ../indexEscritor.php");
        $_SESSION['username'] = $nombre;
    }else if ($nr ==0)
    {
        header("Location:../index.php");
    }
 
?>