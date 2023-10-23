// Certifique-se de que o DOM esteja carregado antes de executar o código
document.addEventListener("DOMContentLoaded", function () {
    const temp = document.getElementById("tempChart");
    const umi = document.getElementById("umiChart");
    const lumi = document.getElementById("lumiChart");

    // Função para atualizar os gráficos com base nos dados
    function updateCharts() {
        // Obtenha os dados do formulário (seleções do usuário e período)
        const tempSelected = document.getElementById("temp").checked;
        const umiSelected = document.getElementById("umi").checked;
        const lumiSelected = document.getElementById("lumi").checked;
        const dtaini = document.getElementById("dtaini").value;
        const dtafim = document.getElementById("dtafim").value;

        // Suponhamos que você tenha dados fictícios
        const tempData = [20, 22, 23, 24, 25, 26, 27];
        const umiData = [50, 52, 54, 56, 58, 60, 62];
        const lumiData = [1000, 1100, 1200, 1300, 1400, 1500, 1600];

        // Atualize os gráficos
        if (tempSelected) {
            new Chart(temp, {
                type: "line",
                data: {
                    labels: ["15/10", "16/10", "17/10", "18/10", "19/10", "20/10", "21/10"],
                    datasets: [
                        {
                            label: "Temperatura",
                            data: tempData,
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
                                text: "Período: " + dtaini + " - " + dtafim,
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

        if (umiSelected) {
            new Chart(umi, {
                type: "line",
                data: {
                    labels: ["15/10", "16/10", "17/10", "18/10", "19/10", "20/10", "21/10"],
                    datasets: [
                        {
                            label: "Umidade",
                            data: umiData,
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
                                text: "Período: " + dtaini + " - " + dtafim,
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

        if (lumiSelected) {
            new Chart(lumi, {
                type: "line",
                data: {
                    labels: ["15/10", "16/10", "17/10", "18/10", "19/10", "20/10", "21/10"],
                    datasets: [
                        {
                            label: "Luminosidade",
                            data: lumiData,
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
                                text: "Período: " + dtaini + " - " + dtafim,
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
    }

    // Associe a função de atualização ao evento de envio do formulário
   
});
