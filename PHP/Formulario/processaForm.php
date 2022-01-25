<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>processaForm</title>
    <style>
        td {
            border: solid 1px gray;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $mensagem = $_POST["mensagem"];

        echo <<<HTML
        <table>
            <tr>
                <td>$nome</td>
                <td>$email</td>
                <td>$mensagem</td>
            </tr>   
        </table>
        HTML;
    ?>



</body>
</html>