<?php
require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_crip = md5($senha);

    // Verifica se já existe o email
    $query = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $query->bindValue(":email", $email);
    $query->execute();
    $res = $query->fetchAll(PDO::FETCH_ASSOC);

    if (@count($res) == 0) {
        $stmt = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, senha_crip = :senha_crip, nivel = 'Usuário', ativo = 'Sim', foto = 'sem-foto.jpg'");
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", $senha);
        $stmt->bindValue(":senha_crip", $senha_crip);
        $stmt->execute();

        echo "<script>alert('Cadastro realizado com sucesso!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Esse email já está cadastrado!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>NexGest - Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="image/icone.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="login">
        <div class="form">
            <div class="logo">
                <img src="image/logo.png" class="imagem" alt="Logo">
            </div>
            <form method="post">
                <input type="text" name="nome" placeholder="Seu Nome" required>
                <input type="email" name="email" placeholder="Seu Email" required>
                <input type="password" name="senha" placeholder="Sua Senha" required>
                <button class="button">Cadastrar</button>
            </form>
            <p>Já tem conta? <a href="index.php">Faça login</a></p>
        </div>
    </div>
</body>

</html>