 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BRASLAR - Estoque </title>
   <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.css">
   <link rel="icon" type="image/x-icon" href="icone.png">
   <link rel="stylesheet" href="dataTables.dataTables.min.css">
   <script src="jquery-3.7.1.min.js"></script>

 </head>

   <?php
    include "Config/config.php";
    function lerquantidade() {
      $con=ConexaoMysql::getConnectionMysql();
    $sql="select * from tbestoque where quantidade>0 order by codigo asc";
    $sql= $con->prepare($sql);
    $sql->execute();
    $item = $sql->fetchALL(PDO::FETCH_ASSOC);
    return $item;
    }

    function lersaldao() {
      $con=ConexaoMysql::getConnectionMysql();
    $sql="select * from tbestoque where saldao>0 order by codigo asc";
    $sql= $con->prepare($sql);
    $sql->execute();
    $item = $sql->fetchALL(PDO::FETCH_ASSOC);
    return $item;
    }
    
    
    ?>
   <div class="conteiner bg-dark text-bg-dark p-3">
     <div class="row">
       <div class="col">
         <img src="content/logogeladeira2.png" alt="" style="width:110px">
       </div>
       <div class="col text-start">
         <h3>GRUPO BRASLAR</h3>
       </div>
     </div>

   </div>
   <div class="container text-center">
    <h2 class="alert alert-dark">ESTOQUE</h2>
   </div>
   <div class="container container-sm" style="margin-top:30px;">
     <table class="table table-striped table-bordered table-hover table-dark" id="operacao" style="width: fit-content;">
       <thead style="position: sticky;top:0;">

         <tr>
           <th class="text-center">CÓDIGO</th>
           <th class="text-center">MODELO</th>
           <th class="text-center">DESCRIÇÃO</th>
           <th class="text-center">QUANTIDADE</th>
         </tr>
       </thead>
      
         <tbody>
        <?php 
          $teste=lerquantidade();
         
          if(count($teste)>0){
            foreach($teste as $k){        
              ?>
              <tr>
                <td><?php echo $k['codigo']?></td>
                <td><?php echo $k['modelo']?></td>
                <td><?php echo $k['descricao']?></td>
                <td class="text-end"><?php echo $k['quantidade']?></td>
              </tr>
              <?php
            
            }
          }
        ?>


    
         </tbody>
     </table>
</div>
<div class="container text-center">
    <h2 class="alert alert-dark">SALDAO</h2>
   </div>
   <div class="container container-sm" style="margin-top:30px;">
     <!-- tabela saldo -->
     <table class="table table-striped table-bordered table-hover table-dark " name="saldao" id="saldao" >
       <thead>
         <tr>
           <th class="text-center">CÓDIGO</th>
           <th class="text-center">MODELO</th>
           <th class="text-center">DESCRIÇÃO</th>
           <th class="text-center">QUANTIDADE</th>
         </tr>
       </thead>
     
       <tbody>
        <?php 
          $teste=lersaldao();
         
          if(count($teste)>0){
            foreach($teste as $k){        
              ?>
              <tr>
                <td><?php echo $k['codigo']?></td>
                <td><?php echo $k['modelo']?></td>
                <td><?php echo $k['descricao']?></td>
                <td class="text-end"><?php echo $k['saldao']?></td>
              </tr>
              <?php
            
            }
          }
        ?>


    
         </tbody>
     </table>

   </div>



<script src="dataTables.min.js"></script>
<script>
Object.assign(DataTable.defaults, {
    searching: true,
    ordering: true,
    paging:false,
    info: false,
    language:{
     search:"Busca",
     zeroRecords:"Nenhum registro encontrado",
     emptyTable:"Nenhum dado",
     loadingRecords:"Carregando registros"
    }
    
});
 
new DataTable('#saldao');
new DataTable('#operacao');


</script>
 </body>

 </html>