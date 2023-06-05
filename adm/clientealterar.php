<?php 
   session_start();
   if(!isset($_SESSION['loginadm']) and !isset($_SESSION['senhaadm']))
   {
     unset($_SESSION['loginadm']);
     unset($_SESSION['senhaadm']);
        header('location:../index.html');
     }
    
   $logado = $_SESSION['loginadm'];
   ?>
<!DOCTYPE html>

<html>
    <head>
      
     
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Oficina Mecânmica</title>
        <meta name="keywords" content="Oficina Mecânmica" />
        <!-- CSS dependencies -->
        <link rel="stylesheet" href="../oficina.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
        <!-- ICONE-->
        <link rel="icon" type="imagem/png" href="../img/logo.png" />
        <!-- Script: funções inscrição -->
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="../js/navbar-ontop.js"></script>
        <script src="../js/cep.js"></script>
        <script src="../js/telefone.js"></script>
        <!-- Script: Animated entrance -->
        <script src="../js/animate-in.js"></script>
        <!-- Ícone -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

           <script src="../js/moeda.js"></script>

    
    </head>
    <body class="text-center">
        <?php 
         date_default_timezone_set('America/Sao_Paulo');
         
         $dataatual = date('Y-m-d');

         require("modalcadcliente.php");

         require("modalcadveiculo.php");

         require("modalcadservico.php");

         require("modalcaditens.php");

              
   
          require("../conexao/conexao.php");
          $Id_Cliente = $_GET['codcliente'];
          $comandoSQL = "SELECT * FROM cliente WHERE Id_Cliente  = ".$Id_Cliente;
          $sqlCodigo = mysqli_query($con, $comandoSQL);
          $dadoscliente = mysqli_fetch_assoc($sqlCodigo);
         ?>

         
        <nav class="navbar navbar-expand-md fixed-top bg-dark navbar-dark">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbar2SupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Início</a>
                        </li>

                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listagens</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="indexcliente.php">Cliente</a>
                                <a class="dropdown-item" href="indexservico.php">Serviços</a>
                                <a class="dropdown-item" href="indexveiculo.php">Veículo</a>                            
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sair.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

  

     


        <!-- menu central ==================================================================================================================================-->
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                       
                    <form method="POST" action="altcliente.php">
                                <input type="hidden" name="idcliente" value="<?php echo $Id_Cliente?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome do Cliente</label>
                                        <input type="text" name="nome" class="form-control" required="" value="<?php echo "$dadoscliente[Nome_cliente]"; ?>" />
                                    </div>
                                </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Telefone/Celular do responsável</label>
                                            <input type="Text" name="telefone" class="form-control" required="" value="<?php echo "$dadoscliente[Telefone_cliente]"; ?>" />
                                        </div>
                                    </div>
                            </div>
                     
                     <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="Email" class="form-control" required="" value="<?php echo "$dadoscliente[Email_cliente]"; ?>" />
                                    </div>
                                </div> 
                     <hr class="mb-2" />
                        <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input class="form-control" name="cep"  type="text"  required="" value="<?php echo "$dadoscliente[Cep_cliente]"; ?>"  />
                                    </div>
                                </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Rua</label>
                                <input class="form-control" name="rua"  type="text"  required="" value="<?php echo "$dadoscliente[Rua_cliente]"; ?>"  />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Número</label>
                                <input class="form-control" name="numero"  type="text"  required="" value="<?php echo "$dadoscliente[Numero_cliente]"; ?>"  />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Bairro</label>
                                <input class="form-control" name="bairro"  type="text"  required="" value="<?php echo "$dadoscliente[Bairro_cliente]"; ?>"  />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cidade</label>
                                <input class="form-control" name="cidade"  type="text"  required="" value="<?php echo "$dadoscliente[Cidade_cliente]"; ?>"  />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Estado</label>
                                <input class="form-control" name="estado"  type="text"  required="" value="<?php echo "$dadoscliente[Estado_cliente]"; ?>"  />
                            </div>
                        </div>
                    </div>
                    <hr class="mb-2" />

                         
                            <button type="submit" class="btn btn-primary">Alterar</button>
                            <button type="button" class="btn btn-danger" onclick="javascript:window.history.go(-1)">Cancelar</button>
                        </form>




                       
                    </div>
                </div>
            </div>
        </div>
        <!--fim menu central ==================================================================================================================================-->
  
        <!-- JavaScript dependencies -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- Script: Smooth scrolling between anchors in the same page -->
        <script src="js/smooth-scroll.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
        <!-- Script: para visualizar imagem -->
        <script src="dist/js/lightbox-plus-jquery.min.js"></script>
        <!-- Script bloqueia retorno  -->
         <script src="js/bloqueio.js"></script>
       
    </body>
</html>
