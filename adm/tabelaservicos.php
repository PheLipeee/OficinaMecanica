<?php 
   if(!isset($_SESSION['loginadm']) and !isset($_SESSION['senhaadm']))
   {
     unset($_SESSION['loginadm']);
     unset($_SESSION['senhaadm']);
        header('location:../index.html');
     }
    
   $logado = $_SESSION['loginadm'];
   ?>
<?php
   if($escolha=='todos')
          {   


          


            $comandoSQL="SELECT *, servico.Id_Servico, cliente.Nome_cliente, veiculo.Modelo_veiculo FROM servico
            INNER JOIN veiculo ON servico.Id_Veiculo = veiculo.Id_Veiculo
            INNER JOIN cliente ON veiculo.Id_Cliente = cliente.Id_Cliente";
          } 
   
              if(!empty($_POST["ordem"]))
          {                              
               $comandoSQL="SELECT *, servico.Id_Servico, cliente.Nome_cliente, veiculo.Modelo_veiculo FROM servico
            INNER JOIN veiculo ON servico.Id_Veiculo = veiculo.Id_Veiculo
            INNER JOIN cliente ON veiculo.Id_Cliente = cliente.Id_Cliente ORDER BY Nome_cliente ASC";
          }
   
   
   
        if(!empty($_POST["pesquisa"]))
          {
             $pesquisa=$_POST["pesquisa"];
              
                $comandoSQL="SELECT *, servico.Id_Servico, cliente.Nome_cliente, veiculo.Modelo_veiculo FROM servico
            INNER JOIN veiculo ON servico.Id_Veiculo = veiculo.Id_Veiculo
            INNER JOIN cliente ON veiculo.Id_Cliente = cliente.Id_Cliente WHERE Nome_cliente LIKE '%$pesquisa%'";
         }      
   
   
    
    
    $cadastro = mysqli_query($con, $comandoSQL);
    $numCadastro = mysqli_num_rows($cadastro);
    
    if ($numCadastro > 0) { ?>
<div class="section">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
               <div class="table-responsive">
                  <table class="table table-sm table-hover">
                     <thead class="bg-info">
                        <tr>
                           <th width="300">Observação</th>
                            <th width="100">valor</th>
                           <th width="100">Data</th>
                           <th width="300">Nome Cliente</th>
                           <th width="200">Veículo</th>
                            <th width="50"></th>
                           <th width="50"></th>
                           <th width="50"></th>
                           <th width="50"></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php for ($x = 0; $x < $numCadastro; $x++) {
                           $dados = mysqli_fetch_assoc($cadastro);
                           
                           ?>
                        <tr>
                           <td><?php echo ucfirst("$dados[Observacao_servico]"); ?></td>
                           <td><?php echo ucfirst("R$ ".str_replace('.', ',',"$dados[Valor_servico]")); ?></td>
                           <td><?php echo date("d/m/Y", strtotime("$dados[Data_servico]")); ?></td>
                           <td><?php echo ucfirst("$dados[Nome_cliente]"); ?></td>
                           <td><?php echo ucfirst("$dados[Modelo_veiculo]"); ?></td>
                        




                            <td> <a class="text-secondary" href="imprimirordemservico.php?Id_Servico=<?php echo "$dados[Id_Servico]";?>"><i class="material-icons">print</i></a></td>
                           <td><a class="text-sucess" href="servicoalterar.php?codservico=<?php echo "$dados[Id_Servico]";?>"><i class="material-icons">cached</i></a></td>
                           <td><a class="text-danger" href="excluirservico.php?codservico=<?php echo "$dados[Id_Servico]";?>"> <i class="material-icons">delete</i></a></td>
                          
                        </tr>
                        <?php
                           }
                           
                           // fechando o FOR
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php } else {
   // fechando o if
   ?>
<div class="section">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="alert alert-danger" role="alert">Não foram encontrados resultados</div>
         </div>
      </div>
   </div>
</div>
<?php } ?>