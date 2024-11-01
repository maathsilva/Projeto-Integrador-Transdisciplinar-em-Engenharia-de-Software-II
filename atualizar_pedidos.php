<?php
include_once('config.php'); 


$queryPedidos = "SELECT nome_cliente, total_pedido, forma_pagamento, 'Entregue' AS status FROM pedidos ORDER BY data_pedido DESC LIMIT 5";
$resultPedidos = $conexao->query($queryPedidos);


$queryClientes = "SELECT nome_cliente, hora_pedido FROM clientes_recentes ORDER BY hora_pedido DESC LIMIT 5";
$resultClientes = $conexao->query($queryClientes);


$pedidos = $resultPedidos->fetch_all(MYSQLI_ASSOC);
$clientes = $resultClientes->fetch_all(MYSQLI_ASSOC);

echo json_encode(['pedidos' => $pedidos, 'clientes' => $clientes]);
?>