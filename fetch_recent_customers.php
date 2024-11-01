<?php
include_once('config.php'); 

$query = "SELECT nome_cliente, hora_pedido FROM clientes_recentes ORDER BY id DESC LIMIT 10"; 
$result = $conexao->query($query);

$customers = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $customers[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($customers);
$conexao->close();
?>
