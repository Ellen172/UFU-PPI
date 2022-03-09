<?php 
session_start();

?>

<!DOCTYPE html> 
<html>
    <body>
        <?php
            $nome = $_SESSION['nome'];
            $email = $_SESSION['email'];

            echo "Bem vindo, $nome <br>";
            echo "Seu email é $email <br>";
            echo "Dados salvos no script anterior";
        ?>
    </body>
</html>