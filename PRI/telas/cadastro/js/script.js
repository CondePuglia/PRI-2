window.scroll({
    top: 0,
    behavior: 'smooth'
});

const form = document.getElementById('form');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.hidden');
const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

form.addEventListener('submit', (event) => {
    if (!validateForm()) {
        event.preventDefault(); // Impede o envio do formulário se não for válido
    }
});

campos.forEach((campo, index) => {
    campo.addEventListener('input', () => {
        validateField(index);
    });
});

function setError(index, errorMessage) {
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';
    spans[index].style.color = 'red';
    spans[index].textContent = errorMessage;
}

function removeError(index) {
    campos[index].style.border = '';
    spans[index].style.display = 'none';
}

function validateField(index) {
    switch (index) {
        case 0:
            if (campos[0].value.length < 6) {
                setError(0, 'Digite um nome válido, com pelo menos 6 caracteres.');
            } else {
                removeError(0);
            }
            break;
        case 1:
            if (!emailRegex.test(campos[1].value)) {
                setError(1, 'Digite um email válido.');
            } else {
                removeError(1);
            }
            break;
        case 2:
            if (campos[2].value.length < 8) {
                setError(2, 'Digite uma senha válida, com pelo menos 8 caracteres.');
            } else {
                removeError(2);
            }
            comparePassword();
            break;
        case 3:
            comparePassword();
            break;
        default:
            break;
    }
}

function comparePassword() {
    if (campos[2].value === campos[3].value && campos[3].value.length >= 8) {
        removeError(3);
    } else {
        setError(3, 'As senhas devem ser compatíveis.');
    }
}

$(document).ready(function () {
    // Verifica a largura da tela e faz as alterações necessárias
    if ($(window).width() <= 768) {
        $(".section-2").removeClass("section-2 cp2 p-5 mb-3");
    }

    if ($(window).width() >= 992) {
        $(".cadastrar, .limpar").removeClass("cadastrar limpar");
    }
});

function validateForm() {
    let isValid = true;

    // Valida cada campo
    campos.forEach((campo, index) => {
        validateField(index);
        if (spans[index].style.display === 'block') {
            isValid = false;
        }
    });

    return isValid;
}
