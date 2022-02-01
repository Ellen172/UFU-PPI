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
                if(!strcmp($emailCad, $emailEnv)){
                    $str1 = <<<STR1
                    <h2>Email correto!</h2>
                    STR1;
                    echo $str1;
                } else {
                    $str1 = <<<STR1
                    <h2>Email incorreto!</h2>
                    STR1;
                    echo $str1;
                }
                
                
                $arqSenha = "senhaHash.txt";
                $senhaCad = carregaString($arqSenha);
                $senhaEnv = $_POST["senha"];
                if(password_verify($senhaEnv, $senhaCad)){

                    $str1 = <<<STR1
                    <h2>Senha correta!</h2>
                    STR1;
                    echo $str1;
                } else {
                    $str1 = <<<STR1
                    <h2>Senha incorreta!</h2>
                    STR1;
                    echo $str1;
                }
            ?>
            
        </main>
    </div>
</body>
</html>