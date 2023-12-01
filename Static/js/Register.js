function verifyCheckbox() {
    var checkbox = document.getElementById('checkVendedor');
    var labelRg_Cnpj = document.getElementById('labelRg');
    var labelCpf_Cnpj = document.getElementById('labelCpf');

    var form = document.querySelector('form');
    var btnSubmit = document.getElementById('btnSubmit');

    var h1 = document.querySelector('h1');
    var inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');
    var linkLogin = document.querySelector('a');

    if (checkbox.checked) {

        labelRg_Cnpj.innerText = 'RG / CNPJ';
        labelCpf_Cnpj.innerText = 'CPF / CNPJ';

        form.style.boxShadow = '0px 0px 10px 0px #42ffff';
        btnSubmit.style.backgroundColor = '#1e1e1e';

        h1.innerText = 'CADASTRO | VENDEDOR';
        h1.style.color = '#1e1e1e';
        h1.style.textShadow = 'none';

        inputs.forEach(input => {
            input.style.border = '1px solid #1e1e1e';
        });
        linkLogin.style.color = '#1e1e1e';

    } else {

        labelRg_Cnpj.innerText = 'RG';
        labelCpf_Cnpj.innerText = 'CPF';

        form.style.boxShadow = '0px 0px 10px 0px #aa00ff';
        btnSubmit.style.backgroundColor = '#aa00ff';

        h1.innerText = 'CADASTRO | USUÁRIO';
        h1.style.color = '#aa00ff';
        h1.style.textShadow = '0px 0px 10px rgba(166, 0, 249, 0.399)';

        inputs.forEach(input => {
            input.style.border = '1px solid #aa00ff';
        });
        linkLogin.style.color = '#aa00ff';
    }
}


function validationForm() {
    var form = document.querySelector('.formRegister');
    var password = document.getElementById('password').value;
    var confirmPasswordInput = document.getElementById('confirm_password');
    var confirmPassword = confirmPasswordInput.value;
    var errorMessage = document.getElementById('errorMessage');

    if (password !== confirmPassword) {
        confirmPasswordInput.style.border = '1px solid red';
        errorMessage.textContent = 'As senhas não coincidem!';
        errorMessage.style.color = 'red';

    } else {
        errorMessage.textContent = '';
        confirmPasswordInput.style.border = '1px solid #1e1e1e';

        if (form.checkValidity()) {
            verifyRoute(form);
            //form.submit();
        } else {
            form.reportValidity();
        }
    }
}


function verifyRoute(form) {

    var checkbox = document.getElementById('checkVendedor');

    if (checkbox.checked) {
        form.action = 'register/seller';
    } else {
        form.action = 'register/user';
    }

    form.method = 'post';
    form.submit();
}


function formatCPF() {

    var cpf = document.getElementById('cpf');

    var cpfValue = cpf.value;

    if (cpfValue.length === 3 || cpfValue.length === 7) {
        cpf.value += '.';
    } else if (cpfValue.length === 11) {
        cpf.value += '-';
    }
}

function formatRG() {

    var rg = document.getElementById('rg');

    var rgValue = rg.value;

    if (rgValue.length === 2 || rgValue.length === 6) {
        rg.value += '.';
    } else if (rgValue.length === 10) {
        rg.value += '-';
    }
}

function allowNumbersOnly(event) {
    // Obtém o código da tecla pressionada
    var keyCode = event.which || event.keyCode;

    // Permite apenas números inteiros (0-9) e a tecla "backspace" (8)
    if ((keyCode < 48 || keyCode > 57) && keyCode !== 8) {
        event.preventDefault();
    }
}

function clearField(event, object) {
    if (event.keyCode === 8) {
        var object = document.getElementById(object.id);
        object.value = '';
    }
}