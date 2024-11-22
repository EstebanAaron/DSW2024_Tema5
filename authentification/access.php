<?php
session_start();
require 'connection.php';



  if (!empty($_GET['username']) && !empty($_GET['password'])) {
    $stmtlogin = $link->prepare('SELECT * FROM users where username =:username and password = :password');
    $stmtlogin->bindParam(':username',$_GET['username']);
    $stmtlogin->bindParam(':password',$_GET['password']);
    $stmtlogin->execute();
  
  if ($stmtlogin->rowCount()>0) {
    echo "<h1>Acceso autorisado</h1>";
    $_SESSION['username']=$_GET['username'];
    header('Location: index.php');
    
    
  }else{

   
    header('Location: login.php?error=Deteccion+de+intento+de+hacking+reportando+a+la+policia');
  }
}

