<?php

require "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/trabalho6/conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  SELECT cep, rua, bairro, cidade
  FROM trab7_endereco
  SQL;

  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}

class Endereco
{  
  public $cep;
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro; 
    $this->cidade = $cidade;
  }
}

while ($row = $stmt->fetch()) {
  $cep = htmlspecialchars($row['cep']);
  $rua = $row['rua'];
  $bairro = $row['bairro'];
  $cidade = $row['cidade'];

  $endereco = new Endereco($rua, $bairro, $cidade);
  $enderecos = array($cep => $endereco);
} /* armazena apenas o ultimo endereço */

$cep = $_GET['cep'] ?? '';
  
$endereco = array_key_exists($cep, $enderecos) ? 
  $enderecos[$cep] : new Endereco('', '', '');
  
echo json_encode($endereco);