<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cupcake Mania</title>
    <link rel="stylesheet" href="../PIT/assets/css/loginadm.css">
    <link rel="shortcut icon" href="assets/img/faviconcupcakemania.png" type="image/x-icon">
    <style>
        .error-message {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-card">
            <h2>Login</h2>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="testLogin.php" id="loginForm">
                <input type="email" name="email" placeholder="E-mail" required aria-label="E-mail">
                <input type="password" name="senha" placeholder="Senha" required aria-label="Senha">
                <button class="btn" type="submit" name="submit">Entrar</button>
                <p>Não tem uma conta? <a class="link" href="cadastroadm.php">Cadastre-se</a></p>
            </form>
            <a href="index.html"><button class="back-button">Voltar à Página Inicial</button></a>
        </div>
    </div>

    <script src="/assets/js/loginadm.js"></script>
</body>

</html>