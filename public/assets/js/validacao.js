const button = document.querySelector('#buttonLogin')
button.addEventListener('click', (event) => {    

    const email = document.querySelector('.inputEmail');
    const senha = document.querySelector('.inputSenha');

    if (email.value == '') {
        email.classList.add('errorInput');
    }
    if (senha.value == '') {
        senha.classList.add('errorInput');
    }
})