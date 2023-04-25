<?php

//Clase conexión
function getConexion() {
  try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=dbajax;charset=UTF8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  } catch(Exception $e) {
    die($e->getMessage());
  }
}

//Modelos
$conexion = getConexion(); 

//CRUD
//Controlador
if (isset($_POST['operacion'])) {

  if ($_POST['operacion'] == 'listar') {
    $consulta = $conexion->prepare("SELECT * FROM productos");
    $consulta->execute();
    $datosObtenidos = $consulta->fetchAll(PDO::FETCH_ASSOC); 
    echo json_encode($datosObtenidos);
  }

  if ($_POST['operacion'] == 'registrar') {

    //Arrego que contiene el estado/mensaje del proceso
    $respuesta = [
      "status"  => false,
      "message" => ""
    ];

    try {
      $consulta = $conexion->prepare("INSERT INTO productos (nombre, marca, precio) VALUES (?,?,?)");
      $respuesta["status"] = $consulta->execute(
        array(
          $_POST['nombre'], 
          $_POST['marca'], 
          $_POST['precio']
        )
      );
    } catch(Exception $e) {
      //El objeto $e  (Excepción) tiene los siguientes métodos
      //getCode() - getFile() - getMessage() - getLine() - getPrevious() -getTraceAsString()
      $respuesta["message"] = "No se completó el proceso, código de error: " . $e->getCode();
    }

    echo json_encode($respuesta);
  }

}

?>