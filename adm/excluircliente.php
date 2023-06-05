<?php
// Conexao com o BD
require("../conexao/conexao.php");

$codcliente = $_GET['codcliente'];

// Exclui os serviços do cliente
$sql = "DELETE FROM servico WHERE Id_Cliente = $codcliente";
mysqli_query($con, $sql);

// Exclui os veículos do cliente
$sql = "DELETE FROM veiculo WHERE Id_Cliente = $codcliente";
mysqli_query($con, $sql);

// Exclui o cliente
$sql = "DELETE FROM cliente WHERE Id_Cliente = $codcliente";
mysqli_query($con, $sql);

if (mysqli_affected_rows($con) > 0) {
    // Redireciona para a página de origem, se disponível
    if(isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("Location: index.php");
    }
    exit();
} else {
    echo "<script type='text/javascript'>window.alert('Erro ao excluir');</script>";
    echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=index.php">';
}

?>