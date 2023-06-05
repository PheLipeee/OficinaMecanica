        <?php 
         session_start();
         if(!isset($_SESSION['loginadm']) and !isset($_SESSION['senhaadm']))
         {
           unset($_SESSION['loginadm']);
           unset($_SESSION['senhaadm']);
              header('location:../index.php');
           }
          
         $logado = $_SESSION['loginadm'];
         ?>
<?php
include_once "../conexao/conexao.php";



$Id_Servico = $_GET['Id_Servico'];
$comandoSQL = "SELECT *, servico.Id_Servico, cliente.Nome_cliente, cliente.Telefone_cliente, cliente.Cep_cliente, cliente.Rua_cliente, cliente.Numero_cliente, cliente.Bairro_cliente, cliente.Cidade_cliente, cliente.Estado_cliente, veiculo.Modelo_veiculo 
              FROM servico
              INNER JOIN veiculo ON servico.Id_Veiculo = veiculo.Id_Veiculo
              INNER JOIN cliente ON veiculo.Id_Cliente = cliente.Id_Cliente 
              WHERE Id_Servico = " . $Id_Servico;

$cadastro = mysqli_query($con, $comandoSQL);
$dados = mysqli_fetch_assoc($cadastro);



$html = '<table border="1" width="100%" style="text-align: center;">';
$html .= '<tr><h4>Dados do Cliente</h4></tr>';
$html .= '</table>';

$html .= '<table border="0" width="100%">';
$html .= ' <tr >';
$html .= ' <td width="50%">Nome: ' . $dados["Nome_cliente"] . '</td>';
$html .= '<td width="50%">Telefone/Celular: ' . $dados["Telefone_cliente"] . '</td>';
$html .= ' </tr>';


$html .= ' <tr >';
$html .= '<td width="50%">Cep: ' . $dados["Cep_cliente"] . '</td>';
$html .= ' <td width="50%">Rua: ' . $dados["Rua_cliente"] . '</td>';
$html .= ' </tr>';

$html .= ' <tr >';
$html .= ' <td width="50%">Bairro: ' . $dados["Bairro_cliente"] . '</td>';
$html .= '<td width="50%">Número: ' . $dados["Numero_cliente"] . '</td>';
$html .= ' </tr>';


$html .= ' <tr >';
$html .= '<td width="50%">Cidade: ' . $dados["Cidade_cliente"] . '</td>';
$html .= '<td width="50%">Estado: ' . $dados["Estado_cliente"] . '</td>';
$html .= ' </tr>';
$html .= '</table>';



$html .= '<table border="1" width="100%" style="text-align: center;">';
$html .= '<tr><h4>Observação</h4></tr>';
$html .= '</table>';

$html .= '<table border="0" width="100%">';
$html .= ' <tr >';
$html .= '<td width="100%">Observacao: ' . $dados["Observacao_servico"] . '</td>';
$html .= ' </tr>';
$html .= '</table>';

$html .= '<table border="1" width="100%" style="text-align: center;">';
$html .= '<tr><h4>Valor</h4></tr>';
$html .= '</table>';

$html .= '<table border="0" width="100% style="text-align: center">';
$html .= ' <tr >';
$html .= '<td width="100%">Valor do Serviço: R$ ' . str_replace('.', ',',"$dados[Valor_servico]") . '</td>';
$html .= ' </tr>';
$html .= '</table>';




//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once "dompdf/autoload.inc.php";

//Criando a Instancia
$dompdf = new DOMPDF();

// Carrega seu HTML
$dompdf->load_html(
    '

     <table border="0" width="100%">
    <tr>

    <td width="20%">
     <img src="../img/logo.png" width="45" height="50"> 
    
   </td>

       <td width="60%">
      <h2 style="text-align: center;">Ordem de Serviço</h2>
   </td>
  
       <td width="20%">
        <p style="text-align: center;">Data: ' .
        date('d/m/Y', strtotime($dados["Data_servico"])) .
        '</p>
   </td>

 
   </tr>
 </table>



       
      ' .$html .'
<br>



<br>
<br>

<p align="center">___________________________________________</p>
<p align="center">Assinatura do Cliente</p>    

       <p>Forma de pagamento: (  ) Dinheiro (  ) Cartão (  ) Pix (  ) PagSeguro (  ) Outros</p>
'
);

//Renderizar o html
$dompdf->render();


//Exibibir a página
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-M-Y H:i');




$dompdf->stream($dados["Nome_cliente"]. ".pdf", [
    "Attachment" => true, //Para realizar o download somente alterar para true
]);
?>


