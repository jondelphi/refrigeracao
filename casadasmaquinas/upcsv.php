
<?php 
require_once('../Config/config.php');

$arquivo = $_FILES['arquivo'];
function ler() {
    // Verificar se o arquivo foi enviado por POST
    if (!isset($_FILES['arquivo'])) {
      return false;
    }
  
    // Obter informações do arquivo
    $arquivo = $_FILES['arquivo'];
    $nomeArquivo = $arquivo['name'];
    $tipoArquivo = $arquivo['type'];
    $tamanhoArquivo = $arquivo['size'];
    $erroArquivo = $arquivo['error'];
    $tmpNomeArquivo = $arquivo['tmp_name'];
  
    // Validar o arquivo
    if ($erroArquivo !== UPLOAD_ERR_OK) {
      return false; // Erro no upload do arquivo
    }
  
    // Validar o tipo de arquivo
    if ($tipoArquivo !== 'application/vnd.ms-excel' && $tipoArquivo !== 'text/csv') {
      return false; // Tipo de arquivo inválido
    }
  
    // Abrir o arquivo CSV para leitura
    $fp = fopen($tmpNomeArquivo, 'r');
    if (!$fp) {
      return false; // Erro ao abrir o arquivo
    }
  
    // Ler e processar as linhas do CSV
    $arrayAssociativo = array();
    $linha = 0; // Contador de linha
    $item=[];
    while (($dados = fgetcsv($fp, 1000, ';')) !== false) {
      if ($linha > 0) { // Desprezar a primeira linha (cabeçalho)
        $item[$linha-1][0]=$dados[0];
        $item[$linha-1][1]=$dados[1];
        $item[$linha-1][2]=$dados[2];
        $item[$linha-1][3]=$dados[3];
        $item[$linha-1][4]=$dados[4];

      }
      $linha++;
    }
  
    // Fechar o arquivo CSV
    fclose($fp);
  
    // Retornar o array associativo
    return $item;
  }
  

function apaga(){
    $con=ConexaoMysql::getConnectionMysql();
    $sql="delete from tbestoque where 1=1";
    $sql= $con->prepare($sql);
    $sql->execute();
    
}
function insere($item){
    $codigo=$item[0];
    $descricao=$item[1];
    $modelo=$item[2];
    $quantidade=$item[3];
    $saldao=$item[4];

    $con=ConexaoMysql::getConnectionMysql();
    $sql="INSERT INTO tbestoque(codigo, modelo, quantidade, saldao, descricao)
    VALUES('{$codigo}','{$modelo}','{$quantidade}','{$saldao}','{$descricao}')";
    $sql= $con->prepare($sql);
    $sql->execute();
    
}
apaga();
$teste=ler();
foreach ($teste as $k) {
    insere($k);
}


$vai="<script>
window.location.href = '../index.php';
</script>";
//echo $vai;



?>
<a href="../index.php">HOME</a>