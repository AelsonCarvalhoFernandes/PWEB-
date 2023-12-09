function editProfile() {

    var formProfile = document.getElementById("profileData");
    var textInputs = formProfile.querySelectorAll('input[type="text"]:not([name="type"]), input[type="email"]');

    var buttonSave = document.getElementById("button-saveEdit");

    if (buttonSave.style.display === "none") {
        enableEditProfile(textInputs);
        document.getElementById('button-openEdit').textContent = 'edit_off';
        buttonSave.style.display = "block";

    } else {
        disableEditProfile(textInputs);
        document.getElementById('button-openEdit').textContent = 'edit_square';
        buttonSave.style.display = "none";
    }

}

function enableEditProfile(textInputs) {

    textInputs.forEach(function (input) {
        input.style.backgroundColor = '#ffd700';
        input.disabled = false;
        input.style.backgroundColor = "#fff";
        input.style.border = "none";
        input.style.color = "#1e1e1e";

    });
}

function disableEditProfile(textInputs) {

    textInputs.forEach(function (input) {
        input.style.backgroundColor = '#ffd700';
        input.disabled = true;
        input.style.backgroundColor = "#1e1e1e";
        input.style.color = "white";
    });

}

function saveEditProfile() {

    form = document.querySelector(".containerProfileData");

    if (form.checkValidity()) {
        form.submit();
    } else {
        form.reportValidity();
    }
}