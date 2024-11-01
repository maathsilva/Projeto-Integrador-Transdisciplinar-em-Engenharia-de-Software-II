<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "Por favor, faça login para acessar o sistema.";
    header('Location: loginadm.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../PIT/admin/assets/css/admin.css">
    <link rel="shortcut icon" href="../PIT/assets/img/faviconcupcakemania.png" type="image/x-icon">
    <title>Painel Admin CupCake Mania</title>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="../PIT/assets/img/faviconcupcakemania.png" alt="">
                        </span>
                        <span class="title">Administrador</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>

                <li>
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sair</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="user">
                    <img src="../PIT/assets/img/faviconcupcakemania.png" alt="">
                </div>
            </div>

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1.504</div>
                        <div class="cardName">Visualizações do site</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">112</div>
                        <div class="cardName">Vendas</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">9</div>
                        <div class="cardName">Produtos</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="construct-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">R$10.842,58</div>
                        <div class="cardName">Faturamento</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Pedidos Recentes</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Total</td>
                                <td>Forma de Pagamento</td>
                                <td>Data do pedido</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Suzana</td>
                                <td>R$ 58,90</td>
                                <td>Pix</td>
                                <td><span class="status pending">Em Andamento</span></td>
                            </tr>

                            <tr>
                                <td>Gabriella</td>
                                <td>R$ 41,62</td>
                                <td>Pix</td>
                                <td><span class="status delivered">Entregue</span></td>
                            </tr>

                            <tr>
                                <td>Felipe</td>
                                <td>R$ 67,98</td>
                                <td>Cartão de Crédito</td>
                                <td><span class="status delivered">Entregue</span></td>
                            </tr>

                            <tr>
                                <td>Raphael</td>
                                <td>R$ 22,70</td>
                                <td>Cartão de Débito</td>
                                <td><span class="status delivered">Entregue</span></td>
                            </tr>

                            <tr>
                                <td>Guilherme</td>
                                <td>R$ 52,97</td>
                                <td>Dinheiro</td>
                                <td><span class="status delivered">Entregue</span></td>
                            </tr>

                            <tr>
                                <td>Matheus</td>
                                <td>R$ 17,29</td>
                                <td>Pix</td>
                                <td><span class="status delivered">Entregue</span></td>
                            </tr>
                            <tr>
                                <td>Matheus</td>
                                <td>R$ 15,34</td>
                                <td>Pix</td>
                                <td><span class="status delivered">Entregue</span></td>
                            </tr>
                            <tr>
                                <td>Matheus</td>
                                <td>R$ 37,96</td>
                                <td>Pix</td>
                                <td><span class="status delivered">Entregue</span></td>
                            </tr>
                            <tr>
                                <td>Matheus</td>
                                <td>R$ 22,66</td>
                                <td>Pix</td>
                                <td><span class="status delivered">Entregue</span></td>
                            </tr>


                        </tbody>
                    </table>
                </div>

                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Clientes Recentes</h2>
                    </div>

                    <div class="scrollableTable">
                        <table>
                            <tr>
                                <td width="60px"></td>
                                <td>
                                    <h4>Suzana <br> <span>Pedido efetuado em 18:49</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px"></td>
                                <td>
                                    <h4>Grabriella <br> <span>Pedido efetuado em 16:24</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px"></td>
                                <td>
                                    <h4>Felipe <br> <span>Pedido efetuado em 15:14</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px"></td>
                                <td>
                                    <h4>Raphael <br> <span>Pedido efetuado em 13:47</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px"></td>
                                <td>
                                    <h4>Guilherme <br> <span>Pedido efetuado em 13:12</span></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="60px"></td>
                                <td>
                                    <h4>Matheus <br> <span>Pedido efetuado em 12:29</span></h4>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <script src="../PIT/admin/assets/js/admin.js"></script>
                <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>