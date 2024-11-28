<?php
if (isset($_POST['correo'])) {
  echo $_POST['correo'];

function leer_config($nombre, $esquema){
	$config = new DOMDocument();
	$config->load($nombre);
	$res = $config->schemaValidate($esquema);
	if ($res===FALSE){ 
	   throw new InvalidArgumentException("Revise fichero de configuración");
	} 		
	$datos = simplexml_load_file($nombre);	
	$ip = $datos->xpath("//ip");
	$nombre = $datos->xpath("//nombre");
	$usu = $datos->xpath("//usuario");
	$clave = $datos->xpath("//clave");	
	$cad = sprintf("mysql:dbname=%s;host=%s", $nombre[0], $ip[0]);
	$resul = [];
	$resul[] = $cad;
	$resul[] = $usu[0];
	$resul[] = $clave[0];
	return $resul;
}
function registrarUsuario(){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
  $correo = $_POST['correo'];
  $contraseña = $_POST['contraseña'];
  $pais = $_POST['pais'];
  $ciudad= $_POST['ciudad'];
  $direccion= $_POST['direccion'];
	$ins = "INSERT INTO `restaurantes` (`CodRes`, `Correo`, `Clave`, `Pais`, `CP`, `Ciudad`, `Direccion`) VALUES (NULL, '$correo', '$contraseña', '$pais', NULL, '$ciudad', '$direccion')";

  try {
    $resul = $bd->query($ins);
    $resul->execute();
    echo 'Exito al registrar';
  } catch (PDOException $e) {
    echo 'ERROR: '.$e;
  }
	
}
}

registrarUsuario();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="registrar.php" method="post">
    <input type="email" name="correo" placeholder="Correo electronico">
    <input type="password" name="contraseña" placeholder="Contraseña">
    <input type="text" name="pais" placeholder="Pais">
    <input type="text" name="ciudad" placeholder=" Ciudad">
    <input type="text" name="direccion" placeholder="Direccion">
    <button type="submit">Registrarte</button>
  </form>
  
</body>
</html>