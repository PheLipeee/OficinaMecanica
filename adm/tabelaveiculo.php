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
            $comandoSQL="SELECT veiculo.*, cliente.Nome_cliente
FROM veiculo
INNER JOIN cliente ON veiculo.Id_Cliente = cliente.Id_Cliente";

          } 
   
              if(!empty($_POST["ordem"]))
          {                              
              $comandoSQL="SELECT * FROM veiculo";
          }
   
   
   
        if(!empty($_POST["pesquisa"]))
          {
             $pesquisa=$_POST["pesquisa"];
              
                $comandoSQL="SELECT * FROM veiculo";
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
                           <th width="150">Marca</th>
                           <th width="150">Modelo</th>
                           <th width="150">Cor</th>
                           <th width="150">Ano</th>
                           <th width="150">Placa</th>
                           <th width="300">Dono</th>
                           <th width="75">Alt</th>
                           <th width="75">Exc</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php for ($x = 0; $x < $numCadastro; $x++) {
                           $dados = mysqli_fetch_assoc($cadastro);
                           
                           ?>
                        <tr>
                           <td><?php echo ucfirst("$dados[Marca_veiculo]"); ?></td>
                           <td><?php echo ucfirst("$dados[Modelo_veiculo]"); ?></td>
                           <td><?php echo ucfirst("$dados[Cor_veiculo]"); ?></td>
                           <td><?php echo ucfirst("$dados[Ano_veiculo]"); ?></td>
                           <td><?php echo ucfirst("$dados[Placa_veiculo]"); ?></td>
                           <td><?php echo ucfirst("$dados[Nome_cliente]"); ?></td>
                           <td><a class="text-sucess" href="veiculoalterar.php?codveiculo=<?php echo "$dados[Id_Veiculo]";?>"><i class="material-icons">cached</i></a></td>
                           <td><a class="text-danger" href="excluirveiculo.php?codveiculo=<?php echo "$dados[Id_Veiculo]";?>"> <i class="material-icons">delete</i></a></td>
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