
   
                     <?php
                        /** Arquivo para conectar ao banco de dados */
                       require "../conexao/conexao.php";
                       $Id_Veiculo = $_POST["idveiculo"];
                       $marca = $_POST["marca"];
                       $modelo = $_POST["modelo"];
                       $cor = $_POST["cor"];
                       $placa = $_POST["placa"];
                       $ano = $_POST["ano"];

                        
                        /** Alterando os campos com os valores das variaveis*/
                        $sql = "UPDATE veiculo SET Marca_veiculo='$marca', Modelo_veiculo='$modelo', Cor_veiculo='$cor',
                         Placa_veiculo='$placa', Ano_veiculo='$ano' WHERE Id_Veiculo='".$Id_Veiculo."'";

                        // echo   $sql;

                        if (mysqli_query($con, $sql)) {
                            header("location: indexveiculo.php");
                            exit();
                        } else {
                            echo "<script type='text/javascript'>window.alert('Erro ao alterar informações, entre em contato com o administrador');</script>";
                            echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=indexveiculo.php">';
                        }
                       ?>