<?php
include("../Config/config.php");
if (!isset($_COOKIE['user'])) {
    $vai = "<script>
    window.location.href = 'index.php';
    </script>";
    echo $vai;
}

if ($_GET) { 
  $atualiza = ConexaoMysql::getConnectionMysql();
  if(isset($_GET['id'])){
  try {
  $id = $_GET['id'];
  $update = "DELETE FROM tbestoque where id=$id";
  
    $update = $atualiza->prepare($update);
    $update->execute();
  } catch (PDOException $e) {
  }
}
}
 
$vai = "<script>
    window.location.href = 'controla.php';
    </script>";
    echo $vai;
 