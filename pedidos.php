<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");


error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"), true);


    if (isset($data['items'], $data['name'], $data['address'], $data['paymentMethod'], $data['total'])) {


        $stmt = $conexao->prepare("INSERT INTO pedidos (itens, nome, endereco, forma_pagamento, total, data_pedido) VALUES (?, ?, ?, ?, ?, ?)");


        $itens = json_encode($data['items']);
        $nome = $data['name'];
        $endereco = $data['address'];
        $forma_pagamento = $data['paymentMethod'];
        $total = $data['total'];
        $data_pedido = date('Y-m-d H:i:s');


        if ($stmt) {
            $stmt->bind_param("ssssds", $itens, $nome, $endereco, $forma_pagamento, $total, $data_pedido);
            if ($stmt->execute()) {

                $hora_pedido = date('Y-m-d H:i:s'); // Hora do pedido
                $stmt_cliente = $conexao->prepare("INSERT INTO clientes_recentes (nome_cliente, hora_pedido) VALUES (?, ?)");

                if ($stmt_cliente) {
                    $stmt_cliente->bind_param("ss", $nome, $hora_pedido);
                    $stmt_cliente->execute();
                    $stmt_cliente->close();
                }

                echo json_encode(["message" => "Pedido recebido com sucesso."]);
            } else {
                echo json_encode(["error" => "Erro ao processar o pedido."]);
            }
            $stmt->close();
        } else {
            echo json_encode(["error" => "Erro na preparação da consulta."]);
        }
    } else {
        echo json_encode(["error" => "Dados incompletos. Verifique os campos obrigatórios."]);
    }
} else {
    echo json_encode(["error" => "Método não permitido."]);
}
