
   
                     <?php
                        /** Arquivo para conectar ao banco de dados */
                        require "../conexao/conexao.php";
                        $Id_Servico = $_POST["idservico"];
                        $observacao = $_POST["observacao"];
                        $data = $_POST["data"];
                        $valor = $_POST["valor"];
                        $valorconvertido = str_replace(',', '.', $valor);


                        /** Alterando os campos com os valores das variaveis*/
                        $sql = "UPDATE servico SET Observacao_servico='$observacao', Data_servico='$data', Valor_servico='$valorconvertido' WHERE Id_Servico='" . $Id_Servico . "'";

                        echo   $sql;

                        if (mysqli_query($con, $sql)) {
                            echo "<script type='text/javascript'>window.alert('Informações alteradas!');</script>";
                            echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=indexservico.php">';
                            exit;
                        } else {
                            echo "<script type='text/javascript'>window.alert('Erro ao alterar o registros');</script>";
                            echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=indexservico.php">';
                        }
                        ?>