function editProfile() {

    var username = document.querySelector(".username");
    var email = document.querySelector(".email");
    var rg = document.querySelector(".rg");
    var cpf = document.querySelector(".cpf");
    var tel = document.querySelector(".telefone");

    var buttonSave = document.getElementById("button-saveEdit");

    if (buttonSave.style.display === "none") {
        enableProfile(username, email, rg, cpf, tel);
        document.getElementById('button-openEdit').textContent = 'edit_off';
        buttonSave.style.display = "block";

    } else {
        disableProfile(username, email, rg, cpf, tel);
        document.getElementById('button-openEdit').textContent = 'edit_square';
        buttonSave.style.display = "none";
    }

}



function disableProfile(username, email, rg, cpf, tel) {

    username.disabled = true;
    email.disabled = true;
    rg.disabled = true;
    cpf.disabled = true;
    tel.disabled = true;

    username.style.backgroundColor = "#1e1e1e";
    email.style.backgroundColor = "#1e1e1e";
    rg.style.backgroundColor = "#1e1e1e";
    cpf.style.backgroundColor = "#1e1e1e";
    tel.style.backgroundColor = "#1e1e1e";

    username.style.color = "white";
    email.style.color = "white";
    rg.style.color = "white";
    cpf.style.color = "white";
    tel.style.color = "white";
}



function enableProfile(username, email, rg, cpf, tel) {

    username.disabled = false;
    email.disabled = false;
    rg.disabled = false;
    cpf.disabled = false;
    tel.disabled = false;

    username.style.backgroundColor = "#fff";
    email.style.backgroundColor = "#fff";
    rg.style.backgroundColor = "#fff";
    cpf.style.backgroundColor = "#fff";
    tel.style.backgroundColor = "#fff";

    username.style.border = "none";
    email.style.border = "none";
    rg.style.border = "none";
    cpf.style.border = "none";
    tel.style.border = "none";

    username.style.color = "#1e1e1e";
    email.style.color = "#1e1e1e";
    rg.style.color = "#1e1e1e";
    cpf.style.color = "#1e1e1e";
    tel.style.color = "#1e1e1e";
}



function saveEditProfile() {

    form = document.querySelector(".containerProfileData");

    if (form.checkValidity()) {
        form.submit();
    } else {
        form.reportValidity();
    }
}