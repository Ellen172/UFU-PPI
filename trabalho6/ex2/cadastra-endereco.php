<?php 

require "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/trabalho6/conexaoMysql.php";
$pdo = mysqlConnect();

$cep = $_POST["cep"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$bairro = $_POST["bairro"];
$logradouro = $_POST["logradouro"];

try {

    $sql = <<<SQL
    INSERT INTO endereco (cep, estado, cidade, bairro, logradouro)
    VALUES (?, ?, ?, ?, ?)
    SQL;
  
    // prepared statements - prevenir ataques do tipo SQL Injection
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cep, $estado, $cidade, $bairro, $logradouro]);
  
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