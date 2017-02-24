<?php
try
{

@$conexion=mysql_connect("localhost", "root", "") ;
if (!@$conexion)
{
 throw new Exception('No se pudo establecer una conexión');
}

@$dbseleccionada=mysql_select_db("login", $conexion);
if (!@$dbseleccionada)
{
 throw new Exception('No se pudo seleccionar la base de datos');
}

}

catch (Exception $e)
 {
 echo $e->getMessage();
 }
?>

