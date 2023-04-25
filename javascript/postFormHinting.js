let title_field = document.getElementById("title");
let content_field = document.getElementById("content");
let post_btn = document.getElementById("post-button");

// title length check
title_field.addEventListener("input", function () {
    if (title_field.value.length < 1) {
        document.getElementById("title_hint").innerHTML = "Le post doit contenir un titre";
    } else {
        document.getElementById("title_hint").innerHTML = "";
    }
    updatePostButton();
})

// content length check
content_field.addEventListener("input", function () {
    if (content_field.value.length < 1) {
        document.getElementById("content_hint").innerHTML = "Le post doit contenir un message";
    } else {
        document.getElementById("content_hint").innerHTML = "";
    }
    updatePostButton();
})

function updatePostButton(){
    if (content_field.value.length > 0 && title_field.value.length > 0){
        post_btn.disabled = false;
    } else {
        post_btn.disabled = true;
    }
}

