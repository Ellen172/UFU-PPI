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
        body {
            margin: 10px;
        }
    </style>
</head>
<body>
    

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Descrição</th>
        </tr>
        </thead>
        <tbody>
            <?php 
                $codProd = $_GET['codProd'];
                $i = 1;
                foreach ($codProd as $produto) { 

                    $str = <<<BLOCO
                        <tr>
                        <th scope="row">$i</th>
                        <td>$produto</td>
                        <td>Descrição</td>
                        </tr>
                    BLOCO;
                    $i++;
                    echo $str;
                }
                
            ?>
        </tbody>
      </table>
</body>
</html>