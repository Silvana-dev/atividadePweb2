<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<meta charset="utf-8">
</head>
<body>

<?php
	include('banco.php');
	$verificar = 0;
	if(isset($_POST['entrar'])){

    	$email = $_POST['email'];
    	$senha = $_POST['senha'];
    	$seleciona = $bd->query("SELECT email, senha FROM usuarios;");
        while ($consulta = $seleciona->fetch(PDO::FETCH_ASSOC)) {
            if($consulta['email'] == $email)
            {
                if(password_verify($senha, $consulta['senha'])) {
                    
                    $verificar = 1;
                    break;
                } 
                
            }
        }
        if($verificar == 1)
        {
        	header("location: listar.php");
        }
        else
        {
        	echo "Dados incorretos";
        }
	}

	
?>
	<form method="POST" action=""> 
		<p> Email: <input type="text" name="email" id="email" required=""> </p>
		<p> Senha: <input type="password" name="senha" id="senha" required=""></p>
		<input type="submit" name="entrar" value="Entrar">

	</form>

</body>
</html>