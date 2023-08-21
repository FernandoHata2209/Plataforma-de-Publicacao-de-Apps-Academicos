import './bootstrap';



$(document).ready(function() {
    $("#btn-confirm-register").on("click", function() {
        var nome = $("#inp-login-user").val();
        var email = $("#inp-login-email").val();
        var cargo = $("#select-charge-user-register").val();
        var senha = $("#inp-password-user").val();
        var senhaConfirmacao = $("#inp-password-user-confirm").val();

        if (!nome || !email || cargo === "" || !senha || !senhaConfirmacao) {
            alert("Por favor, preencha todos os campos obrigatórios e concorde com os Termos e Privacidade.");
            return false; // Impede o envio do formulário
        }

        // Resto do código para exibir o pop-up de confirmação e redirecionar, se necessário
        if (confirm("Deseja criar uma conta?")) {
            window.location.href = "pagina-de-criacao-de-conta.html";
        } else {
            // Caso contrário, nada acontece
        }
    });
});





