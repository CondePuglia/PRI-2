document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("form-");

    form.addEventListener("submit", function (event) {

        event.preventDefault(); 

        const dtaini = document.getElementById("dta-ini").value;
        const dtafim = document.getElementById("dta-fim").value;

        fetch("../graficos/verificar_periodo.php", {
            method: "POST",
            body: JSON.stringify({ dtaini, dtafim }),
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            
            if (data.existe_valores == true) {
                alert("Existem valores no período especificado.");
            } else {
                alert("Não existem valores no período especificado.");
                
            }
        })
        .catch((error) => {
            console.error("Erro na solicitação AJAX: " + error);
        });
    });
});