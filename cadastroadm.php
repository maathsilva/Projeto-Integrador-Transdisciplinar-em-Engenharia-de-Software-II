<?php
include_once('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';


    if ($nome && $email && $senha) {

        $stmt_check = $conexao->prepare("SELECT COUNT(*) FROM usuarios WHERE email = ?");
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $stmt_check->bind_result($count);
        $stmt_check->fetch();
        $stmt_check->close();

        if ($count > 0) {

            echo "Esse email já está cadastrado.";
        } else {

            $stmt = $conexao->prepare("INSERT INTO usuarios(nome, email, senha) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $email, $senha);


            if ($stmt->execute()) {

                echo "Cadastro realizado com sucesso!";
            } else {

                echo "Erro ao cadastrar: " . $stmt->error;
            }


            $stmt->close();
        }
    } else {

        echo "Por favor, preencha todos os campos.";
    }
}


$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
    <link rel="stylesheet" href="../PIT/assets/css/cadastroadm.css">
    <link rel="shortcut icon" href="assets/img/faviconcupcakemania.png" type="image/x-icon">
    <title>Cadastro - Cupcake Mania</title>
</head>

<body>
    <div class="container">
        <div class="register-card">
            <h2>Cadastro</h2>
            <form action="cadastroadm.php" method="POST" id="registerForm">
                <input type="text" name="nome" id="registerName" placeholder="Nome" required>
                <input type="email" name="email" id="registerEmail" placeholder="Email" required>
                <input type="password" name="senha" id="registerPassword" placeholder="Senha" required>
                <button type="submit" name="submit" id="submit">Cadastrar</button>
                <p>Já tem uma conta? <a class="link" href="loginadm.php">Faça o Login</a></p>
            </form>
            <a href="index.html"><button class="back-button">Voltar à Página Inicial</button></a>
        </div>
    </div>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="../PIT/assets/js/cadastroadm.js"></script>
</body>

</html>