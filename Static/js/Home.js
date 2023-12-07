function openDescriptionProduct(id) {
    document.getElementById('idElement').value = id;
    d///ocument.getElementById('productForm').action = "/product?id=" + id;
    document.getElementById('productForm').submit();
}
