import './bootstrap';



$(document).ready(function() {
    $("#btn-confirm-register").on("click", function() {
        // Exibe o pop-up de confirmação
        if (confirm("Deseja criar uma conta?")) {
            // Se o usuário confirmar, você pode redirecionar para a página de criação da conta
            window.location.href = "pagina-de-criacao-de-conta.html";
        } else {
            // Caso contrário, nada acontece
        }
    });
});


