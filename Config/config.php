<?php
class ConexaoMysql
{
    private static $connnection;

    private function __construct(){}

    public static function getConnectionMysql() {
       try {
            if(!isset($connnection)){
                 $connnection = new PDO("sqlite:" . "DAO/dados.db");
                 $connnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connnection;
         } catch (PDOException $e) {
            try {
               if(!isset($connnection)){
                    $connnection = new PDO("sqlite:" . "../DAO/dados.db");
                    $connnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               }
               return $connnection;
            } catch (PDOException $e) {
               $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
               $mensagem .= "\nErro: " . $e->getMessage();
               throw new Exception($mensagem);
            }
         }
     }
}

