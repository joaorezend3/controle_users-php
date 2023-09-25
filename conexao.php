<?php
	$servidor = "localhost";
	$usuario = "joao";
	$senha = "";
	$dbname = "sistemausers";
	
	$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	if(!$conexao){
		die("Falha na conexao!");
	} else{
		echo'ok';
	};	
