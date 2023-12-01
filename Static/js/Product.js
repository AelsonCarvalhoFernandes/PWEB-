
function validateFormFile() {

    var formProduct = document.querySelector('.formProduct');

    if (formProduct.checkValidity()) {
        formProduct.submit();

    } else {
        formProduct.reportValidity();
    }
}