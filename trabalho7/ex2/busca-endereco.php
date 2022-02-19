<?php

require "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/trabalho6/conexaoMysql.php";
$pdo = mysqlConnect();

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

try {
/* busca rua, bairro, cidade 
  da tabela endereço
  onde cep = (o que for passado) */
  $sql = <<<SQL
  SELECT rua, bairro, cidade
  FROM trab7_endereco
  WHERE cep = ?
  SQL;
  
  $cep = $_GET['cep'] ?? ''; // busca o cep (passado pela url no index)

/* prepara e executa o codigo sql
  passando como parametro o cep do get */
  $stmt = $pdo->prepare($sql); 
  $stmt->execute([$cep]); 

  while ($row = $stmt->fetch()){ 
  /* defini cada coluna */
    $rua = $row['rua'];
    $bairro = $row['bairro'];
    $cidade = $row['cidade'];

    $endereco = new Endereco($rua, $bairro, $cidade);
  }
  echo json_encode($endereco);
} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}