


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
            $comandoSQL="SELECT * FROM itens_servicos";
          } 
   
              if(!empty($_POST["ordem"]))
          {                              
               $comandoSQL="SELECT * FROM itens_servicos ORDER BY Nome_itensserv ASC";
          }
   
   
   
        if(!empty($_POST["pesquisa"]))
          {
             $pesquisa=$_POST["pesquisa"];
              
                $comandoSQL="SELECT * FROM itens_servicos WHERE Nome_itensserv LIKE '%$pesquisa%'";
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
                           <th width="950" >Serviços Registrados</th>
                           <th width="200">Valor</th>
                           <th width="50"></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php for ($x = 0; $x < $numCadastro; $x++) {
                           $dados = mysqli_fetch_assoc($cadastro);
                           
                           ?>
                        <tr>
                           <td><?php echo ucfirst("$dados[Nome_itensserv]"); ?></td>
                           <td><?php echo ucfirst("R$ ".str_replace('.', ',',"$dados[Valor_itensserv]")); ?></td>
                           <td><a class="text-danger" href="excluiritemservico.php?Id_itensserv=<?php echo "$dados[Id_itensserv]";?>"> <i class="material-icons">delete</i></a></td>
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






