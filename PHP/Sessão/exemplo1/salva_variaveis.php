<?php 
// inicializa a sessão 
// chamado antes que seja produzida qualquer saida
session_start();

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
?>

<!doctype html>
<html>
    <body>
        <?php
        // defini as variaveis de sessão
        $_SESSION["email"] = $email;
        $_SESSION["nome"] = $nome;
        ?>
        <h3>Variaveis salvas!</h3>
        <a href="./mostra_variaveis.php">Mostrar variaveis</a>
    </body>
</html>