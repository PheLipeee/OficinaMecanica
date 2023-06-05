<?php
//variaveis clientes
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$cep = $_POST["cep"];
$rua = $_POST["rua"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];

//variaveis veiculo
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$cor = $_POST["cor"];
$ano = $_POST["ano"];
$placa = $_POST["placa"];

require "../conexao/conexao.php";

// Insere o cliente no banco de dados
$sql_cliente = "bINSERT INTO cliente (Nome_cliente,Telefone_cliente,Email_cliente,Cep_cliente,Rua_cliente,Numero_cliente,Bairro_cliente,Cidade_cliente,Estado_cliente ) 
                VALUES ('$nome','$telefone', '$email','$cep','$rua','$numero','$bairro','$cidade','$estado')";

if (mysqli_query($con, $sql_cliente)) {
    // Recupera o ID do cliente recém-criado
    $id_cliente = mysqli_insert_id($con);

    // Insere o veículo no banco de dados
    $sql_veiculo = "INSERT INTO veiculo ( Marca_veiculo, Modelo_veiculo, Cor_veiculo, Ano_veiculo, Placa_veiculo, Id_cliente) 
                    VALUES ('$marca', '$modelo', '$cor', '$ano', '$placa', '$id_cliente')";

    if (mysqli_query($con, $sql_veiculo)) {
        // Redireciona para a página de origem, se disponível
        if(isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "<script type='text/javascript'>window.alert('Erro ao cadastrar veículo');</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=index.php">';
    }
} else {
    echo "<script type='text/javascript'>window.alert('Erro ao cadastrar cliente');</script>";
    echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=index.php">';
}
?>