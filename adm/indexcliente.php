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
        <script src="js/visualizar.js"></script>

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    



    </head>
    <body class="text-center">
        <?php 
         date_default_timezone_set('America/Sao_Paulo');
         
         $dataatual = date('Y-m-d');

          require("modalcadcliente.php");

          require("modalcadveiculo.php");

          require("modalcadservico.php");
          
          require("modalcaditens.php");
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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="indexcliente.php">Clientes</a>
                                <a class="dropdown-item" href="indexservico.php">Ordens de Serviços</a>
                                <a class="dropdown-item" href="indexveiculo.php">Veículos</a> 
                                <a class="dropdown-item" href="indexitemservico.php">Serviços</a>                            
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sair.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
     













 <!-- modal vizualizar ==================================================================================================================================-->
 <div class="modal fade" id="modalvisualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Informações do cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">



                  <form>


                  <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label>Nome do Cliente</label>
            <input type="text" class="form-control" id="nomecliente">
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label>Telefone/Celular do responsável</label>
            <input type="text" class="form-control" id="telefonecliente">
         </div>
      </div>
   </div>
   <hr class="mb-2" />
   <div class="row">
      <div class="col-md-12">
         <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" id="emailcliente">
         </div>
      </div>
   </div>
   <hr class="mb-2" />
   <div class="row">
      <div class="col-md-4">
         <div class="form-group">
            <label>CEP</label>
            <input type="text" class="form-control" id="cepcliente">
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label>Rua</label>
            <input type="text" class="form-control" id="ruacliente">
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label>Número</label>
            <input type="text" class="form-control" id="numerocliente">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-4">
         <div class="form-group">
            <label>Bairro</label>
            <input type="text" class="form-control" id="bairrocliente">
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label>Cidade</label>
            <input type="text" class="form-control" id="cidadecliente">
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label>Estado</label>
            <input type="text" class="form-control" id="estadocliente">
         </div>
      </div>
   </div>


                  </form>


               </div>
            </div>
         </div>
      </div>
      <!--fim modal visualizar ==================================================================================================================================-->



























        <!-- menu central ==================================================================================================================================-->
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="modal" data-target="#modalcadastrocliente" style="cursor: pointer;">Registrar cliente</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="modal" data-target="#modalcadastroveiculo" style="cursor: pointer;">Registrar veiculo</a>
                                    </li>
                              
                                  
                                </ul>
                                <form class="form-inline my-2 my-lg-0" action="indexservico.php" method="POST">
                                    <input class="form-control mr-sm-2" type="text" name="pesquisa" required="" />
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--fim menu central ==================================================================================================================================-->














        <!-- montagem da tabela  ==================================================================================================================================-->
        <?php
         $escolha = (isset($_GET['id']) ? $_GET['id'] : 'todos');
          
          
          
          
          require("../conexao/conexao.php");      
          
          require("tabelacliente.php");
          
          
                      
          ?>
        <!-- fim montagem da tabela  ==================================================================================================================================-->
         <!-- JavaScript dependencies -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- Script: Smooth scrolling between anchors in the same page -->
        <script src="../js/smooth-scroll.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
        <!-- Script: para visualizar imagem -->
        <script src="../dist/js/lightbox-plus-jquery.min.js"></script>
          <!-- Script bloqueia retorno  -->
         <script src="../js/bloqueio.js"></script>
       
    </body>
</html>
