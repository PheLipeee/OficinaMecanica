
   
                     <?php
                        /** Arquivo para conectar ao banco de dados */
                       require "../conexao/conexao.php";
                       $id_cliente = $_POST["idcliente"];
                       $nome = $_POST["nome"];
                       $telefone = $_POST["telefone"];
                       $email = $_POST["email"];
                       $cep = $_POST["cep"];
                       $rua = $_POST["rua"];
                       $numero = $_POST["numero"];
                       $bairro = $_POST["bairro"];
                       $cidade = $_POST["cidade"];
                       $estado = $_POST["estado"];

                        
                        /** Alterando os campos com os valores das variaveis*/
                        $sql = "UPDATE cliente SET Nome_cliente='$nome', Telefone_cliente='$telefone', Email_cliente='$email', Cep_cliente='$cep',
                         Rua_cliente='$rua', Numero_cliente='$numero', Bairro_Cliente='$bairro', Cidade_cliente='$cidade',
                          Estado_cliente='$estado' WHERE Id_Cliente='".$id_cliente."'";

                    // echo   $sql;

                         if (mysqli_query($con,$sql))
                        {
                            echo "<script type='text/javascript'>window.alert('Informações alteradas!');</script>";
                            echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=indexcliente.php">';
                        exit;
                        }else{
                            echo "<script type='text/javascript'>window.alert('Erro ao alterar o registros');</script>";
                        echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=indexcliente.php">';
                        }
                        ?>