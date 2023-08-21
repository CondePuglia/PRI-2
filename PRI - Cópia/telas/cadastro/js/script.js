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