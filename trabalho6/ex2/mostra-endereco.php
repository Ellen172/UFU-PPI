<?php

require "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/trabalho6/conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  SELECT cep, estado, cidade, bairro, logradouro
  FROM endereco
  SQL;

  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Lista de Endereços</title>
    <style>
        header {
            margin: 0;
            width: 100%;
        }
        header h1 {
            background-color: #C7DBD2;
            border-top: 2px solid black;
            border-bottom: 2px solid black;
            padding: 5px 0;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            text-align: center;
            font-size: 1.5rem;
        }
        main {
            margin-top: 10px;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Endereços cadastrados</h1>
    </header>
    <div class="container">
        <main>
            <table class="table table-striped table-success">
                <thead>
                    <tr>
                        <th>Cep</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>Logradouro</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while ($row = $stmt->fetch()) {
                        $cep = htmlspecialchars($row['cep']);
                        $estado = htmlspecialchars($row['estado']);
                        $cidade = htmlspecialchars($row['cidade']);
                        $bairro = htmlspecialchars($row['bairro']);
                        $logradouro = htmlspecialchars($row['logradouro']);

                        echo <<<HTML
                        <tr>
                            <td>$cep</td> 
                            <td>$estado</td>
                            <td>$cidade</td>
                            <td>$bairro</td>
                            <td>$logradouro</td>
                        </tr>      
                        HTML;

                    }
                ?>
                </tbody>
            </table>
            <a href="index.html">Menu de opções</a>
        </main>
    </div>
</body>
</html>