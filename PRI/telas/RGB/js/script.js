// Função para criar o gradiente RGB com base nos valores do array
function criarGradiente(gradienteDiv, valor, maxValor, cor) {
  let corComponente;
  if (cor === "green") {
    corComponente = Math.round(((maxValor - valor) / maxValor) * 255); // Inverte a intensidade do verde
  } else {
    corComponente = Math.round((valor / maxValor) * 255);
  }

  gradienteDiv.style.background = `linear-gradient(to right, rgb(${
    cor === "red" ? corComponente : 0
  }, ${cor === "green" ? corComponente : 0}, ${
    cor === "blue" ? corComponente : 0
  }), rgb(${cor === "red" ? corComponente + 1 : 0}, ${
    cor === "green" ? corComponente + 1 : 0
  }, ${cor === "blue" ? corComponente + 1 : 0}))`;
}

// Exemplo de valores dos arrays
const valoresTempString = document.getElementById("datatemp").value;
const valoresLumiString = document.getElementById("datalumi").value;
const valoresUmiString = document.getElementById("dataumi").value;

// Converter as strings em arrays de números
const valoresTemp = valoresTempString.split(",").map(parseFloat);
const valoresLumi = valoresLumiString.split(",").map(parseFloat);
const valoresUmi = valoresUmiString.split(",").map(parseFloat);

// Função para animar dinamicamente as cores
function animarGradiente(gradienteDiv, array, maxValor, cor, index) {
  const valor = Math.round((array[index] / maxValor) * maxValor); // Normalizando para 0-maxValor

  criarGradiente(gradienteDiv, valor, maxValor, cor);

  // Incrementar o índice (ou reiniciar se chegar ao final dos arrays)
  index = (index + 1) % array.length;

  // Chamar recursivamente a função para continuar a animação em loop
  setTimeout(
    () => animarGradiente(gradienteDiv, array, maxValor, cor, index),
    180
  ); // Ajuste o intervalo conforme necessário (50 para uma animação mais rápida)
}

// Iniciar a animação para o gradiente Red
animarGradiente(
  document.getElementById("gradiente-div-red"),
  valoresTemp,
  45,
  "red",
  0
);

// Iniciar a animação para o gradiente Green
animarGradiente(
  document.getElementById("gradiente-div-green"),
  valoresLumi,
  3500,
  "green",
  0
);

// Iniciar a animação para o gradiente Blue
animarGradiente(
  document.getElementById("gradiente-div-blue"),
  valoresUmi,
  80,
  "blue",
  0
);

function criarLegendaGradual(min, max, tipo, corInicial, corFinal) {
    const legendaDiv = document.getElementById('legendaGradual');
    const numPassos = 10; // Número de passos na gradiente
  
    // Cria uma gradiente de cores usando a biblioteca Chroma.js
    const gradient = chroma.scale([corInicial, corFinal]).domain([min, max]).mode('lch');
  
    // Cria uma nova linha (row) para cada tipo de legenda
    const linhaDiv = document.createElement('div');
    linhaDiv.classList.add('row', 'm-2');
  
    for (let i = 0; i <= numPassos; i++) {
      const valor = min + (max - min) * (i / numPassos);
      const cor = gradient(valor).hex();
  
      // Cria um elemento para exibir a cor
      const corBox = document.createElement('div');
      corBox.classList.add('cor-box');
      corBox.style.backgroundColor = cor;
  
      // Cria um elemento para exibir o valor da legenda
      const span = document.createElement('span');
      
      span.classList.add('text-white');
      span.textContent = tipo === "temp" ? valor.toFixed(1) + "°C" : valor.toFixed(1);
      span.textContent = tipo === "lumi" ? valor.toFixed(1) + "lm" : valor.toFixed(1);
      span.textContent = tipo === "umi" ? valor.toFixed(1) + "%" : valor.toFixed(1);
  
      // Adiciona os elementos à linha
      linhaDiv.appendChild(corBox);
      linhaDiv.appendChild(span);
    }
  
    // Adiciona a linha à legenda principal
    legendaDiv.appendChild(linhaDiv);
  }
  
  // Chama a função para criar a legenda gradual para cada parâmetro
  criarLegendaGradual(0, 45, 'temp', 'rgb(255, 0, 0)', 'rgb(128, 0, 0)'); // Temperatura (de vermelho escuro a vermelho claro)
  criarLegendaGradual(0, 3500, 'lumi', 'rgb(0, 128, 0)', 'rgb(0, 255, 0)'); // Luminosidade (de verde escuro a verde claro)
  criarLegendaGradual(20, 80, 'umi', 'rgb(0, 0, 255)', 'rgb(0, 0, 128)'); // Umidade (de azul escuro a azul claro, começando em 20)
  