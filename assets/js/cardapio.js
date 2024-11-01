const cardapio = document.getElementById("cardapio");
const cartBtn = document.getElementById("cart-btn");
const cartModal = document.getElementById("cart-modal");
const cartItemsContainer = document.getElementById("cart-items");
const cartTotal = document.getElementById("cart-total");
const checkoutBtn = document.getElementById("checkout-btn");
const closeModalBtn = document.getElementById("close-modal-btn");
const cartCounter = document.getElementById("cart-count");
const nameInput = document.getElementById("name");
const nameWarn = document.getElementById("name-warn");
const addressInput = document.getElementById("address");
const addressWarn = document.getElementById("address-warn");
const pagamentoSelect = document.getElementById("pagamento");
const pagamentoWarn = document.getElementById("pagamento-warn");

let cart = [];


const abrirModalCarrinho = () => {
    updateCartModal();
    cartModal.style.visibility = 'visible';
    cartModal.style.display = 'flex'; 
};


const fecharModalCarrinho = () => {
    cartModal.style.visibility = 'hidden';
    cartModal.style.display = 'none'; 
};


cartBtn.addEventListener('click', abrirModalCarrinho);
closeModalBtn.addEventListener('click', fecharModalCarrinho);


cartModal.addEventListener('click', (event) => {
    if (event.target === cartModal) {
        fecharModalCarrinho();
    }
});

cardapio.addEventListener('click', function(event) {
    let parentButton = event.target.closest(".btn-carrinho");

    if (parentButton) {
        const name = parentButton.getAttribute("data-name");
        const price = parseFloat(parentButton.getAttribute("data-price"));
        addToCart(name, price);
    }
});


function addToCart(name, price) {
    const existingItem = cart.find(item => item.name === name);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            name,
            price,
            quantity: 1,
        });
    }

    updateCartModal();
}

function updateCartModal() {
    cartItemsContainer.innerHTML = "";
    let total = 0;

    cart.forEach(item => {
        const cartItemElement = document.createElement("div");
        cartItemElement.classList.add("flex", "justify-between", "mb-4", "flex-col");

        cartItemElement.innerHTML = `
            <div class="container-item-modal">
                <div>
                    <p class="item-modal">${item.name}</p>
                    <p class="item-modal-cinza">Quantidade: ${item.quantity}</p>
                    <p class="item-modal-cinza">R$ ${item.price.toFixed(2)}</p>
                </div>
                <button class="botao-remover-modal" data-name="${item.name}">
                    Remover
                </button>
            </div>
        `;

        total += item.price * item.quantity;
        cartItemsContainer.appendChild(cartItemElement);
    });

    cartTotal.textContent = total.toLocaleString("pt-BR", {
        style: "currency",
        currency: "BRL"
    });

    cartCounter.innerHTML = cart.length;
}

cartItemsContainer.addEventListener("click", function(event) {
    if (event.target.classList.contains("botao-remover-modal")) {
        const name = event.target.getAttribute("data-name");
        removeItemCart(name);
    }
});

function removeItemCart(name) {
    const index = cart.findIndex(item => item.name === name);

    if (index !== -1) {
        const item = cart[index];

        if (item.quantity > 1) {
            item.quantity -= 1;
            updateCartModal();
            return;
        }

        cart.splice(index, 1);
        updateCartModal();
    }
}

nameInput.addEventListener("input", function(event) {
    if (event.target.value !== "") {
        nameInput.classList.remove("border-warn");
        nameWarn.classList.add("name-warn");
    }
});

addressInput.addEventListener("input", function(event) {
    if (event.target.value !== "") {
        addressInput.classList.remove("border-warn");
        addressWarn.classList.add("address-warn");
    }
});

pagamentoSelect.addEventListener("change", function(event) {
    if (event.target.value !== "") {
        pagamentoSelect.classList.remove("border-warn");
        pagamentoWarn.style.display = "none";
    }
});

checkoutBtn.addEventListener("click", function() {
    if (cart.length === 0) return;

    
    if (nameInput.value === "") {
        nameWarn.classList.remove("name-warn");
        nameInput.classList.add("border-warn");
        return;
    }

    
    if (addressInput.value === "") {
        addressWarn.classList.remove("address-warn");
        addressInput.classList.add("border-warn");
        return;
    }

    
    if (pagamentoSelect.value === "") {
        pagamentoWarn.classList.remove("pagamento-warn");
        pagamentoSelect.classList.add("border-warn");
        pagamentoWarn.style.display = "block";
        return;
    }

    
    checkoutBtn.disabled = true;

    const cartItems = cart.map(item => `${item.name} | Quantidade: ${item.quantity} | Preço: R$ ${item.price.toFixed(2)}`).join(", ");

    const total = cart.reduce((acc, item) => acc + item.price * item.quantity, 0);

    const orderData = {
        items: cartItems,
        name: nameInput.value,
        address: addressInput.value,
        paymentMethod: pagamentoSelect.value,
        total: total.toFixed(2),
        timestamp: new Date().toISOString()
    };

    fetch('https://localhost/PIT/pedidos.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(orderData)
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(data => {
                throw new Error(data.error || 'Erro ao enviar os dados');
            });
        }
        return response.json();
    })
    .then(data => {
        
        Toastify({
            text: "Pedido recebido com sucesso! Confira seu WhatsApp.",
            duration: 3000,
            gravity: "top",
            position: 'right',
            backgroundColor: "#91cad6",
        }).showToast();

        
        const message = encodeURIComponent(cartItems);
        const phone = "11981614133";
        window.open(`https://wa.me/${phone}?text=${message} Nome: ${nameInput.value} | Endereço: ${addressInput.value} | Forma de Pagamento: ${pagamentoSelect.value} | *Total: R$ ${total.toFixed(2)}*`, "_blank");

        
        cart = [];
        updateCartModal();
    })
    .catch(error => {
        console.error('Erro:', error);
        Toastify({
            text: 'Ocorreu um erro ao processar seu pedido. Tente novamente mais tarde.',
            duration: 3000,
            gravity: "top",
            position: 'right',
            backgroundColor: "#ff5f6d",
        }).showToast();
    })
    .finally(() => {
        checkoutBtn.disabled = false;
    });
});
