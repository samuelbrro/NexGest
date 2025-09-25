<?php
require_once("conexao.php");

$query = $pdo->query("SELECT * FROM usuarios");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);

$senha = '123';
$senha_crip = md5($senha);

// Caso não exista nenhum usuário, cria o Administrador padrão
if ($linhas == 0) {
    $pdo->query("INSERT INTO usuarios SET nome = '$nome_sistema', email = '$email_sistema', senha = '$senha', senha_crip = '$senha_crip',
    nivel = 'Administrador', ativo = 'Sim', foto = 'sem-foto.jpg', telefone = '$telefone_sistema'");
}
?>
<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <title>NexGest</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="image/icone.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="login">
        <div class="form">
            <img src="image/logo.png" class="imagem">
            
            <!-- Formulário de Login -->
            <form method="post" action="autenticar.php">
                <input type="email" name="usuario" placeholder="Seu Email" required>
                <input type="password" name="senha" placeholder="Sua Senha" required>
                <button class="button">Login</button>
            </form>

            <!-- Botão de Cadastro -->
            <p class="link-cadastro">
                Não tem conta? <a href="cadastro.php">Cadastre-se</a>
            </p>
        </div>
    </div>
</body>
</html>
