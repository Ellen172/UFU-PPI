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

                $arqEmail = "email.txt";
                $email = $_POST["email"];
                $email = htmlspecialchars($email);
                
                salvaString($email, $arqEmail);
                
                $respEmail = <<<RESP
                <h3>Email salvo com sucesso!</h3>
                RESP;
                echo $respEmail;
                
                $arqSenha = "senhaHash.txt";
                $senha = $_POST["senha"];
                $senha = htmlspecialchars($senha);
                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
                
                salvaString($senhaHash, $arqSenha);
                
                $respSenha = <<<RESP
                <h3>Senha salvo com sucesso!</h3>
                RESP;
                echo $respSenha;



                function salvaString($string, $arquivo)
                {
                    $arq = fopen($arquivo, "w");
                    fwrite($arq, $string);
                    fclose($arq);
                }

            ?>

            <form action="ex4_dados.php" method="POST">
                <button type="submit" class="btn btn-primary">Ver Dados</button>
            </form>
        </main>
    </div>
</body>
</html>