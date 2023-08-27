window.scroll({
    top: 0,
    behavior: 'smooth'
});

const form = document.getElementById('form');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.hidden');
const emailRegex =  /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

form.addEventListener('submit', (event) => {
    event.preventDefault();
    nameValidate();
    emailValidate();
    mainPasswordValidate();
    comparePassoword();
});

function setError(index){
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';
    spans[index].style.color = 'red'; 
}

function removeError(index){
    campos[index].style.border = '';
    spans[index].style.display = 'none';
}
function nameValidate(){
    if(campos[0].value.length < 6){
        setError(0);
    }else{
        removeError(0);
    }
}

function emailValidate(){
    if(!emailRegex.test(campos[1].value)){
        setError(1);
    }else{
        removeError(1);
    }
}

function mainPasswordValidate(){
    if(campos[2].value.length < 8){
        setError(2);
    }else{
        removeError(2);
        comparePassoword();
    }
}

function comparePassoword(){
    if(campos[2].value ==  campos[3].value && campos[3].value.length >=8){
        removeError(3);
    }else{
        setError(3);
    }
}


$(document).ready(function() {
    // Verifica se a largura da tela é menor ou igual a 991px
    if ($(window).width() <= 768) {
      // Seleciona a seção com a classe section-2 e remove as classes específicas
      $(".section-2").removeClass("section-2 cp2 p-5 mb-3");
    }
  });


  $(document).ready(function() {
    // Verifica se a largura da tela é maior ou igual a 992px
    if ($(window).width() >= 992) {
      // Seleciona o elemento com a classe cadastrar e remove a classe
      $(".cadastrar").removeClass("cadastrar");
    }
  });


  $(document).ready(function() {
    // Verifica se a largura da tela é maior ou igual a 992px
    if ($(window).width() >= 992) {
      // Seleciona o elemento com a classe cadastrar e remove a classe
      $(".limpar").removeClass("limpar");
    }
  });
  
  
