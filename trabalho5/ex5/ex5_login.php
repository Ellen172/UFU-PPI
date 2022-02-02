<?php
    function sucesso(){
        header("Location:ex5_sucesso.php");
        exit();
    }
    function erro(){
        header("Location:ex5_login.html");
        exit();
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
    <title>trabalho5</title>
    <style>
        body{
            background-color: rgb(240, 240, 240);
            margin: 0;
        }
        main {
            background-color: white;
            border: 1px solid rgb(220, 220, 220);   
            border-radius: 10px;         
            width: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
        }
        .button button {
            display: inline-block;
            float: right;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <main>
            <?php

                function carregaString($arquivo)
                {
                    $arq = fopen($arquivo, "r");
                    $string = fgets($arq);
                    fclose($arq);
                    return $string;
                }

                $arqEmail = "email.txt";
                $emailCad = carregaString($arqEmail);
                $emailEnv = $_POST["email"];

                $arqSenha = "senhaHash.txt";
                $senhaCad = carregaString($arqSenha);
                $senhaEnv = $_POST["senha"];

                if(!strcmp($emailCad, $emailEnv) and password_verify($senhaEnv, $senhaCad)){
                    sucesso();
                } else {
                    erro();
                }
            ?>
            
        </main>
    </div>
</body>
</html>