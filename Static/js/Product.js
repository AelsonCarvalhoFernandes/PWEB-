
function validateFormFile() {

    var formProduct = document.querySelector('.formProduct');

    if (formProduct.checkValidity()) {
        var inputPrice = document.getElementById('price');
        substituirPontos(inputPrice);
        formProduct.submit();

    } else {
        formProduct.reportValidity();
    }
}

function confirmBuy() {

    var resultado = confirm("Deseja confirmar a compra do produto:  ?");

    if (resultado) {
        document.getElementById('fromDescriptionProduct').submit();
        alert("Item adquirido com sucesso!");
    }
}

function formatarPreco(input) {

    let valor = input.value.replace(/\D/g, '');

    if (valor.length > 2) {
        if (valor[0] !== '0') {
            valor = valor.slice(0, -2) + ',' + valor.slice(-2);
        } else {
            valor = valor.slice(1, -2) + ',' + valor.slice(-2);
        }
    }
    else if ((valor.length === 2)) {
        valor = '0,' + valor;
    }
    else if ((valor.length === 1)) {
        valor = '0,0' + valor;
    }
    else {
        valor = '0,00';
    }

    valor = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    input.value = valor;
}

function allowNumbersOnly(event) {
    var keyCode = event.which || event.keyCode;

    if ((keyCode < 48 || keyCode > 57) && keyCode !== 8) {
        event.preventDefault();
    }
}

function substituirPontos(input) {
    input.value = input.value.replace(/\./g, '').replace(/,/g, '.');
}

function openDescriptionProduct(id) {
    document.getElementById('idCardProduct').value = id;
    document.getElementById('productForm').submit();
}