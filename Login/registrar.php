<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
include ('conect.php');


class AltaOk extends Exception {}
class MySQLDuplicateKeyException extends Exception {}

try
{

mysql_query ("INSERT INTO usuarios VALUES ('".$_POST['usuario']."', '".$_POST['password']."', '".$_POST['nombre']."', '".$_POST['apellido']."', '".$_POST['email']."', ".$_POST['dni'].")");



	        if (mysql_errno() == 0){
                         throw new AltaOk('El usuario ha sido dado de alta');
		}
		 else
		{
	       		 if (mysql_errno() == 1062)
			{
               		 throw new MySQLDuplicateKeyException('Ese nombre de usuario ya existe en la base de datos');
			}
			else
			{
               		 throw new Exception('Error al insertar: '.mysql_error());
			}

                 }
}
catch (AltaOk $e) {

      $AltaOk = $e->getMessage();
      echo $AltaOk .'<br>';
      echo '<a href="inicio.html">Ingresar</a>';

}

catch (MySQLDuplicateKeyException $e) {

      $error_dup = $e->getMessage();
      echo "<script language='javascript'>alert('$error_dup');window.location='inicio.html'</script>";
}
catch (Exception $e) {

      $error_desc = $e->getMessage();
      echo $error_desc .'<br>';
      echo '<a href="inicio.html">Volver</a>';
}
?>
</body>
</html>