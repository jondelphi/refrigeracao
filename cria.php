<?php
try {
    // Nome do arquivo do banco de dados SQLite
    $db_file = "DAO/dados.db";

    // Cria uma nova conexão PDO para o banco de dados SQLite
    $pdo = new PDO("sqlite:" . $db_file);

    // Define o modo de erro do PDO para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria uma tabela no banco de dados
    $pdo->exec("CREATE TABLE tbestoque (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    codigo VARCHAR(32),
                    modelo VARCHAR(80),
                    quantidade INTEGER,
                    saldao INTEGER
                )");

    echo "Banco de dados e tabela criados com sucesso!";
} catch(PDOException $e) {
    // Em caso de erro, exibe a mensagem de erro
    echo "Erro ao criar banco de dados e tabela: " . $e->getMessage();
}
?>
