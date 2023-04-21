let password_field = document.getElementById("password");
let confirm_field = document.getElementById("confirm");
let username_field = document.getElementById("username");

// Password length check
password_field.addEventListener("input", function () {
    if (password_field.value.length > 0 && password_field.value.length < 8) {
        document.getElementById("password_hint").innerHTML = "Le mot de passe doit comporter au moins 8 caractères";
    } else {
        document.getElementById("password_hint").innerHTML = "";
    }
})

// Password matching check
confirm_field.addEventListener("input", function () {
    console.log(confirm_field.value);
    if (password_field.value.toString().localeCompare(confirm_field.value.toString()) && confirm_field.value.length > 0) {
        document.getElementById("confirm_hint").innerHTML = "Les mots de passe ne correspondent pas";
    } else {
        document.getElementById("confirm_hint").innerHTML = "";
    }
})

// Username length check
username_field.addEventListener("input", function () {
    if (username_field.value.length > 0 && username_field.value.length < 4) {
        document.getElementById("username_hint").innerHTML = "Le nom d'utilisateur doit comporter au moins 4 caractères"
    } else {
        document.getElementById("username_hint").innerHTML = "";
    }
})
