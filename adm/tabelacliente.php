


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
            $comandoSQL="SELECT * FROM cliente";
          } 
   
              if(!empty($_POST["ordem"]))
          {                              
               $comandoSQL="SELECT * FROM cliente ORDER BY Nome_cliente ASC";
          }
   
   
   
        if(!empty($_POST["pesquisa"]))
          {
             $pesquisa=$_POST["pesquisa"];
              
                $comandoSQL="SELECT * FROM cliente WHERE Nome_cliente LIKE '%$pesquisa%'";
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
                           <th width="750" >Nome</th>
                           <th width="300">Telefone</th>
                           <th width="50">Inf</th>
                           <th width="50">Alt</th>
                           <th width="50">Exc</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php for ($x = 0; $x < $numCadastro; $x++) {
                           $dados = mysqli_fetch_assoc($cadastro);
                           
                           ?>
                        <tr>
                           <td><?php echo ucfirst("$dados[Nome_cliente]"); ?></td>
                           <td><?php echo ucfirst("$dados[Telefone_cliente]"); ?></td>





                           <td><a class="text-secondary" data-toggle="modal" data-target="#modalexibeinformacoes" data-cliente-id="<?php echo $dados['Id_Cliente']; ?>"> <i class="material-icons">remove_red_eye</i></a></td>


                           <td><a class="text-sucess" href="clientealterar.php?codcliente=<?php echo "$dados[Id_Cliente]";?>"><i class="material-icons">cached</i></a></td>
                           <td><a class="text-danger" href="excluircliente.php?codcliente=<?php echo $dados['Id_Cliente']; ?>"> <i class="material-icons">delete</i></a></td>
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






