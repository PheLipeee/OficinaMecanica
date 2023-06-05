<?php

$observacao = $_POST["observacao"];
$data = $_POST["data"];
$idcliente = $_POST["idcliente"];
$idveiculo = $_POST["idveiculo"];
$valor = $_POST["valor"];
$valorconvertido=str_replace(',', '.',$valor);
$itens = $_POST["itens"]; // array contendo os ids dos itens de serviço selecionados
//Variaveis enviadas pelo form - metodo post

require "../conexao/conexao.php";

// Insere o serviço na tabela de servico
$sql = "INSERT INTO servico (Observacao_servico,Data_servico,Valor_servico,Id_Cliente,Id_Veiculo) VALUES ('$observacao','$data','$valorconvertido','$idcliente','$idveiculo')";

if (mysqli_query($con, $sql)) {
    // Recupera o id do serviço inserido
    $id_servico = mysqli_insert_id($con);

// Insere os itens de serviço selecionados na tabela de juncao
foreach ($itens as $id_itensserv) {
    $sql_juncao = "INSERT INTO juncao (Id_Servico, Id_itensserv) VALUES ('$id_servico', '$id_itensserv')";
    mysqli_query($con, $sql_juncao);
}

    // Calcula o valor total da ordem de serviço
    $sql_total = "UPDATE servico SET Valor_servico = (SELECT SUM(Valor_itensserv) FROM juncao JOIN itens_servicos on (juncao.Id_itensserv = itens_servicos.Id_itensserv) WHERE juncao.Id_Servico = $id_servico) WHERE Id_Servico = $id_servico";
    mysqli_query($con, $sql_total);

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