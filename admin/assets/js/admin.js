let list = document.querySelectorAll(".navigation li");


function activeLink() {
    list.forEach((item) => {
        item.classList.remove("hovered"); 
    });
    this.classList.add("hovered"); 
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");


toggle.onclick = function () {
    navigation.classList.toggle("active"); 
    main.classList.toggle("active"); 
};


function atualizarHorarios() {
    const horarios = [
        "18:49", "16:24", "15:14", "13:47", "13:12", "12:29"
    ];
    const clientes = document.querySelectorAll(".recentCustomers table h4 span");

    clientes.forEach((span, index) => {
        span.textContent = `Pedido efetuado em ${horarios[index]}`;
    });
}


atualizarHorarios();


function fetchRecentOrders() {
    fetch('fetch_recent_orders.php') 
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('.recentOrders tbody');
            tableBody.innerHTML = '';

            data.forEach(order => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${order.nome}</td>
                    <td>${order.total_pedido}</td>
                    <td>${order.forma_pagamento}</td>
                    <td><span class="status delivered">Entregue</span></td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Erro ao buscar pedidos:', error));
}


function fetchRecentCustomers() {
    fetch('fetch_recent_customers.php') 
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('.recentCustomers table tbody');
            tableBody.innerHTML = ''; 

            data.forEach(customer => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td></td>
                    <td>
                        <h4>${customer.nome_cliente}<br><span>${customer.hora_pedido}</span></h4>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Erro ao buscar clientes:', error));
}


setInterval(() => {
    fetchRecentOrders();
    fetchRecentCustomers();
}, 5000); 

