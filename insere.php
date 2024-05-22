<?php

require_once("Config/config.php");


$conn= ConexaoMysql::getConnectionMysql();


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      BRASLAR REFRIGERAÇÂO 
    </title>
    <link rel="icon" type="image/x-icon" href="content/icone.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-icons.css">
    <script src="ajax.js"></script>
  

</head>

<body>
  <?php 
$array=array();
$array[]=array("cod"=> "600100O1","modelo"=> "VEGA C500P2 AD","desc"=>"EXPOSITOR CERVEJEIRA VEGA C500P2 PORTA DE VIDRO PERFIL PVC 500L - PRETO - 220V");
$array[]=array("cod"=> "600100O7","modelo"=> "VEGA R500P1 AD ","desc"=>"EXPOSITOR REFRIGERADOR VEGA R500P1 ALL BLACK PORTA DE VIDRO PERFIL PVC 500L - PRETO - 127V");
$array[]=array("cod"=> "600100O9","modelo"=> "STYLUS C500P2 AD","desc"=>"EXPOSITOR CERVEJEIRA STYLUS C500P2 ALL BLACK PORTA DE VIDRO PERFIL OCULTO 500L - PRETO - 220V");

foreach ($array as $k) {
  $cod=$k['cod'];
  $nome=$k['modelo'];
  $descricao=$k['desc'];
  $qtd=0;
  $sql="INSERT INTO tbestoque(codigo,nome,descricao,qtd)Values('$cod','$nome','$descricao',$qtd)";
  $sql=$conn->prepare($sql);
  $sql->execute();
 
}
  ?>

</body>

</html>