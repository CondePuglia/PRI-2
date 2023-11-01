const temp = document.getElementById("tempChart");
const umi = document.getElementById("umiChart");
const lumi = document.getElementById("lumiChart");

var tempSelected = document.getElementById("temp").value;
var umiSelected = document.getElementById("umi").value;
var lumiSelected = document.getElementById("lumi").value;
var dtaini = document.getElementById("dta-ini").value;
var dtafim = document.getElementById("dta-fim").value;

function dataInicialFormatada() {
    data = new Date(dtaini);
    var dataFormatadaini = data.toLocaleDateString("pt-BR", {
        timeZone: "UTC",
    });
    return dataFormatadaini;
    console.log(dataFormatadaini);
}

function dataFinalFormatada() {
    data = new Date(dtafim);
    var dataFormatadafim = data.toLocaleDateString("pt-BR", {
        timeZone: "UTC",
    });
    return dataFormatadafim;
}

function extrairDia(data) {
    // Divida a data em partes usando "/" como separador
    var partes = data.split("/");

    // A primeira parte será o dia
    var dia = parseInt(partes[0]);

    // Dia conterá o valor numérico do dia (exemplo: 11 para 11/10/2023)

    return dia;
}

function extrairMes(data) {
    var partes = data.split("/");

    var mes = parseInt(partes[1]);

    return mes;
}

function extrairAno(data) {
    var partes = data.split("/");

    var mes = parseInt(partes[2]);

    return mes;
}

var diaini = extrairDia(dataInicialFormatada());
var diafim = extrairDia(dataFinalFormatada());
var mesini = extrairMes(dataInicialFormatada());
var mesfim = extrairMes(dataFinalFormatada());
var anoini = extrairAno(dataInicialFormatada());
var anofim = extrairAno(dataFinalFormatada());

if (diaini < 10) {
    diaini = "0" + diaini;
}

if (mesini < 10) {
    mesini = "0" + mesini;
}

if (diafim < 10) {
    diafim = "0" + diafim;
}

if (mesfim < 10) {
    mesfim = "0" + mesfim;
}

var datainicial = diaini + "/" + mesini + "/" + anoini;

var datafinal = diafim + "/" + mesfim + "/" + anofim;

function calculardias(datainicial, datafinal) {
    var partesDataInicial = datainicial.split("/");
    var partesDataFinal = datafinal.split("/");

    var diaini = parseInt(partesDataInicial[0], 10);
    var diafim = parseInt(partesDataFinal[0], 10);
    var mesini = parseInt(partesDataInicial[1], 10);
    var mesfim = parseInt(partesDataFinal[1], 10);

    var periodoDias = []; // Array para armazenar os dias

    while (!(mesini === mesfim && diaini > diafim)) {
        var dataFormatada = diaini + "/" + mesini;
        periodoDias.push(dataFormatada);

        diaini++;

        if (diaini > 31) {
            // Verifica se ultrapassou o último dia do mês
            diaini = 1;
            mesini++;
        }
    }

    return periodoDias;
}

function updateCharts() {
    const tempData = document.getElementById("datatemp").value;
    const tempDataArray = tempData.split(',').map(Number);

    const lumiData = document.getElementById("datalumi").value;
    const lumiDataArray = lumiData.split(',').map(Number);

    const umiData = document.getElementById("dataumi").value;
    const umiDataArray = umiData.split(',').map(Number);

   
   

    if (tempSelected) {
        new Chart(temp, {
            type: "line",
            data: {
                labels: calculardias(datainicial, datafinal),
                datasets: [
                    {
                        label: "Temperatura",
                        data: tempDataArray,
                        borderColor: "red",
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text:
                                "Período: " +
                                dataInicialFormatada() +
                                " - " +
                                dataFinalFormatada(),
                        },
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "Temperatura (°C)",
                        },
                    },
                },
            },
        });
    }



if (lumiSelected) {
    new Chart(lumi, {
        type: "line",
        data: {
            labels: calculardias(datainicial, datafinal),
            datasets: [
                {
                    label: "Luminosidade",
                    data: lumiDataArray,
                    borderColor: "yellow",
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text:
                            "Período: " +
                            dataInicialFormatada() +
                            " - " +
                            dataFinalFormatada(),
                    },
                },
                y: {
                    title: {
                        display: true,
                        text: "Luminosidade (kj/m²)",
                    },
                },
            },
        },
    });
}

if (umiSelected) {
    new Chart(umi, {
        type: "line",
        data: {
            labels: calculardias(datainicial, datafinal),
            datasets: [
                {
                    label: "Umidade",
                    data: umiDataArray,
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text:
                            "Período: " +
                            dataInicialFormatada() +
                            " - " +
                            dataFinalFormatada(),
                    },
                },
                y: {
                    title: {
                        display: true,
                        text: "Umidade (%)",
                    },
                },
            },
        },
    });
}
}
document.addEventListener("DOMContentLoaded", function () {
    dataInicialFormatada();
    dataFinalFormatada();

    updateCharts();
});
