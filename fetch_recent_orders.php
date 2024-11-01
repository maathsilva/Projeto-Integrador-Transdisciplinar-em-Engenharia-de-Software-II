<?php
include_once('config.php'); 

$query = "SELECT nome, total_pedido, forma_pagamento FROM pedidos ORDER BY id DESC LIMIT 10"; 
$result = $conexao->query($query);

$orders = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($orders);
$conexao->close();
?>
