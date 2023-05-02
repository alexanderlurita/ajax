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
date_default_timezone_set('America/Lima');
$conexion = getConexion(); 

if(isset($_POST['operacion'])) {
  
  //Enviaremos datos a la TABLA + UPLOAD BINARIO
  if ($_POST['operacion'] == 'registrar') {
    $respuesta = [
      "status"  => false,
      "message" => ""
      //"binario" => []
    ];

    try {

      $rutaDestino = '';        //Definido en la estructura del proyecto
      $nombreArchivo = '';      //Generar para evitar redundancia
      $nombreGuardar = 'NULL';  //Enviar a la tabla en la BD

      //Paso 1: Subir el archivo (si existe)
      if (isset($_FILES['fotografia'])) {

        //Ruta
        $rutaDestino = './img/personas/';

        //Nombre archivo (host)
        $nombreArchivo = sha1(date('c')) . '.jpg';

        //Ruta completa (ruta+nombre)
        $rutaDestino .= $nombreArchivo;

        if (move_uploaded_file($_FILES['fotografia']['tmp_name'], $rutaDestino)) {
          $nombreGuardar = $nombreArchivo;
          //$respuesta["binario"] = $_FILES['fotografia'];
        } 
      }

      $consulta = $conexion->prepare("INSERT INTO personas (apellidos, nombres, fotografia) VALUES (?,?,?)");
      $respuesta["status"] = $consulta->execute(
        array(
          $_POST['apellidos'],
          $_POST['nombres'],
          $nombreGuardar
        )
      );

    } catch(Exception $e) {
      $respuesta["message"] = "No se pudo completar. Código: " . $e->getCode();
    }
    echo json_encode($respuesta);
  }
}

?>