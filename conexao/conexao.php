

<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "oficina_mecanica";
	
	//Criar a conexao
	$con = mysqli_connect($servidor, $usuario, $senha, $dbname);


	$pdo = new PDO("mysql:host=$servidor;dbname=$dbname", $usuario, $senha);
	
	if(!$pdo){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}	
	

	
?>
