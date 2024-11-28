<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Crear Cuenta</h1>
  <form action="create.php">
    <p>
      <input type="text" name="username" placeholder="Nombre de usuario">
    </p>
    <p>
      <input type="password" name="password" placeholder="Contraseña">
    </p>
    <p>
      <input type="text" name="fullname" placeholder="Nombre Completo">
    </p>
    <p>
      <select name="level" id="">
        <option value="1">Usuario</option>
        <option value="2">Editor</option>
        <option value="3">Administrador</option>
      </select>
    </p>
    <p>
      <input type="submit" value="Crear">
    </p>
  </form>
</body>

</html>