<?php 
require "/home/www/prova-ppi-2022.atwebpages.com/conexaoMysql.php";
$pdo = mysqlConnect();

$segurado = htmlspecialchars($_GET['segurado_nome']) ?? '';
$cpf = htmlspecialchars($_GET['segurado_cpf']) ?? '';
$email = htmlspecialchars($_GET['segurado_email']) ?? '';
$premio = htmlspecialchars($_GET['segurado_premio']) ?? '';
$dependente = htmlspecialchars($_GET['dependente_nome']) ?? '';
$relacao = htmlspecialchars($_GET['dependente_relacao']) ?? '';
$nascimento = htmlspecialchars($_GET['dependente_nascimento']) ?? '';

try {
    // início da transação
    $pdo->beginTransaction();

    $sql_segurado = <<<SQL
    insert into segurado (nome_seg, cpf, email, premio)
    values (?, ?, ?, ?)
    SQL;

    $stmt = $pdo->prepare($sql_segurado);
    if (! $stmt->execute([$segurado, $cpf, $email, $premio]))
        throw new Exception('Falha na inserção em segurado');

    $id_segurado = $pdo->lastInsertId();

    $sql_dependente = <<<SQL
    insert into dependente (nome_dep, relacao, data_nascimento, id_segurado)
    values (?, ?, ?, ?)
    SQL;

    $stmt = $pdo->prepare($sql_dependente);
    if (! $stmt->execute([$dependente, $relacao, $nascimento, $id_segurado]))
        throw new Exception('Falha na inserção em dependente');

    // se nenhuma excecao foi lancada, efetiva as operacoes
    $pdo->commit();
    
    header("Location:questao1.html");
    exit();
}
catch (Exception $e) {
    // desfaz as operacoes em caso de erro (exceção lançada)
    $pdo->rollBack();
    exit('Falha na transação: ' . $e->getMessage());
}

?>