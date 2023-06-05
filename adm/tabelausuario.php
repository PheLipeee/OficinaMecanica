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
            $comandoSQL="SELECT * FROM administrador";
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
                           <th width="100">#</th>
                            <th width="1050">Login</th>
                           <th width="50"></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php for ($x = 0; $x < $numCadastro; $x++) {
                           $dados = mysqli_fetch_assoc($cadastro);
                           
                           ?>
                        <tr>
                           <td><?php echo ucfirst("$dados[idadministrador]"); ?></td>
                           <td><?php echo ucfirst("$dados[loginadm]"); ?></td>
                           <td><a class="text-danger" href="excluiradm.php?idadministrador=<?php echo "$dados[idadministrador]";?>"> <i class="material-icons">delete</i></a></td>
                          
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