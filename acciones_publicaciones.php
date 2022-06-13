<?php
require_once('publicaciones.php');
$publicaciones= new publicaciones();
 $datos=$_REQUEST;
$usuario=$datos['usuario'];
$descripcion=$datos['descripcion'];
$estado=$datos['estado'];
$imagen=null;
//guardar la publicacion
$publicaciones->store($usuario,$descripcion,$estado,$imagen);
///busco el ultimo id de registrado
$last=$publicaciones->last_id();
//busco el registro completo
$registro=$publicaciones->show($last[0]['pub_id']);

echo json_encode($registro);

?>