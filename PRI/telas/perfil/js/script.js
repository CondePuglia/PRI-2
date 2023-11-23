document.addEventListener("DOMContentLoaded", function () {
  var habilitarFormButton = document.getElementById("alterar");
  var usuarioInput = document.getElementById("usuario");
  var novoBotaoRow = document.getElementById("novoBotaoRow");

  habilitarFormButton.addEventListener("click", function () {
    usuarioInput.disabled = !usuarioInput.disabled;
    habilitarFormButton.textContent = usuarioInput.disabled
      ? "Alterar"
      : "Voltar";

    if (!usuarioInput.disabled) {
      novoBotaoRow.style.display = "block";
      usuarioInput.classList.add("border", "border-success", "border-3");
    } else {
      novoBotaoRow.style.display = "none";
      usuarioInput.classList.remove("border", "border-success", "border-3");
    }
  });
});

function fecharModal() {
  document.getElementById("modal-overlay").style.display = "none";
}

window.onclick = function (event) {
  if (event.target === document.getElementById("modal-overlay")) {
    fecharModal();
  }
};
