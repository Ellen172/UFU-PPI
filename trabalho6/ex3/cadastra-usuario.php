<?php 

require "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/trabalho6/conexaoMysql.php";
$pdo = mysqlConnect();

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";


// calcula um hash de senha seguro para armazenar no BD
$hash_senha = password_hash($senha, PASSWORD_DEFAULT);

try {
    $sql = <<<SQL
    INSERT INTO usuario (email, hash_senha)
    VALUES (?, ?)
    SQL;
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $email, $hash_senha
    ]);

    header("location: index.html");
    exit();
} 
catch (Exception $e) {  
    //error_log($e->getMessage(), 3, 'log.php');
    if ($e->errorInfo[1] === 1062)
        exit('Dados duplicados: ' . $e->getMessage());
    else
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}

?>