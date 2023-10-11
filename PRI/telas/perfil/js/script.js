document.addEventListener("DOMContentLoaded", function () {
    var habilitarFormButton = document.getElementById("alterar");
    var usuarioInput = document.getElementById("usuario");
    var novoBotaoRow = document.getElementById("novoBotaoRow");

    habilitarFormButton.addEventListener("click", function () {
        usuarioInput.disabled = !usuarioInput.disabled;
        habilitarFormButton.textContent = usuarioInput.disabled ? "Alterar" : "Voltar";
        
        if (!usuarioInput.disabled) {
            // Mostrar o novo botão apenas quando o formulário estiver habilitado
            novoBotaoRow.style.display = "block";
            usuarioInput.classList.add("border", "border-success", "border-3"); // Adiciona a classe ao input
        } else {
            // Ocultar o novo botão quando o formulário estiver desabilitado
            novoBotaoRow.style.display = "none";
            usuarioInput.classList.remove("border", "border-success", "border-3"); // Remove a classe do input
        }
    });
});


