<?php
/**
 * Created by PhpStorm.
 * User: HILARI
 * Date: 02/01/2020
 * Time: 10:40
 */

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','educades');

$servidor="mysql:dbname=".BD.";host=".SERVIDOR;
try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
    );
    //echo "<script>alert('Conexión con exito a la base de datos');</script>";
}catch (PDOException $e){
    echo "<script>alert('error al conectar con la base de datos');</script>";
}



$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$d4 = $_POST['d4'];
$d5 = $_POST['d5'];
$d6 = $_POST['d6'];
$d7 = $_POST['d7'];
$d8 = $_POST['d8'];
$d9 = $_POST['d9'];
$d10 = $_POST['d10'];



echo $d1." - ".$d2." - ".$d3." - ".$d4;

$sentencia = $pdo->prepare("INSERT INTO docentes
      ( rbd_docente, nombres, apellido_p, apellido_m, rut_docente, especialidad, n_titulo, institucion_ed_sup, fecha, pais,) 
VALUES(:rbd_docente, :nombres, :apellido_p, :apellido_m, :rut_docente, :especialidad, :n_titulo, :institucion_ed_sup, :fecha, :pais)");

$sentencia->bindParam(':rbd_docente',$d1);
$sentencia->bindParam(':nombres',$d2);
$sentencia->bindParam(':apellido_p',$d3);
$sentencia->bindParam(':apellido_m',$d4);
$sentencia->bindParam(':rut_docente',$d5);
$sentencia->bindParam(':especialidad',$d6);
$sentencia->bindParam(':n_titulo',$d7);
$sentencia->bindParam(':institucion_ed_sup',$d8);
$sentencia->bindParam(':fecha',$d9);
$sentencia->bindParam(':pais',$d10);

$sentencia->execute();