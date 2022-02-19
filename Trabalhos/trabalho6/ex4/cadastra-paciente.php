<?php 

require "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/trabalho6/conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$sexo = $_POST["sexo"] ?? "";
$email = $_POST["email"] ?? "";
$telefone = $_POST["telefone"] ?? "";
$cep = $_POST["cep"] ?? "";
$logradouro = $_POST["logradouro"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";
$peso = $_POST["peso"] ?? "";
$altura = $_POST["altura"] ?? "";
$tipoSanguineo = $_POST["tipoSanguineo"] ?? "";

try {
    $pdo->beginTransaction();

    // inserir pessoa
    $sql1 = <<<SQL
    INSERT INTO pessoa (nome, sexo, email, telefone, cep, logradouro, cidade, estado)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    SQL;
    $stmt = $pdo->prepare($sql1);
    if(! $stmt->execute([$nome, $sexo, $email, $telefone, $cep, $logradouro, $cidade, $estado]))
        throw new Exception('Falha no cadastro de pessoa');

    // pegar codigo de pessoa
    $codigo = $pdo->lastInsertId();
    
    // inserir paciente
    $sql2 = <<<SQL
    INSERT INTO paciente (peso, altura, tipoSanguineo, codigo)
    VALUES (?, ?, ?, ?)
    SQL;
    $stmt = $pdo->prepare($sql2);
    if(! $stmt->execute([$peso, $altura, $tipoSanguineo, $codigo]))
        throw new Exception('Falha no cadastro de paciente');

    $pdo->commit();
    header("location: index.html");
    exit();
}
catch (Exception $e) {
    $pdo->rollBack();
    exit('Falha na transação: ' . $e->getMessage());
}
?>