<?php



  session_start(); 
       include_once("../conexao/conexao.php");   

  if((isset($_POST['loginadm'])) && (isset($_POST['senhaadm']))){
    $usuario = mysqli_real_escape_string($con, $_POST['loginadm']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
    $senha = mysqli_real_escape_string($con, $_POST['senhaadm']);
    $senha = md5($senha);


    //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário

      $result_usuario = "SELECT * FROM administrador WHERE loginadm = '$usuario' && senhaadm= '$senha' LIMIT 1";
    $resultado_usuario = mysqli_query($con, $result_usuario);
    $resultado = mysqli_fetch_assoc($resultado_usuario);


    //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
    if(isset($resultado)){
      $_SESSION['idadm'] = $resultado['idadm'];
      $_SESSION['loginadm'] = $resultado['loginadm'];
          $_SESSION['senhaadm'] = $resultado['senhaadm'];

      header("Location: index.php");
    }
    else
    { 
      //Váriavel global recebendo a mensagem de erro
      $_SESSION['loginErro'] = "Usuário ou senha Inválido";
      header("Location: ../index.html");
    }
  //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
  }
  else
  {
    $_SESSION['loginErro'] = "Usuário ou senha inválido";
    header("Location: ../index.html");
  }




?>
