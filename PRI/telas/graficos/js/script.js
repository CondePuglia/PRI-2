console.log(window.codsenselecionado)

const form = document.querySelector("#form-graph");
var errorinputdiv = document.querySelector("#errorinputdiv");
var errorinput = document.querySelector(".error-messageinput");
var errordateini = document.querySelector(".error-messagedateini");
var errordatefim = document.querySelector(".error-messagedatefim");
var errordiasdiv = document.querySelector("#errordiasdiv");
var errordias = document.querySelector(".error-messagedias");


form.addEventListener("submit", (event) => {
  const checkDtaini = document.getElementById("dta-ini").value;
  const checkDtafim = document.getElementById("dta-fim").value;


  function ValidarDias(checkDtaini, checkDtafim) {
    let validado = true;
    const dateini = new Date(checkDtaini);
    const datefim = new Date(checkDtafim);
    const diferencaEmMilissegundos = datefim - dateini;
    const diferencaEmDias = diferencaEmMilissegundos / (1000 * 60 * 60 * 24);
    if (diferencaEmDias > 60) {
        errordiasdiv.classList.remove("hidden");
      errordias.textContent = "A diferença entre as datas não pode ser maior que 60 dias.";
      validado = false;
    } else {
        errordiasdiv.classList.add("hidden");
      errordias.textContent = "";
    }

    return validado;
  }

  function ValidarOps() {
    let validado = true;
    const checkTemp = document.getElementById("temp").checked;
    const checkLumi = document.getElementById("lumi").checked;
    const checkUmi = document.getElementById("umi").checked;

    if (checkTemp == false && checkLumi == false && checkUmi == false) {
      errorinputdiv.classList.remove("hidden");
      errorinput.textContent = "Selecione pelo menos uma opção.";
      validado = false;
    } else {
      errorinputdiv.classList.add("hidden");
      errorinput.textContent = "";
    }

    return validado;
  }

  function ValidarDatas(checkDtaini, checkDtafim) {
    let validado = true;

    const dateini = new Date(checkDtaini);
    const datefim = new Date(checkDtafim);

    errordateini.classList.add("hidden");
    errordatefim.classList.add("hidden");

    if (isNaN(dateini.getTime())) {
      errordateini.classList.remove("hidden");
      errordateini.textContent = "ATENÇÃO: Data Inicial inválida";
      validado = false;
    } else if (dateini > datefim) {
      errordateini.textContent =
        "ATENÇÃO: Data Inicial não pode ser maior que a Data Final.";
      errordateini.classList.remove("hidden");
      validado = false;
    }

    if (isNaN(datefim.getTime())) {
      errordatefim.classList.remove("hidden");
      errordatefim.textContent = "ATENÇÃO: Data Final inválida";

      validado = false;
    } else if (datefim < dateini) {
      errordatefim.textContent =
        "ATENÇÃO: Data Final não pode ser menor que a Data Inicial. ";
      errordatefim.classList.remove("hidden");
      validado = false;
    }

    return validado;
  }

  if (
    !ValidarOps() ||
    !ValidarDatas(checkDtaini, checkDtafim) ||
    !ValidarDias(checkDtaini, checkDtafim)
  ) {
    event.preventDefault();
  }
});


function fecharModal() {
  document.getElementById("modal-overlay").style.display = "none";
}

window.onclick = function (event) {
  if (event.target === document.getElementById("modal-overlay")) {
    fecharModal();
  }
};
