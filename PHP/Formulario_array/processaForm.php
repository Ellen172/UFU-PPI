<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Página PHP</title>
<body>
    <?php
        $nome = $email = $estadoCivil = "";

        if(isset($_POST["nome"]))
            $nome = $_POST["nome"];
        
        if(isset($_POST["email"]))
            $nome = $_POST["email"];

        if(isset($_POST["estadoCivil"]))
            $nome = $_POST["estadoCivil"];

        $nome = htmlspecialchars($nome);
        $email = htmlspecialchars($email);
        $estadoCivil = htmlspecialchars($estadoCivil);

        echo "Bem vindo, $nome! <br>";
        echo "Seu email é $email e seu estado civil é $estadoCivil <br>";
        echo "<br> Interesses: <br>";

        if(isset($_POST["interesses"])) {
            $arrayInteresses = $_POST["interesses"];
            foreach ($arrayInteresses as $interesse)
                echo htmlspecialchars($interesse) . "<br>";
        } else echo "Nenhum interesse selecionado";
    ?>
</body>
</html>