<?php

require "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/conexaoMysql.php";
$pdo = mysqlConnect();

class RequestResponse
{
  public $success;
  public $destination;
  function __construct($success, $destination)
  {
    $this->success = $success;
    $this->destination = $destination;
  }
}

try {
  $sql = <<<SQL
    SELECT hash_senha
    FROM usuario
    WHERE email = ?
    SQL;

  $email = $_POST["email"] ?? "";
  $senha = $_POST["senha"] ?? "";
  
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$email]);
  $row = $stmt->fetch();

  if (!$row) $success=false; // nenhum resultado (email não encontrado)
  
  $success=password_verify($senha, $row['hash_senha']);
  
  $response = new RequestResponse($success, "sucesso-login.html");  
} 
catch (Exception $e) {
  exit('Falha inesperada: ' . $e->getMessage());
}

?>