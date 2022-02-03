<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>trabalho5</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php

                function carregaString($arquivo)
                {
                    $arq = fopen($arquivo, "r");
                    $string = fgets($arq);
                    fclose($arq);
                    return $string;
                }

                $arqEmail = "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/trabalho5/email.txt";
                //$arqEmail = "email.txt";
                $email = carregaString($arqEmail);
                $str1 = <<<STR1
                    <div class="col">
                    <p>Email: $email</p>
                    </div>
                    STR1;
                echo $str1;
                
                $arqSenha = "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/trabalho5/senhaHash.txt";
                //$arqSenha = "senhaHash.txt";
                $senha = carregaString($arqSenha);
                $str1 = <<<STR1
                    <div class="col">
                    <p>Senha hash: $senha</p>
                    </div>
                    STR1;
                echo $str1;
            ?>
            
        </div>
    </div>
</body>
</html>