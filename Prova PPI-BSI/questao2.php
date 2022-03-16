<?php 

require "/home/www/prova-ppi-2022.atwebpages.com/conexaoMysql.php";
$pdo = mysqlConnect();

$sql = <<<SQL
select nome_dep, relacao, data_nascimento, nome_seg, cpf, email, premio
from dependente, segurado
where segurado.id - dependente.id_segurado
SQL;

$stmt = $pdo->query($sql);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Questão 2</title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Nome do dependente</th>
                    <th>Data de nascimento</th>
                    <th>Relação com segurado</th>
                    <th>Nome segurado</th>
                    <th>Cpf do segurado</th>
                    <th>Email do segurado</th>
                    <th>Premio do segurado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = $stmt->fetch()){
                        // nome_dep, relacao, data_nascimento, nome_seg, cpf, email, premio
                        $nome_dependente = htmlspecialchars($row['nome_dep']);
                        $data_nascimento = htmlspecialchars($row['data_nascimento']);
                        $relacao = htmlspecialchars($row['relacao']);
                        $nome_seg = htmlspecialchars($row['nome_seg']);
                        $cpf = htmlspecialchars($row['cpf']);
                        $email = htmlspecialchars($row['email']);
                        $premio = htmlspecialchars($row['premio']);

                        echo <<<HTML
                        <tr>
                            <td>$nome_dependente</td>
                            <td>$data_nascimento</td>
                            <td>$relacao</td>
                            <td>$nome_seg</td>
                            <td>$cpf</td>
                            <td>$email</td>
                            <td>$premio</td>
                        </tr>
                        HTML;
                    }

                ?>
            </tbody>
        </table>

    </body>
</html>