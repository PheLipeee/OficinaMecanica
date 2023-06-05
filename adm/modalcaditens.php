<div class="modal fade" id="modalcaditens" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Novo Serviço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="inseriritens.php">         
                  <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Nome serviço:</label>
                                <input type="text" name="nomeservico" placeholder="Titulo do novo serviço" class="form-control" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Valor:</label>
                              



                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">R$</div>
                                    </div>
                                     <input class=" form-control" name="valorservico" type="text" id="preco" maxlength="8" onKeyUp="moeda(this);"  required=""/>
                                  </div>

                          
                            </div>
                        </div>
                    </div>
                   

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- fim Modal de cadastro serviço ==================================================================================================================================-->
