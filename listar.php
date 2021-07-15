<a href="index.php">tela inicial </a> 

<?php

	include('bancp.php');
	echo "<p> Lista de usuários </p>"; 
	$consulta = $bd->query("SELECT id, nome, usuario, email FROM usuarios;");
        while ($dados = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "Nome: {$dados['nome']} - Usuário: {$dados['usuario']} - Email: {$dados['email']}<br/>";
                
            }

?>