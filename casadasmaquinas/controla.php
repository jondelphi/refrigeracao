<?php
include("../Config/config.php");
if (!isset($_COOKIE['user'])) {
    $vai = "<script>
    window.location.href = 'index.php';
    </script>";
    echo $vai;
}
if($_GET){
  //posso fazer o cadastro por aqui mesmo
  try {
    $atualiza = ConexaoMysql::getConnectionMysql();    
    $sel="SELECT count(*) as total FROM tbestoque WHERE codigo LIKE '{$_GET['codigo']}'";
    $sel = $atualiza->prepare($sel);
    $sel->execute();
    $sel = $sel->fetch(PDO::FETCH_ASSOC);
    $total = $sel['total'];
    if($total==0){
    $cod = $_GET['codigo'];
    $mod = $_GET['modelo'];
    $desc = $_GET['descricao'];    
    $in = "INSERT INTO tbestoque (codigo, modelo, descricao) VALUES('{$cod}','{$mod}','{$desc}')";      
    $in = $atualiza->prepare($in);
    $in->execute();
    }
    } catch (PDOException $e) {

    }   
}

if ($_POST) { 
  $atualiza = ConexaoMysql::getConnectionMysql();
  if(isset($_POST['quantidade'])){
  try {
 
  $qtd = $_POST['quantidade'];
  $id = $_POST['id'];
  $update = "UPDATE tbestoque set quantidade=$qtd where id=$id";
  
    $update = $atualiza->prepare($update);
    $update->execute();
  } catch (PDOException $e) {
  }
}
if(isset($_POST['saldao'])){
    try {
      $atualiza = ConexaoMysql::getConnectionMysql();    
      $qtd = $_POST['saldao'];
      $id = $_POST['id'];
      $update = "UPDATE tbestoque set saldao=$qtd where id=$id";      
      $update = $atualiza->prepare($update);
      $update->execute();
      } catch (PDOException $e) {

      }   
  }
  if(isset($_POST['codigo'])){
    try {
      $atualiza = ConexaoMysql::getConnectionMysql();    
      $qtd = $_POST['codigo'];
      $id = $_POST['id'];
      $update = "UPDATE tbestoque set codigo='{$qtd}'where id=$id";      
      $update = $atualiza->prepare($update);
      $update->execute();
      } catch (PDOException $e) {

      }   
  }

  if(isset($_POST['modelo'])){
    try {
      $atualiza = ConexaoMysql::getConnectionMysql();    
      $qtd = $_POST['modelo'];
      $id = $_POST['id'];
      $update = "UPDATE tbestoque set modelo='{$qtd}'where id=$id";      
      $update = $atualiza->prepare($update);
      $update->execute();
      } catch (PDOException $e) {

      }   
  }
  if(isset($_POST['descricao'])){
    try {
      $atualiza = ConexaoMysql::getConnectionMysql();    
      $qtd = $_POST['descricao'];
      $id = $_POST['id'];
      $update = "UPDATE tbestoque set descricao='{$qtd}'where id=$id";      
      $update = $atualiza->prepare($update);
      $update->execute();
      } catch (PDOException $e) {

      }   
  }
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estoque - BRASLAR</title>
  <script src="js/ajax.js"></script>
  <script src="js/script.js"></script>
  <link rel="stylesheet" href="../bootstrap-5.2.2-dist/css/bootstrap.css">
  
  <link rel="icon" type="image/x-icon" href="icone.png">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
  <div class="container bg-dark text-bg-dark p-3">
    <div class="row">
      <div class="col">
        <img src="content/logogeladeira.png" alt="" style="width:110px;">
      </div>
      <div class="col text-start">
        <h3>ESTOQUE</h3>
      </div>
    </div>
  </div>
 
<div class="container text-center bg-dark my-5 p-3">
<form action="upcsv.php" method="post" enctype="multipart/form-data">
<div class="input-group mb-3">
  <input type="file" class="form-control" id="arquivo" name="arquivo" onchange="validarCSV(this)" required>
  <label class="input-group-text" for="arquivo">Upload</label>
  <input type="submit" value="OK" class="btn btn-success">
</div>
    </form>
</div>
<script>
  function validarCSV(input) {
    // Obter o arquivo selecionado
    const file = input.files[0];

    // Verificar a extensão do arquivo
    const ext = file.name.split('.').pop();
    if (ext.toLowerCase() !== 'csv') {
        alert('Selecione um arquivo CSV!');
        input.value = ''; // Limpar o campo de entrada
        return false;
    }

    // Arquivo CSV válido
    return true;
}

</script>
</body>
</html>