<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>processaForm</title>
    <style>
        header {
            background-color: antiquewhite;
            padding: 10px;
        }
        header h1 {
            text-align: center;
        }
        .container {
            margin: 15px auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dados do Formulário</h1>
    </header>
    <main>
        <div class="container">
        <?php
            // localizar variaveis
            $cep = $_POST["cep"];
            $estado = $_POST["estado"];
            $cidade = $_POST["cidade"];
            $bairro = $_POST["bairro"];
            $logradouro = $_POST["logradouro"];

            // previnindo ataque
            $cep = htmlspecialchars($cep);
            $estado = htmlspecialchars($estado);
            $cidade = htmlspecialchars($cidade);
            $bairro = htmlspecialchars($bairro);
            $logradouro = htmlspecialchars($logradouro);

            ?>
            <div class="row">
                <div class="col-sm">
                    <p>CEP: <span class="textCep"><?php echo $cep?></span></p>
                </div>
                <div class="col-sm">
                    <p>Estado: <span class="textEstado"><?php echo $estado?></span> </p>
                </div>
                <div class="col-sm">
                    <p>Cidade: <span class="textCidade"><?php echo $cidade?></span> </p>
                </div>
                <div class="col-sm">
                    <p>Bairro: <span class="textBairro"><?php echo $bairro?></span> </p>
                </div>
                <div class="col-sm">
                    <p>Logradouro: <span class="textLogradouro"><?php echo $logradouro?></span> </p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>