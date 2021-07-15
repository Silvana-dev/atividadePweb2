<?php
    include('banco.php');

        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $criptografia = password_hash($senha, PASSWORD_DEFAULT);
        $verificar = 0;

        $consulta = $bd->query("SELECT usuario, email FROM tb_usuarios;");
        while ($dados = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if($dados['usuario'] == $usuario || $dados['email'] == $email)
            {
                $verificar = 1;
                break;
            }
        }

        if($verificar == 1){
            echo "Usuário ou email já cadastrado!! Insira outro";
        }
        else{
            $sql = $bd->prepare("INSERT INTO usuarios VALUES (null, ?, ?, ?, ?)");
            $sql->execute([$nome, $usuario, $email, $criptografada]);
            echo 'Usuário cadastrado com sucesso';
        }
       
?>

<a href="index.php">tela inicial</a>
