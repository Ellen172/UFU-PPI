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
    $emailCad = carregaString($arqEmail);
    $emailEnv = $_POST["email"];

    $arqSenha = "/home/www/ppi-12011bsi208-trabalho1.atwebpages.com/trabalho5/senhaHash.txt";
    //$arqSenha = "senhaHash.txt";
    $senhaCad = carregaString($arqSenha);
    $senhaEnv = $_POST["senha"];

    if(!strcmp($emailCad, $emailEnv) and password_verify($senhaEnv, $senhaCad)){
        header("Location:sucesso.php");
        exit();
    } else {
        header("Location:index.html");
        exit();
    }
?>