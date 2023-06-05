<!-- Modal de cadastro cliente==================================================================================================================================-->

<div class="modal fade" id="modalcadastroveiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Novo Veículo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="inserirveiculo.php">
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Marca do veiculo</label>
                        <input type="text" name="marca" placeholder="Marca do Veiculo" class="form-control" required="" />
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Modelo do veiculo</label>
                        <input type="text" name="modelo" class="form-control" placeholder="Modelo do veiculo" maxlength="9" required="" />
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Cor do veiculo</label>
                        <input class="form-control" name="cor" placeholder="Placa do veiculo" type="text" value="" size="10" maxlength="9" required="" />
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Placa veiculo</label>
                        <input class="form-control" name="placa" placeholder="Placa do veiculo" type="text" value="" size="10" maxlength="9" required="" />

                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Ano do véiculo</label>
                        <input class="form-control" name="ano" placeholder="Ano do veiculo" type="text" value="" size="10" maxlength="9" required="" />
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Clientes</label>
                        <select  name="idcliente" type="text" class="form-control">
                           <option>Selecione um cliente</option>
                           <?php 
                              require("../conexao/conexao.php");
                              $comandoSQL="SELECT * FROM cliente";
                              $cadastro=mysqli_query($con,$comandoSQL);
                              $numCad=mysqli_num_rows($cadastro);
                              
                                if ($numCad>0) {
                              
                              for($x=0; $x < $numCad; $x++)
                              {
                                $dados=mysqli_fetch_assoc($cadastro);        
                              
                              ?>
                           <option value="<?php echo $dados['Id_Cliente'];?>"><?php echo ucfirst($dados['Nome_cliente']);?></option>
                           <?php 
                              } // fechando o FOR
                              
                              } // fechando o if
                              
                              ?>
                        </select>
                     </div>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- fim Modal de cadastro cliente ==================================================================================================================================-->