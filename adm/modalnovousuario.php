<div class="modal fade" id="modalnovousuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Novo Administrador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="inserirusuario.php">         
                  <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Login:</label>
                                <input type="text" name="login" placeholder="" class="form-control" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Senha:</label>
                                <input type="password" name="senha" placeholder="" class="form-control" required />
                            </div>
                        </div>
                        
                    </div>
                   

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
                <div class="py-2">
                <?php
         $escolha = (isset($_GET['id']) ? $_GET['id'] : 'todos');
          
          
          
          
          require("../conexao/conexao.php");      
          
          require("tabelausuario.php");
          
          
          
          
          
                      
          ?>
          </div>
            </div>
        </div>
    </div>
</div>
<!-- fim Modal de cadastro serviço ==================================================================================================================================-->
