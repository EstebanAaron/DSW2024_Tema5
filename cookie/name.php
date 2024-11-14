<?php
if (isset($_GET['delete'])) {
  setcookie('name','a',time()-1);
}else{
  if (!empty($_GET['name'])) {
$name= $_GET['name'];
setcookie('name',$name);
}else{
  if (isset($_COOKIE['name'])) {
    $name=$_COOKIE['name'];
  }
}
}
$name;


if (isset($name)) {
  printf('<p>Su nombre es %s</p>',$name);
?>
<form action="name.php">
  <button type="submit" name="delete"> BORRAR COOKIE</button>
</form>
<?php
  
}else{
  echo '<p>No se encuentra tu nombre</p>';
  ?>
  <form action="name.php">
    <input type="text" name="name" id="">
    <button type="submit">Enviar</button>
  </form>
  <?php
}?>
<p><a href="name.php">Actualizar</a></p>
