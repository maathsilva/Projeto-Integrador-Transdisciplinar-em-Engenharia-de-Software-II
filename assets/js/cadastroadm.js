document.addEventListener("DOMContentLoaded", function () {
    const checkoutBTN = document.getElementById("submit");

    checkoutBTN.addEventListener("click", function (event) {
        event.preventDefault(); 

        const formData = new FormData(document.getElementById("registerForm")); 

        
        fetch('cadastroadm.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                return response.text(); 
            } else {
                throw new Error("Erro na requisição");
            }
        })
        .then(data => {

            if (data.includes("Cadastro realizado com sucesso!")) {
                
                Toastify({
                    text: "Cadastro Realizado Com Sucesso! Você será redirecionado para o login.",
                    duration: 4000, 
                    gravity: "top", 
                    position: "right", 
                    style: {
                        background: "#91cad6",
                    },
                }).showToast();

                
                setTimeout(() => {
                    window.location.href = 'loginadm.php';
                }, 4000);
            } else if (data.includes("Esse email já está cadastrado.")) {
                
                Toastify({
                    text: "Erro: Esse email já está cadastrado.",
                    duration: 4000, 
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "red",
                    },
                }).showToast();
            } else {
                
                Toastify({
                    text: "Erro ao cadastrar: " + data,
                    duration: 4000, 
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "red",
                    },
                }).showToast();
            }
        })
        .catch(error => {
            Toastify({
                text: "Erro: " + error.message,
                duration: 4000,
                gravity: "top",
                position: "right",
                style: {
                    background: "red",
                },
            }).showToast();
        });
    });
});
