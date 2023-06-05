<?php

$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$cor = $_POST["cor"];
$placa = $_POST["placa"];
$ano = $_POST["ano"];
$idcliente = $_POST["idcliente"];




require "../conexao/conexao.php";
//Variaveis enviadas pelo form - metodo post


    //insere valores no banco
    $sql = "insert into veiculo (Marca_veiculo,Modelo_veiculo,Cor_veiculo,Placa_veiculo,Ano_veiculo,Id_cliente) value ('$marca','$modelo','$cor','$placa','$ano','$idcliente')";


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
