<?php

function checkLogin($pdo, $email, $senha)
{
  $sql = <<<SQL
    SELECT hash_senha
    FROM usuario
    WHERE email = ?
    SQL;

  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if (!$row) return false; // nenhum resultado (email não encontrado)
    
    return password_verify($senha, $row['hash_senha']);
  } 
  catch (Exception $e) {
    //error_log($e->getMessage(), 3, 'log.php');
    exit('Falha inesperada: ' . $e->getMessage());
  }
}

$errorMsg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  require "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/trabalho6/conexaoMysql.php";
  $pdo = mysqlConnect();

  $email = $_POST["email"] ?? "";
  $senha = $_POST["senha"] ?? "";

  if (checkLogin($pdo, $email, $senha)) {
    header("location: login-home.html");
    exit();
  } 
  else
    $errorMsg = "Dados incorretos";
}

?>
