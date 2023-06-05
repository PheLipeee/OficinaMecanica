<!-- Modal de cadastro cliente==================================================================================================================================-->
<div class="modal fade" id="modalcadastrocliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Novo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="inserircliente.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome do Cliente</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome completo" maxlength="50" required="" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telefone/Celular do responsável</label>
                                <input type="Text" name="telefone" class="form-control" placeholder="Telefone ou celular" id="telefone" maxlength="15" />
                            </div>
                        </div>
                    </div>
                    <hr class="mb-2" />

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" id="email" maxlength="50" required="" />
                            </div>
                        </div>
                    </div>

                    <hr class="mb-2" />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>CEP</label>
                                <input class="form-control" name="cep" placeholder="CEP" type="text" value="" id="cep" name="cep" size="10" maxlength="9" onblur="pesquisacep(this.value);" required="" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Rua</label>
                                <input class="form-control" name="rua" placeholder="Endereço" type="text" id="ender" name="rua" maxlength="100" required="" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Número</label>
                                <input class="form-control" name="numero" placeholder="Número" type="text" name="numero" maxlength="10" required="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Bairro</label>
                                <input class="form-control" name="bairro" placeholder="Bairro" type="text" id="bairro" name="bairro" size="60" maxlength="50" required="" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cidade</label>
                                <input class="form-control" name="cidade" placeholder="Cidade" type="text" id="cidade" name="cidade" size="20" maxlength="50" required="" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Estado</label>
                                <input class="form-control" name="estado" placeholder="UF" type="text" id="uf" name="uf" size="2" maxlength="50" required="" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Marca do veiculo</label>
                                <input type="text" name="marca" placeholder="Marca do Veiculo" class="form-control" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Modelo do veiculo</label>
                                <input type="text" name="modelo" class="form-control" placeholder="Modelo do veiculo" maxlength="9" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cor do veiculo</label>
                                <input class="form-control" name="cor" placeholder="Placa do veiculo" type="text" value="" size="10" maxlength="9" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Placa veiculo</label>
                                <input class="form-control" name="placa" placeholder="Placa do veiculo" type="text" value="" size="10" maxlength="9" required />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ano do véiculo</label>
                                <input class="form-control" name="ano" placeholder="Ano do veiculo" type="text" value="" size="10" maxlength="9" required />
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
