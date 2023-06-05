<!-- Modal de cadastro serviço==================================================================================================================================-->
<div class="modal fade" id="modalcadastroservico" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Nova Ordem</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="inserirservico.php">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Data</label>
                        <input type="date" name="data" class="form-control" required="" value="<?php echo $dataatual = date('Y-m-d'); ?>" />
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Observação</label>
                        <textarea name="observacao" class="form-control" placeholder="Observações para o serviço" required=""></textarea>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Clientes</label>
                        <select id="lista-cliente" name="idcliente" type="text" class="form-control" placeholder="Selecione o tipo do documento">
                           <option>Selecione um cliente</option>
                           <?php 
                              require("../conexao/conexao.php");
                              $comandoSQL="SELECT * FROM cliente";
                              $cadastro=mysqli_query($con,$comandoSQL);
                              $numCad=mysqli_num_rows($cadastro);
                              
                              if ($numCad>0) 
                              { 
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
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Veiculo</label>
                        <select name="idveiculo" class="form-control" id="veiculo">
                           <option>Selecione um veiculo</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Selecione o serviço realizado</label>
                        <div class="input-group">
                           <select name="itens[]" type="text" class="form-control" placeholder="Selecione o serviço">
                              <?php
                                 require("../conexao/conexao.php");
                                 $comandoSQL = "SELECT * FROM itens_servicos";
                                 $cadastro = mysqli_query($con, $comandoSQL);
                                 $numCad = mysqli_num_rows($cadastro);
                                 
                                 if ($numCad > 0) {
                                     for ($x = 0; $x < $numCad; $x++) {
                                         $dados = mysqli_fetch_assoc($cadastro);
                                         ?>
                             <option value="<?php echo $dados['Id_itensserv']; ?>"><?php echo ucfirst($dados['Nome_itensserv']) . ' - R$ ' . str_replace('.', ',', $dados['Valor_itensserv']); ?></option>


                            
                              <?php
                                 }
                                 }
                                 ?>
                           </select>
                           <div class="input-group-append">
                              <button class="btn btn-success add-button" type="button">+</button>
                              <button class="btn btn-danger remove-button" type="button">-</button>
                           </div>
                        </div>
                      <div class="select-wrapper"></div> 
                     </div>
                      
                  </div>
               </div>
               <script>
                  $(document).ready(function() {
                      $('.add-button').click(function() {
                          var select = $(this).closest('.input-group').find('select');
                          var newSelect = select.clone().appendTo('.select-wrapper');
                          newSelect.val('');
                          
                          // Remover eventos de clique dos botões no novo select
                          newSelect.next('.input-group-append').find('.add-button, .remove-button').off('click');
                      });
                  
                      $('.remove-button').click(function() {
                          var selectWrapper = $(this).closest('.col-md-12').find('.select-wrapper');
                          var selects = selectWrapper.find('select');
                          if (selects.length > 0) {
                              selects.last().remove();
                          }
                      });
                  });
               </script>
              
               <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- fim Modal de serviço  ==================================================================================================================================-->