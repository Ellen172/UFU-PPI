<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    echo "Bem vindo, $nome! <br>";
    echo "Seu e-mail é $email <br>";

    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        input, textarea {
            margin: 5px;
            display: block;
        }
    </style>
</head>
<body>
    <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"])?> ">
        <div>
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="email" id="email" name="email">
        </div>
        <button type="submit" class="btn btn-default">Enviar</button>
    </form>
</body>
</html>