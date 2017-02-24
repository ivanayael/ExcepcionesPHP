<?php
session_start()
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php

try {

if (isset($_SESSION['usuario'])){
	echo 'Bienvenido '.$_SESSION['usuario'];
	echo '<br /><a href="pagina3.php">Pagina 3</a>';
	echo '<br /><a href="salir.php">Cerrar sesion</a>';
}
else {

 throw new Exception("Para acceder a este contenido tiene que estar logueado");

} 

}catch (Exception $e) {

      $error_login = $e->getMessage();
      echo "<script>alert('$error_login');window.location='inicio.html'</script>";

}
?>
</body>
</html>