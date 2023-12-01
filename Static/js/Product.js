
function validateFormFile() {

    var formProduct = document.querySelector('.formProduct');

    if (formProduct.checkValidity()) {
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

function openDescriptionProduct(id) {
    document.getElementById('idElement').value = id;
    ///document.getElementById('productForm').action = "/product?id=" + id;
    document.getElementById('productForm').submit();
}
