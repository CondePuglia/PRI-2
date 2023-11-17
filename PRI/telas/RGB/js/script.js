
function criarGradiente(gradienteDiv, valor, maxValor, cor) {
    let corComponente;
    if (cor === "green") {
      corComponente = Math.round(((maxValor - valor) / maxValor) * 255); 
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
  
 
  const valoresTempString = document.getElementById("datatemp").value;
  const valoresLumiString = document.getElementById("datalumi").value;
  const valoresUmiString = document.getElementById("dataumi").value;
  

  const valoresTemp = valoresTempString.split(",").map(parseFloat);
  const valoresLumi = valoresLumiString.split(",").map(parseFloat);
  const valoresUmi = valoresUmiString.split(",").map(parseFloat);
  

  function animarGradiente(gradienteDiv, array, maxValor, cor, index) {
    const valor = Math.round((array[index] / maxValor) * maxValor); 
  
    criarGradiente(gradienteDiv, valor, maxValor, cor);
  
    index = (index + 1) % array.length;
  
    
    setTimeout(
      () => animarGradiente(gradienteDiv, array, maxValor, cor, index),
      180
    );
  }
  
 
  animarGradiente(
    document.getElementById("gradiente-div-red"),
    valoresTemp,
    45,
    "red",
    0
  );
  
 
  animarGradiente(
    document.getElementById("gradiente-div-green"),
    valoresLumi,
    3500,
    "green",
    0
  );
  

  animarGradiente(
    document.getElementById("gradiente-div-blue"),
    valoresUmi,
    80,
    "blue",
    0
  );
  
  function criarLegendaGradual(min, max, tipo, corInicial, corFinal) {
      const legendaDiv = document.getElementById('legendaGradual');
      const numPassos = 10; 
    
     
      const gradient = chroma.scale([corInicial, corFinal]).domain([min, max]).mode('lch');
    

      const linhaDiv = document.createElement('div');
      linhaDiv.classList.add('row', 'm-2');
    
      for (let i = 0; i <= numPassos; i++) {
        const valor = min + (max - min) * (i / numPassos);
        const cor = gradient(valor).hex();
    
      
        const corBox = document.createElement('div');
        corBox.classList.add('cor-box');
        corBox.style.backgroundColor = cor;
    

        const span = document.createElement('span');
        
        span.classList.add('text-white');
        span.textContent = tipo === "temp" ? valor.toFixed(1) + "°C" : valor.toFixed(1);
        span.textContent = tipo === "lumi" ? valor.toFixed(1) + "lm" : valor.toFixed(1);
        span.textContent = tipo === "umi" ? valor.toFixed(1) + "%" : valor.toFixed(1);
    
        
        linhaDiv.appendChild(corBox);
        linhaDiv.appendChild(span);
      }
    
      
      legendaDiv.appendChild(linhaDiv);
    }
    
   
    criarLegendaGradual(0, 45, 'temp', 'rgb(255, 0, 0)', 'rgb(128, 0, 0)'); 
    criarLegendaGradual(0, 3500, 'lumi', 'rgb(0, 128, 0)', 'rgb(0, 255, 0)'); 
    criarLegendaGradual(20, 80, 'umi', 'rgb(0, 0, 255)', 'rgb(0, 0, 128)'); 