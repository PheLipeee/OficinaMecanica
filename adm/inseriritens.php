<?php

$nomeservico = $_POST["nomeservico"];
$valorservico = $_POST["valorservico"];

//Converte a variavel valorservico trocando a "," pelo "."
$valorconvertido=str_replace(',', '.',$valorservico);

require "../conexao/conexao.php";
//Variaveis enviadas pelo form - metodo post


    //insere valores no banco
    $sql = "insert into itens_servicos (Nome_itensserv,Valor_itensserv) value ('$nomeservico','$valorconvertido')";

echo $sql;


    if (mysqli_query($con, $sql)) {
                // Redireciona para a página de origem, se disponível
        if(isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "<script type='text/javascript'>window.alert('Erro ao cadastrar');</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=index.php">';
    }



?>
