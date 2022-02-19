<?php

require "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/trabalho6/conexaoMysql.php";
$pdo = mysqlConnect();

try {
    $sql = <<<SQL
    SELECT * FROM paciente INNER JOIN pessoa
    WHERE paciente.codigo = pessoa.codigo
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
    <title>Lista de Pacientes</title>
    <style>
        header {
            margin: 0;
            width: 100%;
        }
        header h1 {
            background-color: #5E656C;
            border-top: 2px solid black;
            border-bottom: 2px solid black;
            padding: 5px 0;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            text-align: center;
            font-size: 1.5rem;
            color: #E2E3E5;
        }
        main {
            margin-top: 10px;
            font-size: 1rem;
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <header>
        <h1>Pacientes cadastrados</h1>
    </header>
    <div class="container">
        <main>
            <table class="table table-striped table-secondary">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>CEP</th>
                        <th>Logradouro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Peso</th>
                        <th>Altura</th>
                        <th>Tipo Sanguineo</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while ($row = $stmt->fetch()) {
                        $codigo = $row['codigo'];
                        $nome = $row['nome'];
                        $sexo = $row['sexo'];
                        $email = $row['email'];
                        $telefone = $row['telefone'];
                        $cep = $row['cep'];
                        $logradouro = $row['logradouro'];
                        $cidade = $row['cidade'];
                        $estado = $row['estado'];
                        $peso = $row['peso'];
                        $altura = $row['altura'];
                        $tipoSanguineo = $row['tipoSanguineo'];

                        echo <<<HTML
                        <tr>
                            <td>$codigo</td> 
                            <td>$nome</td>
                            <td>$sexo</td>
                            <td>$email</td>
                            <td>$telefone</td>
                            <td>$cep</td>
                            <td>$logradouro</td>
                            <td>$cidade</td>
                            <td>$estado</td>
                            <td>$peso</td>
                            <td>$altura</td>
                            <td>$tipoSanguineo</td>
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