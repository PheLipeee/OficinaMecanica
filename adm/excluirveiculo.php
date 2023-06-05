
                     <?php 
                        //conexao com o bd
                        require("../conexao/conexao.php");
                        
                        $codveiculo = $_GET['codveiculo']; 
                        //exclui valores no banco
                        
                        $sql="DELETE FROM veiculo WHERE Id_Veiculo = ".$codveiculo;

                        echo $sql;

                     if (mysqli_query($con, $sql)) {
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
