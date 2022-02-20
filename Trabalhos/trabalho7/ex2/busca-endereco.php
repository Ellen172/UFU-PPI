<?php

require "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/conexaoMysql.php";
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
  
/* busca o cep (passado pela url no index) 
  usando htmlespecialchars para combater sql injection */
  $cep = htmlspecialchars($_GET['cep'] ?? ''); 

/* prepara e executa o codigo sql
  passando como parametro o cep do get */
  $stmt = $pdo->prepare($sql); 
  $stmt->execute([$cep]); 

  $row = $stmt->fetch(); // busca a proxima linha da tabela
  /* defini cada coluna */
  $rua = $row['rua'];
  $bairro = $row['bairro'];
  $cidade = $row['cidade'];

  $endereco = new Endereco($rua, $bairro, $cidade);

} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}