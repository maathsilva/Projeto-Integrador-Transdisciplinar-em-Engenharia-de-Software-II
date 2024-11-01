<?php
session_start();
include_once('config.php');

$nome_cliente = $_SESSION['nome_cliente']; 
$total_pedido = $_POST['total_pedido'];
$forma_pagamento = $_POST['forma_pagamento'];


$sqlPedido = "INSERT INTO pedidos (nome_cliente, total_pedido, forma_pagamento, data_pedido) VALUES (?, ?, ?, NOW())";
$stmtPedido = $conexao->prepare($sqlPedido);
$stmtPedido->bind_param("sds", $nome_cliente, $total_pedido, $forma_pagamento);
$stmtPedido->execute();


$sqlCliente = "INSERT INTO clientes_recentes (nome_cliente, hora_pedido) VALUES (?, NOW())";
$stmtCliente = $conexao->prepare($sqlCliente);
$stmtCliente->bind_param("s", $nome_cliente);
$stmtCliente->execute();

header('Location: confirmacao.php'); 
exit();
?>
