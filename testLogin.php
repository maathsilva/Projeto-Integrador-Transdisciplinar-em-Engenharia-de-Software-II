<?php
session_start();


if (isset($_POST['email']) && isset($_POST['senha'])) {
    include_once('config.php');


    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);


    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();


        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];


        header('Location: adm.php');
        exit();
    } else {

        $_SESSION['error'] = "E-mail ou senha incorretos. Tente novamente.";
        header('Location: loginadm.php');
        exit();
    }

    $stmt->close();
} else {

    $_SESSION['error'] = "Por favor, preencha todos os campos.";
    header('Location: loginadm.php');
    exit();
}

$conexao->close();
?>