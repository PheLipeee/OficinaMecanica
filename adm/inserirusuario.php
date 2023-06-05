<?php

$login = $_POST["login"];
$senha = $_POST["senha"];
$senhaconvertida = md5($senha);



require "../conexao/conexao.php";
//Variaveis enviadas pelo form - metodo post


    //insere valores no banco
    $sql = "insert into administrador (loginadm, senhaadm) value ('$login','$senhaconvertida')";


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
