<?php
    require("../conexao/conexao.php");

    // Precisa validar para ter certeza que existe o id_cliente
    $id_cliente = $_GET['id_cliente'];

    $comandoSQL = "SELECT Id_Veiculo, Modelo_veiculo FROM veiculo WHERE Id_cliente = $id_cliente"; // Faz a sql

    $res = $pdo->query($comandoSQL); // Executa a sql na conexão
    
    $dados = $res->fetchAll(); // Pega os resultados da consulta e guarda em $dados
 
    echo json_encode($dados); // Trasforma os dados em Json para o ajax consumir                  
?>